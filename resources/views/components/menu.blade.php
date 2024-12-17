<section class="bg-white py-8">
    <div class="container mx-auto flex flex-wrap pt-4 pb-12">

        {{-- @foreach ($menus as $restaurant)
            <!-- Nama Restoran -->
            <nav class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex flex-wrap items-center mt-0 px-2 py-3">
                    <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl"
                        href="#">
                        {{ $restaurant->menu_name }}
                    </a>
                    <a class="ml-4 uppercase tracking-wide no-underline hover:underline font-bold text-gray-800 text-xl border-2 border-gray-800 py-2 px-4 rounded"
                        href="#">
                        Add to cart
                    </a>
                </div>
            </nav> --}}
            <!-- Daftar Menu -->
            <div class="flex flex-wrap -mx-2">
                @foreach ($menus as $menu)
                    <div class="w-full md:w-1/3 xl:w-1/3 p-6 flex flex-col">
                        <a href="#">
                            <img class="hover:grow hover:shadow-lg"
                                src="
                            {{ asset($menu->image) }}
                             "
                                alt="
                                  {{-- {{ $menu->menu_name }}   --}}
                                 ">
                            <div class="text-black pt-3 flex items-center justify-between">
                                <p class="">
                                    {{ $menu->menu_name }} </p>
                            </div>
                            <p class="pt-1 text-gray-500">
                                {{ $menu->description }}
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>
        {{-- @endforeach --}}
    </div>
</section>
