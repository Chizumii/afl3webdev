<x-layout>
    <x-navigation></x-navigation>
    <section class="bg-white py-8">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
            @forelse ($categories as $category)
                <div class="border-2 border-gray-800 rounded-lg bg-cover bg-center flex items-center justify-center"
                    style="background-image: url('images/maknaan.png');">
                    <a href="/categories/{{ $category->id }}/restaurants" class="w-full text-center">
                        <div class="p-4">
                            <p class="text-xl font-semibold text-white px-4 py-2 rounded-md">
                                {{ $category->category_name }}
                            </p>
                        </div>
                    </a>
                </div>
            @empty
                <p class="text-center text-gray-500">No categories available.</p>
            @endforelse
        </div>
    </section>
    <x-footer />
</x-layout>
