@vite(['resources/css/app.css', 'resources/js/app.js'])

<nav class="text-black w-full p-2">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-25">
        </a>

        <!-- Navigation Links -->
        <div class="flex items-center space-x-6">

            @auth
                <a href="{{ route('profile.edit') }}"
                   class="text-gold hover:bg-gold hover:text-blue-500 px-3 py-2 rounded transition duration-200">
                    <i class="fa-solid fa-user mr-1"></i> Profile
                </a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                            class="text-gold hover:bg-gold hover:text-blue-500 px-3 py-2 rounded transition duration-200">
                        <i class="fa-solid fa-right-from-bracket mr-1"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="text-gold hover:bg-gold hover:text-blue-500 px-3 py-2 rounded transition duration-200">
                    <i class="fa-solid fa-right-to-bracket mr-1"></i> Sign In
                </a>
                <a href="{{ route('register') }}"
                   class="text-gold hover:bg-gold hover:text-blue-500 px-3 py-2 rounded transition duration-200">
                    <i class="fa-solid fa-user-plus mr-1"></i> Register
                </a>
            @endauth
        </div>
    </div>
</nav>