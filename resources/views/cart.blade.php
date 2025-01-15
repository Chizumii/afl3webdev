<x-layout>
    <x-navigation></x-navigation>

    <div class="container mx-auto py-8 px-4 mb-24">
        <div id="cart-items" class="space-y-2">
            @if (session('cart') && count(session('cart')) > 0)
                @foreach (session('cart') as $item)
                    <div class="bg-[#f6f6f6] p-3 transition-all" id="cart-item-{{ $item['id'] }}">
                        <div class="flex items-center gap-3">
                            <div class="w-16 h-16 flex-shrink-0">
                                @php
                                    $images = explode(',', $item['images'][0]);
                                    $firstImage = trim($images[0]);
                                @endphp
                                <img src="{{ asset($firstImage) }}" alt="{{ $item['name'] }}"
                                    class="w-full h-full object-cover rounded-md">
                            </div>

                            <div class="flex-1 min-w-0">
                                <h3 class="text-base font-semibold text-[#A07658] truncate">{{ $item['name'] }}</h3>
                                <p class="text-sm text-[#A07658]/80">Rp {{ number_format($item['price'], 0, ',', '.') }}
                                </p>
                            </div>

                            <div class="flex items-center gap-2">
                                <input type="text" value="{{ $item['quantity'] }}"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                    onchange="updateItemQuantity({{ $item['id'] }}, this.value)"
                                    class="w-16 text-center bg-transparent text-[#A07658] border border-[#E2CEB1] focus:outline-none text-sm p-1">
                            </div>

                            <div class="text-right min-w-[100px]">
                                <p class="text-base font-bold text-[#A07658]">
                                    Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                </p>
                            </div>

                            <form action="{{ route('cart.remove') }}" method="POST" class="inline"
                                id="remove-form-{{ $item['id'] }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <button type="button"
                                    class="ml-2 p-2 text-red-400 hover:bg-red-400/10 rounded-lg transition-colors remove-item-button"
                                    data-id="{{ $item['id'] }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center py-8 bg-[#f6f6f6] rounded-lg border border-[#E2CEB1]/20">
                    <p class="text-[#A07658]">Your cart is empty.</p>
                </div>
            @endif
        </div>
    </div>

    <footer class="fixed bottom-0 left-0 right-0 bg-white p-4 border-t border-[#ebc892]">
        <div class="container mx-auto">
            <div class="relative flex items-center justify-between">
                <div class="text-lg text-[#A07658] font-normal">
                    Items in Cart: <span
                        id="total-items">{{ session('cart') ? collect(session('cart'))->sum('quantity') : 0 }}</span>
                </div>

                <form id="payment-form" class="w-full" onsubmit="event.preventDefault(); confirmPayment();">
                    @csrf
                    <button type="submit" id="confirm-payment-btn"
                        class="w-full bg-[#b9945d] text-white py-3 rounded-lg hover:bg-[#8d642b] transition-all duration-300 flex items-center justify-center gap-2 mt-4 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="button-text">Confirm Payment</span>
                        </span>
                    </button>
                </form>

                <div class="text-lg text-[#A07658] font-normal">
                    Total: <span id="total-price">Rp
                        {{ session('cart') ? number_format(collect(session('cart'))->sum(fn($item) => $item['price'] * $item['quantity']), 0, ',', '.') : 0 }}</span>
                </div>
            </div>
        </div>
    </footer>
</x-layout>
<script>
    function confirmPayment() {
        const button = document.getElementById('confirm-payment-btn');
        const buttonText = button.querySelector('.button-text');
        const originalContent = buttonText.innerHTML;
        
        // Disable button and show loading state
        button.disabled = true;
        buttonText.innerHTML = 'Processing...';
        
        fetch('{{ route('confirmPayment') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            // Create success notification
            const notification = document.createElement('div');
            notification.className = 'fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-fade-in';
            notification.textContent = 'Order confirmed successfully!';
            document.body.appendChild(notification);
    
            // Remove notification after 3 seconds
            setTimeout(() => {
                notification.classList.add('animate-fade-out');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
    
            // Redirect to order status page after 1.5 seconds
            setTimeout(() => {
                window.location.href = '{{ route('orderstatus') }}';
            }, 1500);
        })
        .catch(error => {
            console.error('Error:', error);
            
            // Reset button state
            button.disabled = false;
            buttonText.innerHTML = originalContent;
            
            // Show error notification
            const notification = document.createElement('div');
            notification.className = 'fixed bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-fade-in';
            notification.textContent = 'Error processing your order. Please try again.';
            document.body.appendChild(notification);
    
            // Remove notification after 3 seconds
            setTimeout(() => {
                notification.classList.add('animate-fade-out');
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        });
    }
    
    // Add these CSS animations to your stylesheet or in a style tag
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(1rem); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-out {
            from { opacity: 1; transform: translateY(0); }
            to { opacity: 0; transform: translateY(1rem); }
        }
        .animate-fade-in {
            animation: fade-in 0.3s ease-out;
        }
        .animate-fade-out {
            animation: fade-out 0.3s ease-out;
        }
    `;
    document.head.appendChild(style);
    </script>
