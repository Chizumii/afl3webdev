<x-layout>
    <x-navigation></x-navigation>
    
    <section class="bg-gradient-to-b from-gray-50 to-white py-16">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Category Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $category->category_name }}</h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Discover the best {{ strtolower($category->category_name) }} restaurants in your area
                </p>
            </div>

            @if ($restaurants->isEmpty())
                <div class="text-center py-16">
                    <div class="bg-white rounded-lg shadow-sm p-8 max-w-md mx-auto">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <p class="text-gray-600 text-lg mb-2">No Restaurants Found</p>
                        <p class="text-gray-500">We couldn't find any restaurants in this category at the moment.</p>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($restaurants as $restaurant)
                        <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300">
                            <!-- Background Image -->
                            <div class="aspect-w-16 aspect-h-12 bg-gray-200">
                                <img 
                                    src="{{ $restaurant->resto->image_url ?? 'images/default.png' }}"
                                    alt="{{ $restaurant->resto->resto_name }}"
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500"
                                >
                            </div>
                            
                            <!-- Content Overlay -->
                            <a href="/restaurants/{{ $restaurant->resto->id }}" 
                               class="absolute inset-0 bg-gradient-to-t from-black via-black/70 to-transparent opacity-80 group-hover:opacity-90 transition-opacity duration-300">
                                <div class="absolute bottom-0 left-0 right-0 p-6">
                                    <h2 class="text-2xl font-bold text-white mb-2">
                                        {{ $restaurant->resto->resto_name }}
                                    </h2>
                                    
                                    <!-- Additional Restaurant Info -->
                                    <div class="flex items-center space-x-4 text-white/90">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Opening Hours
                                        </span>
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            Location
                                        </span>
                                    </div>

                                    <!-- View Restaurant Button -->
                                    <button class="mt-4 px-6 py-2 bg-white text-gray-900 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                        View Menu
                                    </button>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <x-footer/>
</x-layout>