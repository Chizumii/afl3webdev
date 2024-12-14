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
        <x-slot:layoutTitle>{{ $pagetitle }}</x-slot:layoutTitle>
        <section class="bg-white py-8">
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="border-2 border-gray-800 rounded-lg bg-cover bg-center flex items-center justify-center"
                    style="background-image: url('images/maknaan.png');">
                    <a href="/restaurant" class="w-full text-center">
                        <div class="p-4">
                            <p class="text-xl font-semibold text-white px-4 py-2 rounded-md">Indonesian Food</p>
                        </div>
                    </a>
                </div>
                <div class="border-2 border-gray-800 rounded-lg bg-cover bg-center flex items-center justify-center"
                    style="background-image: url('images/maknaan.png');">
                    <a href="/restaurant" class="w-full text-center">
                        <div class="p-4">
                            <p class="text-xl font-semibold text-white  px-4 py-2 rounded-md">Western Food</p>
                        </div>
                    </a>
                </div>
                <div class="border-2 border-gray-800 rounded-lg bg-cover bg-center flex items-center justify-center"
                    style="background-image: url('images/maknaan.png');">
                    <a href="/restaurant" class="w-full text-center">
                        <div class="p-4">
                            <p class="text-xl font-semibold text-white px-4 py-2 rounded-md">Indonesian Food</p>
                        </div>
                    </a>
                </div>
                <div class="border-2 border-gray-800 rounded-lg bg-cover bg-center flex items-center justify-center"
                    style="background-image: url('images/maknaan.png');">
                    <a href="/restauran" class="w-full text-center">
                        <div class="p-4">
                            <p class="text-xl font-semibold text-white  px-4 py-2 rounded-md">Western Food</p>
                        </div>
                    </a>
                </div>
            </div>

            </div>
        </section>

    </x-layout>


</body>
