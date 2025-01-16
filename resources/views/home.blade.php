<x-layout>
    <x-navigation></x-navigation>
    <div class="carousel relative container mx-auto" style="max-width:1600px;">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
            <div class="carousel-item absolute opacity-0 transition-opacity duration-300 w-screen h-screen">                <div class="block h-full w-full mx-auto flex items-center bg-cover bg-right"
                    style="background-image: url('{{ asset('images/maknaan.png') }}');">
                    <div class="container mx-auto px-4">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start">
                            <h1 class="text-white text-5xl font-bold mb-6">WELCOME TO KATERINGKU</h1>
                            @guest
                                <a class="text-xl px-6 py-2 bg-white text-gray-800 rounded-lg hover:bg-gray-100 transition-colors duration-200"
                                    href="/login">Sign in</a>
                            @else
                                <p class="text-xl text-white bg-black bg-opacity-50 px-4 py-2 rounded">
                                    Hello, {{ Auth::user()->username }}! Enjoy your experience with us.
                                </p>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0 transition-opacity duration-300 w-screen h-screen">                <div class="block h-full w-full mx-auto flex items-center bg-cover bg-right"
                    style="background-image: url('{{ asset('images/home2.png') }}');">
                    <div class="container mx-auto px-4">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start">
                            <h1 class="text-white text-5xl font-bold mb-6">WELCOME TO KATERINGKU</h1>
                            @guest
                                <a class="text-xl px-6 py-2 bg-white text-gray-800 rounded-lg hover:bg-gray-100 transition-colors duration-200"
                                    href="/login">Sign in</a>
                            @else
                                <p class="text-xl text-white bg-black bg-opacity-50 px-4 py-2 rounded">
                                    Hello, {{ Auth::user()->username }}! Enjoy your experience with us.
                                </p>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0 transition-opacity duration-300 w-screen h-screen">                <div class="block h-full w-full mx-auto flex items-center bg-cover bg-bottom"
                    style="background-image: url('{{ asset('images/home3.png') }}');">
                    <div class="container mx-auto px-4">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start">
                            <h2 class="text-white text-4xl font-bold mb-6">Enjoy Our Menu</h2>
                            <a class="text-xl px-6 py-2 bg-white text-gray-800 rounded-lg hover:bg-gray-100 transition-colors duration-200"
                                href="#">View Products</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Arrows -->
            <div class="absolute inset-y-0 left-0 flex items-center">
                <label for="carousel-3" class="prev control-1 cursor-pointer ml-4 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-3 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </label>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center">
                <label for="carousel-2" class="next control-1 cursor-pointer mr-4 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-3 transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </label>
            </div>

            <!-- Indicators -->
            <div class="absolute bottom-0 w-full flex justify-center pb-4">
                <div class="flex space-x-3">
                    <label for="carousel-1" class="carousel-bullet w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 cursor-pointer transition-all duration-200"></label>
                    <label for="carousel-2" class="carousel-bullet w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 cursor-pointer transition-all duration-200"></label>
                    <label for="carousel-3" class="carousel-bullet w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 cursor-pointer transition-all duration-200"></label>
                </div>
            </div>
        </div>
    </div>

    <x-footer />
</x-layout>