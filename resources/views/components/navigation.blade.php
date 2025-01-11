<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
    <nav class="sticky top-0 bg-[#ffefd0] z-50">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <!-- Mobile menu button -->
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden z-50">
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                        id="mobile-menu-button">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" x-description="Mobile menu button" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>

                <!-- Logo on desktop -->
                <div class="flex shrink-0 items-center sm:ml-6 sm:block hidden">
                    <img class="h-10 w-auto" src="images/logos.png" alt="Logo">
                </div>
                <!-- Logo on mobile -->


                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="/home"
                                class="rounded-md px-3 py-2 text-sm font-medium text-[#A07658] hover:text-[#552e13] {{ request()->is('home') ? 'text-[#A07658]' : '' }}"
                                aria-current="page">Home</a>
                            <a href="/restaurants"
                                class="rounded-md px-3 py-2 text-sm font-medium text-[#A07658] hover:text-[#552e13]{{ request()->is('restaurant') ? 'text-[#A07658]' : '' }}">Restaurant</a>
                            <a href="/fusion"
                                class="rounded-md px-3 py-2 text-sm font-medium text-[#A07658] hover:text-[#552e13] {{ request()->is('fusion') ? 'text-[#A07658]' : '' }}">Fusions</a>
                            <a href="/orderstatus"
                                class="rounded-md px-3 py-2 text-sm font-medium text-[#A07658] hover:text-[#552e13] {{ request()->is('orderstatus') ? 'text-[#A07658]' : '' }}">Order
                                Status</a>
                        </div>
                    </div>
                </div>

                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button" id="user-menu-button" class="relative flex px-6 text-sm"
                        onclick="window.location.href='/cart';">
                        <img class="h-8 w-8" src="images/Vector.svg" alt="cart">
                    </button>
                    @auth
                        <div class="text-sm font-medium text-gray-900 ml-4">
                            <span class="text-gray-800 font-semibold">Hello,</span>
                            <span class="font-semibold text-[#A07658]">{{ Auth::user()->username }}</span>
                        </div>
                    @endauth
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        <button type="submit" class="relative flex px-6 text-sm">
                            <svg width="34" height="33" viewBox="0 0 34 33" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.91699 9.80641V7.34289C9.91699 5.20503 9.91699 4.13611 10.6035 3.53824C11.29 2.94037 12.3488 3.08718 14.4664 3.38079L24.5744 4.78233C27.0414 5.1244 28.2749 5.29543 29.0126 6.14246C29.7503 6.9895 29.7503 8.23482 29.7503 10.7255V22.2745C29.7503 24.7652 29.7503 26.0105 29.0126 26.8575C28.2749 27.7046 27.0414 27.8756 24.5744 28.2177L14.4664 29.6192C12.3488 29.9128 11.29 30.0596 10.6035 29.4618C9.91699 28.8639 9.91699 27.795 9.91699 25.6571V23.4657"
                                    stroke="white" />
                                <path
                                    d="M22.667 16.5L23.0528 16.182L23.3149 16.5L23.0528 16.818L22.667 16.5ZM5.66699 17C5.39085 17 5.16699 16.7761 5.16699 16.5C5.16699 16.2239 5.39085 16 5.66699 16V17ZM17.3862 9.30698L23.0528 16.182L22.2812 16.818L16.6145 9.94302L17.3862 9.30698ZM23.0528 16.818L17.3862 23.693L16.6145 23.057L22.2812 16.182L23.0528 16.818ZM22.667 17H5.66699V16H22.667V17Z"
                                    fill="white" />
                            </svg>
                        </button>
                    </form>

                    <button type="button" id="user-menu-button" class="relative flex px-6 text-sm"
                        onclick="window.location.href='/profile/edit';">
                        <svg width="34" height="33" viewBox="0 0 34 33" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.91699 9.80641V7.34289C9.91699 5.20503 9.91699 4.13611 10.6035 3.53824C11.29 2.94037 12.3488 3.08718 14.4664 3.38079L24.5744 4.78233C27.0414 5.1244 28.2749 5.29543 29.0126 6.14246C29.7503 6.9895 29.7503 8.23482 29.7503 10.7255V22.2745C29.7503 24.7652 29.7503 26.0105 29.0126 26.8575C28.2749 27.7046 27.0414 27.8756 24.5744 28.2177L14.4664 29.6192C12.3488 29.9128 11.29 30.0596 10.6035 29.4618C9.91699 28.8639 9.91699 27.795 9.91699 25.6571V23.4657"
                                    stroke="white" />
                                <path
                                    d="M22.667 16.5L23.0528 16.182L23.3149 16.5L23.0528 16.818L22.667 16.5ZM5.66699 17C5.39085 17 5.16699 16.7761 5.16699 16.5C5.16699 16.2239 5.39085 16 5.66699 16V17ZM17.3862 9.30698L23.0528 16.182L22.2812 16.818L16.6145 9.94302L17.3862 9.30698ZM23.0528 16.818L17.3862 23.693L16.6145 23.057L22.2812 16.182L23.0528 16.818ZM22.667 17H5.66699V16H22.667V17Z"
                                    fill="white" />
                            </svg>
                    </button>



                    <div class="relative ml-3">
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu, Hidden by default -->
        <div class="sm:hidden" id="mobile-menu" class="hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <a href="/home"
                    class="block rounded-md px-3 py-2 text-base font-medium text-white hover:text-[#A07658] {{ request()->is('home') ? 'text-[#A07658]' : '' }}">Home</a>
                <a href="/restaurants"
                    class="block rounded-md px-3 py-2 text-base font-medium text-white hover:text-[#A07658] {{ request()->is('restaurant') ? 'text-[#A07658]' : '' }}">Restaurant</a>
                <a href="/fusion"
                    class="block rounded-md px-3 py-2 text-base font-medium text-white hover:text-[#A07658] {{ request()->is('fusion') ? 'text-[#A07658]' : '' }}">Fusions</a>
                <a href="/orderstatus"
                    class="block rounded-md px-3 py-2 text-base font-medium text-white hover:text-[#A07658] {{ request()->is('orderstatus') ? 'text-[#A07658]' : '' }}">Order
                    Status</a>
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
