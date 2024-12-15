<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
    <nav class="sticky top-0 bg-[#E2CEB1] z-50">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                </div>
                <div class="flex shrink-0 items-center">
                    <img class="h-10 w-auto" src="images/logos.png" alt="Logo">
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="/" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-[#A07658] {{ request()->is('home') ? 'text-[#A07658]' : '' }}" aria-current="page">Home</a>
                            <a href="/restaurant" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-[#A07658]{{ request()->is('restaurant') ? 'text-[#A07658]' : '' }}">Restaurant</a>
                            <a href="/fusion" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-[#A07658] {{ request()->is('fusion') ? 'text-[#A07658]' : '' }}">Fusions</a>
                            <a href="/orderstatus" class="rounded-md px-3 py-2 text-sm font-medium text-white hover:text-[#A07658] {{ request()->is('orderstatus') ? 'text-[#A07658]' : '' }}">Order Status</a>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button" class="relative rounded-full p-1 text-gray-400 hover:text-orange-900 focus:outline-none focus:ring-2">
                    </button>
                    <div class="relative ml-3">
                        <button type="button" id="user-menu-button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User profile picture">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>
