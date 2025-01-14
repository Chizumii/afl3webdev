<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img class="size-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ '/admin' }}"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Welcome</a>
                        <a href="{{ '/restaurantAdmin' }}"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Restaurant</a>
                        <a href="{{ '/menuAdmin' }}"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Menu</a>
                        <a href="{{ '/menuDateAdmin' }}"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Menu
                            Date</a>
                        <a href="{{ '/userlist' }}"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">User</a>
                        <a href="{{ '/orderstatusAdmin' }}"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Order
                            Status</a>
                        <a href="{{ '/orderdetailAdmin' }}"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Order
                            Detail</a>
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
                    </div>
                </div>
            </div>

            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ '/admin' }}"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Welcome</a>
            <a href="{{ '/restaurantAdmin' }}"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Restaurant</a>
            <a href="{{ '/menuAdmin' }}"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Menu</a>
            <a href="{{ '/menuDateAdmin' }}"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Menu
                Date</a>
            <a href="{{ '/userlist' }}"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">User</a>
            <a href="{{ '/orderstatusAdmin' }}"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Order
                User</a>
            <a href="{{ '/orderdetailAdmin' }}"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Order
                Details</a>
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
        </div>
    </div>
</nav>
