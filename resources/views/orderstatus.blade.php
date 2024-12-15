<head>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

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

    <script>
        // Fungsi untuk menghapus item dari daftar
        function deleteItem(orderId) {
            // Mengirimkan permintaan AJAX untuk menghapus item
            fetch(`/delete-order/${orderId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Menghapus item dari DOM
                    const itemElement = document.getElementById(`order-${orderId}`);
                    itemElement.remove();

                    // Mengupdate total item dan total harga
                    const totalItems = data.totalItems;
                    const totalPrice = data.totalPrice;

                    document.getElementById('total-items').textContent = totalItems;
                    document.getElementById('total-price').textContent = 'Rp' + new Intl.NumberFormat().format(totalPrice);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</head>

<body>
    <x-layout>
        <x-slot:layoutTitle>{{ $pagetitle }}</x-slot:layoutTitle>

        <?php
        $orders = collect([
            (object)[
                'id' => 1,
                'name' => 'Laptop Gaming',
                'description' => 'Laptop dengan spesifikasi tinggi untuk gaming.',
                'price' => 15000000,
                'quantity' => 1,
                'image' => 'laptop-gaming.jpg',
            ],
            (object)[
                'id' => 2,
                'name' => 'Smartphone',
                'description' => 'Smartphone terbaru dengan kamera canggih.',
                'price' => 8000000,
                'quantity' => 1,
                'image' => 'smartphone.jpg',
            ],
            (object)[
                'id' => 3,
                'name' => 'Headphones',
                'description' => 'Headphones noise-canceling untuk pengalaman audio terbaik.',
                'price' => 2500000,
                'quantity' => 1,
                'image' => 'headphones.jpg',
            ],
        ]);
        $totalItems = $orders->sum('quantity');
        $totalPrice = $orders->sum(function ($order) {
            return $order->price * $order->quantity;
        });
        ?>

        <section class="bg-white py-8">
            <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
                @if($orders->isEmpty())
                    <div class="w-full text-center">
                        <p class="text-xl font-semibold text-gray-500">Anda belum memiliki orderan</p>
                    </div>
                @else
                    @foreach($orders as $order)
                        <div id="order-{{ $order->id }}" class="w-full md:w-2/3 xl:w-full p-6 flex border-2 border-gray-800 rounded-lg mt-4">
                            <a href="#" class="flex w-full">
                                <div class="w-2/3 pl-4 flex">
                                    <img class="hover:grow hover:shadow-lg w-1/5 rounded-lg" src="{{ asset('storage/' . $order->image) }}" alt="{{ $order->name }}">
                                    <div class="w-2/3 pl-4">
                                        <div class="text-black pt-3 flex items-center justify-between">
                                            <p class="text-xl font-semibold">{{ $order->name }}</p>
                                        </div>
                                        <p class="pt-1 text-gray-500">{{ $order->description }}</p>
                                        <p class="pt-1 text-black">Rp {{ number_format($order->price, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <div class="w-1/3 flex items-center justify-center border-l-2 border-gray-800 pl-4 pr-4">
                                    <p class="text-lg font-semibold">{{ $order->quantity }}</p>
                                </div>
                                <svg onclick="deleteItem({{ $order->id }})" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 ml-4 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3m-4 0h14" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
        
        <footer class="p-4 flex justify-between items-center">
            <div class="text-lg font-semibold ml-12">
                Total Belanjaan: <span id="total-items">{{ $totalItems }}</span>
            </div>
            <div class="text-lg font-semibold mr-12">
                Total Harga: <span id="total-price">Rp{{ number_format($totalPrice, 0, ',', '.') }}</span>
            </div>
        </footer>
        
    </x-layout>
</body>
