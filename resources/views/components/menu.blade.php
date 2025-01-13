
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

<section class="bg-white py-12">
    <div class="container mx-auto px-4 max-w-7xl">
        <!-- Enhanced Date Filter -->
        <div class="mb-8 bg-[#FDF8F3] rounded-lg p-6 shadow-sm">
            <form method="GET" action="{{ route('menu.index') }}" class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <div class="relative">
                    <label for="selected_date" class="block text-lg font-medium text-gray-700 mb-2">Select Date</label>
                    <input 
                        type="date" 
                        id="selected_date" 
                        name="selected_date" 
                        class="w-full sm:w-auto border-2 border-[#E2CEB1] rounded-lg p-3 focus:ring-2 focus:ring-[#E2CEB1] focus:border-[#E2CEB1] outline-none transition-all"
                        value="{{ request('selected_date', now()->format('Y-m-d')) }}" 
                        min="{{ now()->format('Y-m-d') }}"
                    >
                </div>
                <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-[#E2CEB1] text-white rounded-lg hover:bg-[#D4BFA2] transition-all duration-300 font-medium text-lg mt-4 sm:mt-8">
                    Show Menu
                </button>
            </form>
        </div>

        <!-- Enhanced Menu Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @if ($menus->isEmpty())
                <div class="col-span-full text-center py-12">
                    <div class="bg-[#FDF8F3] rounded-lg p-8">
                        <p class="text-xl text-gray-600">No menu items available for the selected date.</p>
                    </div>
                </div>
            @else
                @foreach ($menus as $menu)
                    <div class="group bg-white rounded-xl border-2 border-[#E2CEB1] p-4 hover:shadow-xl transition-all duration-300" style="animation: fadeIn 0.5s ease-out {{ $loop->index * 0.1 }}s both;">
                        <!-- Enhanced Carousel -->
                        <div id="carousel-{{ $menu->id }}" class="relative rounded-lg overflow-hidden mb-4">
                            <div class="slides flex transition-transform duration-500 h-[250px]" style="transform: translateX(0);">
                                @php
                                    $images = explode(',', $menu->image);
                                @endphp
                                @foreach ($images as $image)
                                    <div class="flex-shrink-0 w-full">
                                        <img src="{{ asset(trim($image)) }}" 
                                             alt="{{ $menu->menu_name }}"
                                             class="w-full h-[250px] object-cover transition-transform duration-300 group-hover:scale-105">
                                    </div>
                                @endforeach
                            </div>
                            <!-- Enhanced Navigation Buttons -->
                            <button class="absolute left-2 top-1/2 -translate-y-1/2 bg-black/50 text-white w-8 h-8 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity"
                                    onclick="moveSlide('{{ $menu->id }}', -1, event)">
                                &#10094;
                            </button>
                            <button class="absolute right-2 top-1/2 -translate-y-1/2 bg-black/50 text-white w-8 h-8 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity"
                                    onclick="moveSlide('{{ $menu->id }}', 1, event)">
                                &#10095;
                            </button>
                        </div>

                        <!-- Enhanced Content -->
                        <div class="space-y-3">
                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1 bg-[#FDF8F3] text-sm rounded-full text-gray-600">
                                    {{ $menu->restos->resto_name ?? 'Unknown Name' }}
                                </span>
                            </div>
                            
                            <h3 class="text-xl font-semibold text-gray-800">{{ $menu->menu_name }}</h3>
                            
                            <p class="text-gray-600 text-sm line-clamp-2">{{ $menu->description }}</p>
                            
                            <div class="flex items-center justify-between pt-2">
                                <span class="text-xl font-bold text-gray-900">
                                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                                </span>
                            </div>

                            <button 
                                onclick="addToCart({{ $menu->id }}, '{{ $menu->menu_name }}', {{ $menu->price }}, '{{ $menu->image }}')"
                                class="w-full bg-[#E2CEB1] text-white py-3 rounded-lg hover:bg-[#D4BFA2] transition-all duration-300 flex items-center justify-center gap-2 mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<script>
    function addToCart(menuId, menuName, menuPrice, menuImages) {
        const imagesArray = menuImages.split(',').map(image => image.trim());
        
        // Add loading state to button
        const button = event.target.closest('button');
        const originalContent = button.innerHTML;
        button.innerHTML = '<svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';
        button.disabled = true;

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
                images: imagesArray,
                quantity: 1
            })
        })
        .then(response => response.json())
        .then(data => {
            // Success feedback
            button.innerHTML = '<svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>';
            setTimeout(() => {
                button.innerHTML = originalContent;
                button.disabled = false;
            }, 1500);

            // Show notification
            const notification = document.createElement('div');
            notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform transition-transform duration-300 translate-y-0';
            notification.textContent = data.message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.transform = 'translateY(200%)';
                setTimeout(() => notification.remove(), 300);
            }, 3000);

            updateCartDisplay(data.cart);
        })
        .catch(error => {
            console.error('Error:', error);
            button.innerHTML = originalContent;
            button.disabled = false;
        });
    }

    function moveSlide(menuId, direction, event) {
        event.preventDefault();
        const carousel = document.querySelector(`#carousel-${menuId} .slides`);
        const slideWidth = carousel.offsetWidth;
        const currentTransform = parseInt(getComputedStyle(carousel).transform.split(',')[4] || 0);
        const maxTransform = -(slideWidth * (carousel.children.length - 1));
        let newTransform = currentTransform + (direction * slideWidth);

        if (newTransform > 0) newTransform = 0;
        if (newTransform < maxTransform) newTransform = maxTransform;

        carousel.style.transform = `translateX(${newTransform}px)`;
    }
</script>