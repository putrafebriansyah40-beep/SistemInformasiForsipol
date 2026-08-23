<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-white border border-gray-200 rounded-xl font-semibold text-sm text-gray-700 tracking-wide hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-200 focus:ring-offset-2 transition-all ease-in-out duration-300 shadow-sm hover:shadow-md disabled:opacity-25']) }}>
    {{ $slot }}
</button>
