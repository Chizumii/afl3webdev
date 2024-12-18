<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
    <nav class="sticky top-0 bg-[#E2CEB1] z-50">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <!-- Mobile menu button -->
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden z-50">
                    <button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" id="mobile-menu-button">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" x-description="Mobile menu button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                  <!-- Logo on desktop -->
                  <div class="flex shrink-0 items-center sm:ml-6 sm:block hidden">
                    <img class="h-10 w-auto" src="images/logos.png" alt="Logo">
                </div>
                <!-- Logo on mobile -->
                <div class="absolute top-1/2 left-1/4 transform -translate-y-1/2 sm:hidden z-50">
                    <img class="h-10 w-auto" src="images/logos.png" alt="Logo">
                </div>
                

                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="/home" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-[#A07658] {{ request()->is('home') ? 'text-[#A07658]' : '' }}" aria-current="page">Home</a>
                            <a href="/restaurants" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-[#A07658]{{ request()->is('restaurant') ? 'text-[#A07658]' : '' }}">Restaurant</a>
                            <a href="/fusion" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-[#A07658] {{ request()->is('fusion') ? 'text-[#A07658]' : '' }}">Fusions</a>
                            <a href="/orderstatus" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-[#A07658] {{ request()->is('orderstatus') ? 'text-[#A07658]' : '' }}">Order Status</a>
                        </div>
                    </div>
                </div>

                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button" id="user-menu-button" class="relative flex px-6 text-sm" onclick="window.location.href='/cart';">
                        <img class="h-8 w-8" src="images/Vector.svg" alt="cart">
                    </button>
                    @auth
                    <div class="text-sm font-medium text-gray-900 ml-4">
                        <span class="text-gray-800 font-semibold">Hello,</span> 
                        <span class="font-semibold text-[#A07658]">{{ Auth::user()->username }}</span>
                    </div>
                    
                    @endauth
                    <div class="relative ml-3">
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu, Hidden by default -->
        <div class="sm:hidden" id="mobile-menu" class="hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <a href="/home" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:text-[#A07658] {{ request()->is('home') ? 'text-[#A07658]' : '' }}">Home</a>
                <a href="/restaurants" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:text-[#A07658] {{ request()->is('restaurant') ? 'text-[#A07658]' : '' }}">Restaurant</a>
                <a href="/fusion" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:text-[#A07658] {{ request()->is('fusion') ? 'text-[#A07658]' : '' }}">Fusions</a>
                <a href="/orderstatus" class="block rounded-md px-3 py-2 text-base font-medium text-white hover:text-[#A07658] {{ request()->is('orderstatus') ? 'text-[#A07658]' : '' }}">Order Status</a>
            </div>
        </div>
    </nav>

    <script>
        // Toggle mobile menu visibility
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>
