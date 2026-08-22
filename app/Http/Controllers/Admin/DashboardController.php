<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Event;
use App\Models\Meeting;

class DashboardController extends Controller
{
    public function index()
    {
        $memberCount = User::where('role', 'member')->count();
        $eventCount = Event::count();
        $meetingCount = Meeting::count();
        $user = \Illuminate\Support\Facades\Auth::user();

        return view('admin.dashboard', compact('memberCount', 'eventCount', 'meetingCount', 'user'));
    }
}
