<x-layout>
    <x-navigation></x-navigation>
    <section>
        <div class="container mx-auto py-8 px-4">
            <h1 class="text-2xl font-bold mb-6">My Orders</h1>

            @if ($orderDetails->isEmpty())
                <div class="text-center py-8">
                    <p class="text-gray-500 text-lg">You don't have any orders yet</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach ($orderDetails as $order)
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                                <div>
                                    <p class="text-sm text-gray-500">Payment Status</p>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $order['paymentStatus'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $order['paymentStatus'] ? 'Paid' : 'Unpaid' }}
                                    </span>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Delivery Status</p>
                                    <p class="font-medium">{{ $order['deliveryStatus'] }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Price per Unit</p>
                                    <p class="font-medium">Rp {{ number_format($order['price'], 0, ',', '.') }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Quantity</p>
                                    <p class="font-medium">{{ $order['unit'] }} units</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Total Price</p>
                                    <p class="font-medium">Rp {{ number_format($order['totalPrice'], 0, ',', '.') }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Order Date</p>
                                    <p class="font-medium">
                                        {{ \Carbon\Carbon::parse($order['date'])->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-layout>
