<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 border border-transparent rounded-xl font-bold text-sm text-white tracking-wide hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all ease-in-out duration-300 shadow-lg shadow-red-500/30']) }}>
    {{ $slot }}
</button>
