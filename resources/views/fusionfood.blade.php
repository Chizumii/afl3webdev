    <x-layout>
        <x-navigation></x-navigation>
        <section class="bg-white py-8">
            <div class="container mx-auto">
                <h1 class="text-3xl font-bold text-gray-800 mb-6">Restaurants in "{{ $category->category_name }}"</h1>

                @if ($restaurants->isEmpty())
                    <p class="text-center text-gray-500">No restaurants available for this category.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($restaurants as $restaurant)
                            <div class="border-2 border-gray-800 rounded-lg bg-cover bg-center"
                                style="background-image: url('{{ $restaurant->resto->image_url ?? 'images/default.png' }}');">
                                <a href="/restaurants/{{ $restaurant->resto->id }}" class="block w-full h-full">
                                    <div class="p-4 bg-black bg-opacity-50 h-full flex flex-col justify-end rounded-lg">
                                        <h2 class="text-xl font-semibold text-white">
                                            {{ $restaurant->resto->resto_name }}
                                        </h2>
                                    </div>
                                </a>
                            </div>

                            <!-- Menampilkan Menu untuk Restoran Ini -->
                        @endforeach

                    </div>
                @endif
            </div>
        </section>
        <x-footer />
    </x-layout>
