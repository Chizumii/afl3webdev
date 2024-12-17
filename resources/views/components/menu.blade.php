<section class="bg-white py-8">
    <div class="container mx-auto flex flex-wrap pt-4 pb-12">

        <div class="flex flex-wrap -mx-2">
            @foreach ($menus  as $menu)
                <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                    <a href="#">
                        <img class="hover:grow hover:shadow-lg"
                            src="
                            {{ asset($menu->image) }}
                             "
                            alt=" ">
                        <div class="text-black pt-3 flex items-center justify-between">
                            <p class="font-semibold text-m">
                                {{ $menu->restos->resto_name ?? 'Unknown Name' }}
                            </p>
                        </div>
                        <div class="text-black pt-3 flex items-center justify-between">
                            <p class="font-semibold text-l">
                                {{ $menu->menu_name }} </p>
                        </div>
                        <p class="pt-1 text-gray-500" style="font-size: 12px;">
                            {{ $menu->description }}
                        </p>
                        
                        <div class="text-black pt-3 flex items-center justify-between">
                            <p class="text-l">
                               Rp {{ $menu->price }}0
                            </p>
                        </div>
                        
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</section>
