<x-layout>
    <x-navigation></x-navigation>
    <section class="bg-[#FDF8F3]">
        <div class="container mx-auto py-8 px-4">
            <h1 class="text-2xl font-bold mb-6 text-[#A07658]">My Orders</h1>

            @if ($orders->isEmpty())
                <div class="text-center py-8 bg-white rounded-lg shadow-sm">
                    <p class="text-gray-500 text-lg">You don't have any orders yet</p>
                </div>
            @else
                <div class="space-y-4">
                    @foreach ($orders as $order)
                        <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                            <!-- Order Header -->
                            <div class="border-b pb-4 mb-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-500">
                                        Order ID: #{{ $order['id'] }}
                                    </span>
                                    <span class="text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($order['date'])->format('d M Y H:i') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Order Items -->
                            @foreach ($order['items'] as $item)
                                <div class="py-3 border-b last:border-0">
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 items-center">
                                        <div>
                                            <h4 class="font-medium">{{ $item['menu_name'] }}</h4>
                                            <p class="text-sm text-gray-500">
                                                Rp {{ number_format($item['price'], 0, ',', '.') }} x {{ $item['quantity'] }}
                                            </p>
                                        </div>
                                        <div>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                @switch($item['deliveryStatus'])
                                                    @case('Pending')
                                                        bg-yellow-100 text-yellow-800
                                                        @break
                                                    @case('Processing')
                                                        bg-blue-100 text-blue-800
                                                        @break
                                                    @case('Delivered')
                                                        bg-green-100 text-green-800
                                                        @break
                                                    @default
                                                        bg-gray-100 text-gray-800
                                                @endswitch
                                            ">
                                                {{ $item['deliveryStatus'] }}
                                            </span>
                                        </div>
                                        <div class="text-right lg:col-span-2">
                                            <p class="font-medium">
                                                Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- Order Summary -->
                            <div class="mt-4 pt-4 border-t">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                            {{ $order['paymentStatus'] ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $order['paymentStatus'] ? 'Paid' : 'Unpaid' }}
                                        </span>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm text-gray-500">Total Amount</p>
                                        <p class="text-lg font-bold text-[#A07658]">
                                            Rp {{ number_format($order['totalPrice'], 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-layout>