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
                                    <p class="text-sm text-gray-500">Quantity</p>
                                    <p class="font-medium">{{ $order['unit'] }} units</p>
                                </div>

                                <!-- Price Per Unit -->
                                <div>
                                    <p class="text-sm text-gray-500">Price per Unit</p>
                                    <p class="font-medium">Rp {{ number_format($order['price'], 0, ',', '.') }}</p>
                                </div>

                                <!-- Total Price -->
                                <div>
                                    <p class="text-sm text-gray-500">Total Price</p>
                                    <p class="font-medium">Rp {{ number_format($order['totalPrice'], 0, ',', '.') }}</p>
                                </div>
                            </div>

                            <div class="mt-4 text-right">
                                <a href="{{ route('order.details', ['order_id' => $order['orderID']]) }}"
                                    class="text-blue-600 hover:underline">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-layout>
