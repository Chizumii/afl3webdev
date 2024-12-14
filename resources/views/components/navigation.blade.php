<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
    <nav class="sticky top-0 bg-orange-900 z-50">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button -->
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex shrink-0 items-center">
                        <img class="h-8 w-auto" src="https://elearn.uc.ac.id/pluginfile.php/1/theme_lambda/logo/1727138432/LOGO-UC-PANJANG-FIX-SEP-2021-01.png" alt="Your Company">
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <!-- Add 'text-orange-900' class to the active link -->
                            <a href="/home" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-orange-200 {{ request()->is('home') ? 'text-orange-200' : '' }}" aria-current="page">Home</a>
                            <a href="/restaurant" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-orange-200 {{ request()->is('restaurant') ? 'text-orange-200' : '' }}">Restaurant</a>
                            <a href="/fusion" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-orange-200 {{ request()->is('fusion') ? 'text-orange-200' : '' }}">Fusions</a>
                            <a href="/orderstatus" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-orange-200 {{ request()->is('orderstatus') ? 'text-orange-200' : '' }}">Order Status</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button" class="relative rounded-full p-1 text-gray-400 hover:text-orange-900 focus:outline-none focus:ring-2">
                    </button>
                    <div class="relative ml-3">
                        <!-- User Menu -->
                        <button type="button" id="user-menu-button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User profile picture">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>
