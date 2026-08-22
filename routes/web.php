<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MeetingController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\Member\AttendanceController as MemberAttendanceController;
use App\Http\Controllers\Member\CashPaymentController as MemberCashPaymentController;
use App\Http\Controllers\Bendahara\CashPaymentController;
use App\Http\Controllers\Bendahara\ProfileController as BendaharaProfileController;

use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return app(MemberDashboardController::class)->index();
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('members', MemberController::class);
    Route::resource('events', EventController::class);
    Route::resource('meetings', MeetingController::class);
    Route::resource('attendances', AttendanceController::class);
});

// Bendahara routes
Route::middleware(['auth', 'bendahara'])->prefix('bendahara')->name('bendahara.')->group(function () {
    Route::resource('cash-payments', CashPaymentController::class);
    Route::put('cash-payments/{cash_payment}/approve', [CashPaymentController::class, 'approve'])->name('cash-payments.approve');
    
    Route::get('/profile/rekening', [BendaharaProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/rekening', [BendaharaProfileController::class, 'update'])->name('profile.update');
});

// Member routes (untuk member biasa)
Route::middleware(['auth'])->prefix('member')->name('member.')->group(function () {
    Route::get('attendances/create', [MemberAttendanceController::class, 'create'])->name('attendances.create');
    Route::post('attendances', [MemberAttendanceController::class, 'store'])->name('attendances.store');
    
    Route::get('cash-payments/create', [MemberCashPaymentController::class, 'create'])->name('cash-payments.create');
    Route::post('cash-payments', [MemberCashPaymentController::class, 'store'])->name('cash-payments.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
