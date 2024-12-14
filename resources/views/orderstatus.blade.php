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
            <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
                <div class="w-full md:w-2/3 xl:w-full p-6 flex border-2 border-gray-800 rounded-lg">
                    <a href="#" class="flex w-full">
                        
                        <div class="w-2/3 pl-4 flex">
                            <img class="hover:grow hover:shadow-lg w-1/5 rounded-lg" src="images/nayamgoreng.jpg" alt="Nasi Ayam Goreng">
                            <div class="w-2/3 pl-4">
                                <div class="text-black pt-3 flex items-center justify-between">
                                    <p class="text-xl font-semibold">Nasi Ayam Goreng Complete</p>
                                </div>
                                <p class="pt-1 text-gray-500">Nasi + Ayam + dll</p>
                            </div>
                        </div>
                        <div class="w-1/3 flex items-center justify-center border-l-2 border-gray-800 pl-4 pr-4">
                            <p class="text-lg font-semibold">1</p> 
                        </div>
                    </a>
                </div>
                <div class="w-full md:w-2/3 xl:w-full p-6 flex border-2 border-gray-800 rounded-lg mt-4">
                    <a href="#" class="flex w-full">
                        
                        <div class="w-2/3 pl-4 flex">
                            <img class="hover:grow hover:shadow-lg w-1/5 rounded-lg" src="images/nayamgoreng.jpg" alt="Nasi Ayam Goreng">
                            <div class="w-2/3 pl-4">
                                <div class="text-black pt-3 flex items-center justify-between">
                                    <p class="text-xl font-semibold">Nasi Ayam Goreng Complete</p>
                                </div>
                                <p class="pt-1 text-gray-500">Nasi + Ayam + dll</p>
                            </div>
                        </div>
                        <div class="w-1/3 flex items-center justify-center border-l-2 border-gray-800 pl-4 pr-4">
                            <p class="text-lg font-semibold">1</p> 
                        </div>
                    </a>
                </div>
                <div class="w-full md:w-2/3 xl:w-full p-6 flex border-2 border-gray-800 rounded-lg mt-4">
                    <a href="#" class="flex w-full">
                        
                        <div class="w-2/3 pl-4 flex">
                            <img class="hover:grow hover:shadow-lg w-1/5 rounded-lg" src="images/nayamgoreng.jpg" alt="Nasi Ayam Goreng">
                            <div class="w-2/3 pl-4">
                                <div class="text-black pt-3 flex items-center justify-between">
                                    <p class="text-xl font-semibold">Nasi Ayam Goreng Complete</p>
                                </div>
                                <p class="pt-1 text-gray-500">Nasi + Ayam + dll</p>
                            </div>
                        </div>
                        <div class="w-1/3 flex items-center justify-center border-l-2 border-gray-800 pl-4 pr-4">
                            <p class="text-lg font-semibold">1</p> 
                        </div>
                    </a>
                </div>
                
                
                
                
            </div>
        </section>
    </x-layout>


</body>
