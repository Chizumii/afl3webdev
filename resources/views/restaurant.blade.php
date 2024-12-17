<head>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <style>
        .work-sans {
            font-family: 'Work Sans', sans-serif;
        }

        #menu-toggle:checked+#menu {
            display: block;
        }

        .hover\:grow {
            transition: all 0.3s;
            transform: scale(1);
        }

        .hover\:grow:hover {
            transform: scale(1.02);
        }

        .carousel-open:checked+.carousel-item {
            position: static;
            opacity: 100;
        }

        .carousel-item {
            -webkit-transition: opacity 0.6s ease-out;
            transition: opacity 0.6s ease-out;
        }

        #carousel-1:checked~.control-1,
        #carousel-2:checked~.control-2,
        #carousel-3:checked~.control-3 {
            display: block;
        }

        .carousel-indicators {
            list-style: none;
            margin: 0;
            padding: 0;
            position: absolute;
            bottom: 2%;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 10;
        }

        #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
        #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
        #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
            color: #000;
        }
    </style>
</head>
<body>
    <x-layout>

        <x-navigation></x-navigation>
        <x-slot:layoutTitle>{{ $pagetitle}}</x-slot:layoutTitle>
        <div class="text-gray-800 text-lg font-bold text-left ml-24 my-4">
            <label for="current-date" class="block mb-2">Pilih Tanggal:</label>
            <input type="date" id="current-date" name="current-date" class="border border-gray-400 rounded p-2"
                min="{{ now()->format('Y-m-d') }}" />
        </div>
        <section class="bg-white py-8">
            <div class="container mx-auto flex flex-wrap pt-4 pb-12">
                <?php
                $restaurants = collect([
                    (object)[
                        'name' => 'Restoran Padang Sederhana',
                        'menus' => collect([
                            (object)[
                                'name' => 'Rendang',
                                'description' => 'Daging sapi dimasak dengan bumbu kaya rempah.',
                                'image' => 'nayamgoreng.jpg',
                            ],
                            (object)[
                                'name' => 'Sate Padang',
                                'description' => 'Sate daging sapi dengan kuah kental dan pedas.',
                                'image' => 'nayamgoreng.jpg',
                            ],
                            (object)[
                                'name' => 'Nasi Padang',
                                'description' => 'Nasi putih dengan berbagai pilihan lauk.',
                                'image' => 'nayamgoreng.jpg',
                            ],
                        ]),
                    ],
                    (object)[
                        'name' => 'Restoran Sushi Tokyo',
                        'menus' => collect([
                            (object)[
                                'name' => 'Sushi Salmon',
                                'description' => 'Irisan salmon segar di atas nasi sushi.',
                                'image' => 'nayamgoreng.jpg',
                            ],
                            (object)[
                                'name' => 'Maki Sushi',
                                'description' => 'Sushi gulung dengan bahan pilihan seperti tuna dan alpukat.',
                                'image' => 'nayamgoreng.jpg',
                            ],
                            (object)[
                                'name' => 'Tempura',
                                'description' => 'Udang dan sayuran goreng tepung, renyah di luar dan lembut di dalam.',
                                'image' => 'nayamgoreng.jpg',
                            ],
                        ]),
                    ],
                ]);
                ?>
                @foreach ($restaurants as $restaurant)
                    <!-- Nama Restoran -->
                    <nav class="w-full z-30 top-0 px-6 py-1">
                        <div class="w-full container mx-auto flex flex-wrap items-center mt-0 px-2 py-3">
                            <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl"
                                href="#">
                                {{ $restaurant->name }}
                            </a>
                            <a class="ml-4 uppercase tracking-wide no-underline hover:underline font-bold text-gray-800 text-xl border-2 border-gray-800 py-2 px-4 rounded"
                                href="#">
                                Add to cart
                            </a>
                        </div>
                    </nav>
                    <!-- Daftar Menu -->
                    <div class="flex flex-wrap -mx-2">
                        @foreach ($restaurant->menus as $menu)
                            <div class="w-full md:w-1/3 xl:w-1/3 p-6 flex flex-col">
                                <a href="#">
                                    <img class="hover:grow hover:shadow-lg" src="{{ asset('images/' . $menu->image) }}"
                                        alt="{{ $menu->name }}">
                                    <div class="text-black pt-3 flex items-center justify-between">
                                        <p class="">{{ $menu->name }}</p>
                                    </div>
                                    <p class="pt-1 text-gray-500">{{ $menu->description }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </section>
    </x-layout>
</body>
