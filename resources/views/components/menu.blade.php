<section class="bg-white py-8">
    <div class="container mx-auto">
        <!-- Form to Filter by Date -->
        <div class="mb-6 text-center">
            <form method="GET" action="{{ route('menu.index') }}">
                <label for="selected_date" class="mr-2 font-medium">Pilih Tanggal:</label>
                <input type="date" id="selected_date" name="selected_date" class="border border-gray-400 rounded p-2"
                    value="{{ request('selected_date', now()->format('Y-m-d')) }}" min="{{ now()->format('Y-m-d') }}">
                <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Filter
                </button>
            </form>
        </div>

        <!-- Daftar Menu -->
        <div class="flex flex-wrap pt-4 pb-12 -mx-2">
            @if ($menus->isEmpty())
                <p class="text-center text-gray-500 w-full">Tidak ada menu tersedia untuk tanggal yang dipilih.</p>
            @else
                @foreach ($menus as $menu)
                    <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col mt-4 border border-[#E2CEB1] rounded-lg">
                        <a href="#">
                            <!-- Carousel Gambar -->
                            <div id="carousel-{{ $menu->id }}" class="relative" style="height: 200px; overflow: hidden;">
                                <div class="slides flex transition-transform duration-500" style="transform: translateX(0);">
                                    @php
                                        $images = explode(',', $menu->image); // Pecah gambar berdasarkan koma
                                    @endphp
                            
                                    @foreach ($images as $image)
                                        <div class="flex-shrink-0 w-full h-full">
                                            <img src="{{ asset(trim($image)) }}" alt="{{ $menu->menu_name }}"
                                                class="w-full h-full object-cover rounded-lg">
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Tombol Navigasi -->
                                <button class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded"
                                    onclick="moveSlide('{{ $menu->id }}', -1, event)">&#10094;</button>
                                <button class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-2 py-1 rounded"
                                    onclick="moveSlide('{{ $menu->id }}', 1, event)">&#10095;</button>
                            </div>

                            <!-- Informasi Menu -->
                            <div class="text-black pt-3 flex items-center justify-between">
                                <p class="font-semibold text-m">
                                    {{ $menu->restos->resto_name ?? 'Unknown Name' }}
                                </p>
                            </div>

                            <div class="text-black pt-3 flex items-center justify-between">
                                <p class="font-semibold text-l">
                                    {{ $menu->menu_name }}
                                </p>
                            </div>

                            <p class="pt-1 text-gray-500" style="font-size: 12px;">
                                {{ $menu->description }}
                            </p>

                            <div class="text-black pt-3 flex items-center justify-between">
                                <p class="text-l">
                                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                                </p>
                            </div>
                        </a>

                        <!-- Tombol Add To Cart -->
                        <button type="button"
                            class="text-sm/6 mt-4 font-semibold text-gray-900 border border-[#E2CEB1] px-4 py-2 rounded-lg hover:bg-[#E2CEB1] hover:text-white"
                            onclick="addToCart({{ $menu->id }}, '{{ $menu->menu_name }}', {{ $menu->price }}, '{{ $menu->image }}')">
                            Add To Cart
                        </button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<script>
    function addToCart(menuId, menuName, menuPrice, menuImages) {
        const imagesArray = menuImages.split(',').map(image => image.trim()); // Pecah string gambar menjadi array
        fetch('{{ route('cart.add') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                id: menuId,
                name: menuName,
                price: menuPrice,
                images: imagesArray, // Kirim array gambar ke cart
                quantity: 1 // Default quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                alert(data.message); // Notifikasi berhasil
                updateCartDisplay(data.cart); // Perbarui tampilan cart
            }
        })
        .catch(error => console.error('Error:', error));
    }

    function moveSlide(menuId, direction, event) {
        event.preventDefault(); // Mencegah halaman reload atau scroll ke atas

        const carousel = document.querySelector(`#carousel-${menuId} .slides`);
        const slideWidth = carousel.offsetWidth;
        const currentTransform = parseInt(getComputedStyle(carousel).transform.split(',')[4] || 0);
        const maxTransform = -(slideWidth * (carousel.children.length - 1));
        let newTransform = currentTransform + (direction * slideWidth);

        if (newTransform > 0) newTransform = 0; // Cegah ke kiri terlalu jauh
        if (newTransform < maxTransform) newTransform = maxTransform; // Cegah ke kanan terlalu jauh

        carousel.style.transform = `translateX(${newTransform}px)`;
    }
</script>
