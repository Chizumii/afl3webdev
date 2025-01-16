<x-layout>
    <x-navigation></x-navigation>
    <section>
        <div class="container mx-auto py-8 px-4">
            <h1 class="text-2xl font-bold mb-6">My Orders</h1>

            @if ($orderDetails->isEmpty())
                <div class="text-center py-8">
                    <p class="text-gray-500 text-lg">You don't have any orders yet.</p>
                    <a href="{{ route('menu.index') }}" class="text-blue-600 hover:underline">
                        Browse Menu
                    </a>
                </div>
            @else
                <div class="space-y-6">
                    @foreach ($orderDetails as $order)
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex justify-between items-center border-b pb-4 mb-4">
                                <h2 class="text-lg font-semibold">Order ID: {{ $order['orderID'] }}</h2>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $order['paymentStatus'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $order['paymentStatus'] ? 'Paid' : 'Unpaid' }}
                                </span>
                            </div>

                            <!-- Order Items -->
                            <div class="mb-4">
                                <h3 class="text-md font-semibold mb-2">Order Items:</h3>
                                <div class="space-y-2">
                                    @foreach ($order['items'] as $item)
                                        <div class="flex justify-between items-center bg-gray-50 p-2 rounded">
                                            <span class="text-gray-800">{{ $item['name'] }}</span>
                                            <div class="flex items-center gap-4">
                                                <span class="text-gray-600">x{{ $item['quantity'] }}</span>
                                                <span class="text-gray-800 font-medium">
                                                    Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                                </span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <!-- Delivery Status -->
                                <div>
                                    <p class="text-sm text-gray-500">Delivery Status</p>
                                    <p class="font-medium">{{ $order['deliveryStatus'] }}</p>
                                </div>

                                <!-- Order Date -->
                                <div>
                                    <p class="text-sm text-gray-500">Order Date</p>
                                    <p class="font-medium">
                                        {{ \Carbon\Carbon::parse($order['date'])->format('d M Y H:i') }}
                                    </p>
                                </div>

                                <!-- Quantity -->
                                <div>
                                    <p class="text-sm text-gray-500">Total Items</p>
                                    <p class="font-medium">{{ $order['unit'] }} units</p>
                                </div>

                                <!-- Total Price -->
                                <div>
                                    <p class="text-sm text-gray-500">Total Price</p>
                                    <p class="font-medium">Rp {{ number_format($order['totalPrice'], 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-layout>