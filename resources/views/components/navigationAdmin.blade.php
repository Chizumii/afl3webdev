<nav class="bg-gray-800 shadow-lg">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo Section -->
            <div class="flex items-center">
                <div class="shrink-0  p-4 rounded-lg shadow-md text-center">
                    <h1 class="text-white text-2xl font-semibold tracking-wider">ADMIN</h1>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-6">
                <a href="{{ '/admin' }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-md text-sm font-medium">Welcome</a>
                <a href="{{ '/restaurantAdmin' }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-md text-sm font-medium">Restaurant</a>
                <a href="{{ '/menuAdmin' }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-md text-sm font-medium">Menu</a>
                <a href="{{ '/menuDateAdmin' }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-md text-sm font-medium">Menu Date</a>
                <a href="{{ '/userlist' }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-md text-sm font-medium">User</a>
                <a href="{{ '/orderstatusAdmin' }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-md text-sm font-medium">Order Status</a>
                <a href="{{ '/orderdetailAdmin' }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-md text-sm font-medium">Order Detail</a>
                
                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" id="logout-form" class="inline-block">
                    @csrf
                    <button type="submit" class="flex items-center text-white hover:text-gray-300">
                        <svg width="34" height="33" viewBox="0 0 34 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.91699 9.80641V7.34289C9.91699 5.20503 9.91699 4.13611 10.6035 3.53824C11.29 2.94037 12.3488 3.08718 14.4664 3.38079L24.5744 4.78233C27.0414 5.1244 28.2749 5.29543 29.0126 6.14246C29.7503 6.9895 29.7503 8.23482 29.7503 10.7255V22.2745C29.7503 24.7652 29.7503 26.0105 29.0126 26.8575C28.2749 27.7046 27.0414 27.8756 24.5744 28.2177L14.4664 29.6192C12.3488 29.9128 11.29 30.0596 10.6035 29.4618C9.91699 28.8639 9.91699 27.795 9.91699 25.6571V23.4657" stroke="white" />
                            <path d="M22.667 16.5L23.0528 16.182L23.3149 16.5L23.0528 16.818L22.667 16.5ZM5.66699 17C5.39085 17 5.16699 16.7761 5.16699 16.5C5.16699 16.2239 5.39085 16 5.66699 16V17ZM17.3862 9.30698L23.0528 16.182L22.2812 16.818L16.6145 9.94302L17.3862 9.30698ZM23.0528 16.818L17.3862 23.693L16.6145 23.057L22.2812 16.182L23.0528 16.818ZM22.667 17H5.66699V16H22.667V17Z" fill="white" />
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <div class="-mr-2 flex md:hidden">
                <button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M3 12h18M3 6h18M3 18h18" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <a href="{{ '/admin' }}" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Welcome</a>
            <a href="{{ '/restaurantAdmin' }}" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Restaurant</a>
            <a href="{{ '/menuAdmin' }}" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Menu</a>
            <a href="{{ '/menuDateAdmin' }}" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Menu Date</a>
            <a href="{{ '/userlist' }}" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">User</a>
            <a href="{{ '/orderstatusAdmin' }}" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Order Status</a>
            <a href="{{ '/orderdetailAdmin' }}" class="block px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Order Detail</a>

            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
                <button type="submit" class="flex items-center px-4 py-2 text-sm text-gray-300 hover:bg-gray-700 hover:text-white">
                    <svg width="34" height="33" viewBox="0 0 34 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.91699 9.80641V7.34289C9.91699 5.20503 9.91699 4.13611 10.6035 3.53824C11.29 2.94037 12.3488 3.08718 14.4664 3.38079L24.5744 4.78233C27.0414 5.1244 28.2749 5.29543 29.0126 6.14246C29.7503 6.9895 29.7503 8.23482 29.7503 10.7255V22.2745C29.7503 24.7652 29.7503 26.0105 29.0126 26.8575C28.2749 27.7046 27.0414 27.8756 24.5744 28.2177L14.4664 29.6192C12.3488 29.9128 11.29 30.0596 10.6035 29.4618C9.91699 28.8639 9.91699 27.795 9.91699 25.6571V23.4657" stroke="white" />
                        <path d="M22.667 16.5L23.0528 16.182L23.3149 16.5L23.0528 16.818L22.667 16.5ZM5.66699 17C5.39085 17 5.16699 16.7761 5.16699 16.5C5.16699 16.2239 5.39085 16 5.66699 16V17ZM17.3862 9.30698L23.0528 16.182L22.2812 16.818L16.6145 9.94302L17.3862 9.30698ZM23.0528 16.818L17.3862 23.693L16.6145 23.057L22.2812 16.182L23.0528 16.818ZM22.667 17H5.66699V16H22.667V17Z" fill="white" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>
