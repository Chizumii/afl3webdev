<script>
    function addToCart(menuId, menuName, menuPrice, menuImage) {
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
                image: menuImage,
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

    function updateCartDisplay(cart) {
        // Anda bisa mengupdate elemen tertentu jika cart ada di halaman lain
        const cartItemsContainer = document.getElementById('cart-items');

        if (cartItemsContainer) {
            cartItemsContainer.innerHTML = '';
            let totalItems = 0;
            let totalPrice = 0;

            Object.values(cart).forEach(item => {
                totalItems += item.quantity;
                totalPrice += item.price * item.quantity;

                cartItemsContainer.innerHTML += `
                    <div class="flex border-2 border-gray-800 rounded-lg p-4 mt-4">
                        <img src="${item.image}" alt="${item.name}" class="w-1/5 rounded-lg">
                        <div class="w-3/5 pl-4">
                            <p class="font-semibold text-xl">${item.name}</p>
                            <p class="text-gray-500">Rp ${new Intl.NumberFormat().format(item.price)}</p>
                            <p class="text-black">Quantity: ${item.quantity}</p>
                        </div>
                        <div class="w-1/5 text-right">
                            <p class="font-semibold text-xl">Rp ${new Intl.NumberFormat().format(item.price * item.quantity)}</p>
                        </div>
                    </div>
                `;
            });

            document.getElementById('total-items').innerText = totalItems;
            document.getElementById('total-price').innerText = `Rp ${new Intl.NumberFormat().format(totalPrice)}`;
        }
    }
</script>
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
                            <img class="hover:grow hover:shadow-lg border border-[#E2CEB1] rounded-lg"
                                src="{{ asset($menu->image) }}" alt="{{ $menu->menu_name }}">

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
                        <button type="button"
                            class="text-sm/6 mt-4 font-semibold text-gray-900 border border-[#E2CEB1] px-4 py-2 rounded-lg hover:bg-[#E2CEB1] hover:text-white"
                            onclick="addToCart({{ $menu->id }}, '{{ $menu->menu_name }}', {{ $menu->price }}, '{{ asset($menu->image) }}')">
                            Add To Cart
                        </button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
