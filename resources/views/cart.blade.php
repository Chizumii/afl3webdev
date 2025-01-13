<style>
    .work-sans {
        font-family: 'Work Sans', sans-serif;
    }
    
    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #2C1810;
        box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.2);
        z-index: 50;
    }
</style>

<x-layout>
    <x-navigation></x-navigation>

    <div class="container mx-auto py-8 px-4 mb-24">
        <div id="cart-items" class="space-y-2">
            @if (session('cart') && count(session('cart')) > 0)
                @foreach (session('cart') as $item)
                    <div class="bg-white rounded-lg p-3 border border-[#ebc892] hover:shadow-lg transition-all"
                        id="cart-item-{{ $item['id'] }}">
                        <div class="flex items-center gap-3">
                            <!-- Thumbnail Image -->
                            <div class="w-16 h-16 flex-shrink-0">
                                @php
                                    $images = explode(',', $item['images'][0]);
                                    $firstImage = trim($images[0]);
                                @endphp
                                <img src="{{ asset($firstImage) }}" alt="{{ $item['name'] }}"
                                    class="w-full h-full object-cover rounded-md">
                            </div>

                            <!-- Item Details -->
                            <div class="flex-1 min-w-0">
                                <h3 class="text-base font-semibold text-[#E2CEB1] truncate">{{ $item['name'] }}</h3>
                                <p class="text-sm text-[#E2CEB1]/80">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                            </div>

                            <!-- Quantity Input -->
                            <div class="flex items-center gap-2">
                                <input type="number" value="{{ $item['quantity'] }}" min="1"
                                    onchange="updateItemQuantity({{ $item['id'] }}, this.value)"
                                    class="w-16 text-center bg-transparent text-[#E2CEB1] border border-[#E2CEB1] rounded-lg focus:outline-none text-sm p-1">
                            </div>

                            <!-- Price -->
                            <div class="text-right min-w-[100px]">
                                <p class="text-base font-bold text-[#E2CEB1]">
                                    Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                </p>
                            </div>

                            <!-- Delete Button -->
                            <button onclick="removeItem({{ $item['id'] }})"
                                class="ml-2 p-2 text-red-400 hover:bg-red-400/10 rounded-lg transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-8 bg-[#412318] rounded-lg border border-[#E2CEB1]/20">
                    <p class="text-[#E2CEB1]">Your cart is empty.</p>
                </div>
            @endif
        </div>
    </div>

    <footer class="p-4">
        <div class="container mx-auto px-4 flex flex-col sm:flex-row justify-between items-center">
            <div class="text-lg font-semibold text-[#E2CEB1]">
                Items in Cart: <span id="total-items">{{ session('cart') ? collect(session('cart'))->sum('quantity') : 0 }}</span>
            </div>
            <div class="text-lg font-semibold text-[#E2CEB1] mt-2 sm:mt-0">
                Total: <span id="total-price">Rp{{ session('cart') ? number_format(collect(session('cart'))->sum(fn($item) => $item['price'] * $item['quantity']), 0, ',', '.') : 0 }}</span>
            </div>
        </div>
    </footer>
</x-layout>

<script>
    function updateCartDisplay(cart) {
        const cartItemsContainer = document.getElementById('cart-items');
        cartItemsContainer.innerHTML = '';

        let totalItems = 0;
        let totalPrice = 0;

        if (Object.keys(cart).length === 0) {
            cartItemsContainer.innerHTML = `
                <div class="text-center py-8 bg-[#412318] rounded-lg border border-[#E2CEB1]/20">
                    <p class="text-[#E2CEB1]">Your cart is empty.</p>
                </div>
            `;
        } else {
            Object.values(cart).forEach(item => {
                totalItems += item.quantity;
                totalPrice += item.price * item.quantity;

                const firstImage = item.images[0].split(',')[0].trim();

                cartItemsContainer.innerHTML += `
                    <div class="bg-[#412318] rounded-lg p-3 border border-[#E2CEB1]/20 hover:shadow-lg transition-all" id="cart-item-${item.id}">
                        <div class="flex items-center gap-3">
                            <div class="w-16 h-16 flex-shrink-0">
                                <img src="${firstImage}" 
                                     alt="${item.name}"
                                     class="w-full h-full object-cover rounded-md">
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <h3 class="text-base font-semibold text-[#E2CEB1] truncate">${item.name}</h3>
                                <p class="text-sm text-[#E2CEB1]/80">Rp ${new Intl.NumberFormat().format(item.price)}</p>
                            </div>
                            
                            <div class="flex items-center gap-2">
                                <input type="number" 
                                       value="${item.quantity}" 
                                       min="1" 
                                       onchange="updateItemQuantity(${item.id}, this.value)"
                                       class="w-16 text-center bg-transparent text-[#E2CEB1] border border-[#E2CEB1] rounded-lg focus:outline-none text-sm p-1">
                            </div>

                            <div class="text-right min-w-[100px]">
                                <p class="text-base font-bold text-[#E2CEB1]">
                                    Rp ${new Intl.NumberFormat().format(item.price * item.quantity)}
                                </p>
                            </div>

                            <button onclick="removeItem(${item.id})"
                                class="ml-2 p-2 text-red-400 hover:bg-red-400/10 rounded-lg transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                `;
            });
        }

        document.getElementById('total-items').innerText = totalItems;
        document.getElementById('total-price').innerText = `Rp ${new Intl.NumberFormat().format(totalPrice)}`;
    }
</script>