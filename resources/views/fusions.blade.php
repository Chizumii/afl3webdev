<x-layout>
    <x-navigation></x-navigation>
    
    <section class="bg-gradient-to-b from-gray-50 to-white py-16">
        <div class="container mx-auto px-4 max-w-7xl">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-900 mb-4">Food Categories</h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Explore our diverse selection of cuisines and dining experiences
                </p>
            </div>

            @if ($categories->isEmpty())
                <div class="text-center py-16">
                    <div class="bg-white rounded-lg shadow-sm p-8 max-w-md mx-auto">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                        <p class="text-gray-600 text-lg mb-2">No Categories Available</p>
                        <p class="text-gray-500">Check back soon for our updated category listings.</p>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($categories as $category)
                        <a href="/categories/{{ $category->id }}/restaurants" 
                           class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                            <!-- Background Image with Overlay -->
                            <div class="aspect-w-16 aspect-h-12 bg-gray-900">
                                <img 
                                    src="images/maknaan.png" 
                                    alt="{{ $category->category_name }}"
                                    class="w-full h-full object-cover opacity-80 group-hover:opacity-70 group-hover:scale-110 transition-all duration-500"
                                >
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent"></div>
                            </div>

                            <!-- Category Content -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center">
                                <!-- Category Icon (you can customize based on category) -->
                                <div class="mb-4 transform group-hover:-translate-y-2 transition-transform duration-300">
                                    <svg class="w-12 h-12 text-white opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>

                                <!-- Category Name -->
                                <h2 class="text-2xl font-bold text-white mb-2 transform group-hover:-translate-y-1 transition-transform duration-300">
                                    {{ $category->category_name }}
                                </h2>

                                <!-- Hover Effect Button -->
                                <span class="inline-flex items-center px-4 py-2 bg-white/90 text-gray-900 rounded-lg opacity-0 transform translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300">
                                    Explore Restaurants
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <x-footer />
</x-layout>