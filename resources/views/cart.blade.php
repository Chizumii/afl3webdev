    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #f8f9fa;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            z-index: 50;
        }
    </style>

<body>
    <x-layout>
        <x-navigation></x-navigation>
        {{-- <x-slot:layoutTitle>{{ $pagetitle }}</x-slot:layoutTitle> --}}
        <div class="container mx-auto py-8">
            @if (session('cart') && count(session('cart')) > 0)
                @foreach (session('cart') as $item)
                    <div class="flex border-2 border-gray-800 rounded-lg p-4 mt-4">
                        <img src="{{ $item['image'] ?? asset('default-image.jpg') }}" alt="{{ $item['name'] }}"
                            class="w-20 h-20 rounded-lg">
                        <div class="w-3/5 pl-4">
                            <p class="font-semibold text-xl">{{ $item['name'] }}</p>
                            <p class="text-gray-500">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                            <p class="text-black">Quantity: {{ $item['quantity'] }}</p>
                        </div>
                        <div class="w-1/5 text-right">
                            <p class="font-semibold text-xl">Rp
                                {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-500">Keranjang belanja kosong.</p>
            @endif
        </div>
        <footer class="p-4 flex justify-between items-center">
            <div class="text-lg font-semibold ml-12">
                Total Belanjaan: <span
                    id="total-items">{{ session('cart') ? collect(session('cart'))->sum('quantity') : 0 }}</span>
            </div>
            <div class="text-lg font-semibold mr-12">
                Total Harga: <span
                    id="total-price">Rp{{ session('cart') ? number_format(collect(session('cart'))->sum(fn($item) => $item['price'] * $item['quantity']), 0, ',', '.') : 0 }}</span>
            </div>
        </footer>
    </x-layout>
</body>
