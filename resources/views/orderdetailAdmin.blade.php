<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Order Details</title>
</head>
<body>
    <x-navigationAdmin></x-navigationAdmin>
    <div class="container mx-auto px-4 py-8">
        @foreach ($groupedOrders as $orderUserId => $details)
            <div class="bg-white rounded-lg shadow-lg mb-8 overflow-hidden">
                <!-- Order Header -->
                <div class="bg-gray-50 px-6 py-4 border-b">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-semibold">Order #{{ $orderUserId }}</h3>
                            <p class="text-gray-600">Customer: {{ $details->first()->orderUser->users->username ?? 'N/A' }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-600">Total Price:</p>
                            <p class="text-lg font-semibold">Rp {{ number_format($details->first()->orderUser->total_price, 2) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Menu Item</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price/Unit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delivery Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($details as $detail)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @if($detail->menuDates && $detail->menuDates->menus)
                                                <img class="h-10 w-10 rounded-full object-cover mr-3" 
                                                     src="{{ asset('storage/' . $detail->menuDates->menus->images) }}" 
                                                     alt="{{ $detail->name }}">
                                            @endif
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $detail->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Rp {{ number_format($detail->price, 2) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('orderDetails.updateQuantity', $detail->id) }}" method="POST" class="flex items-center space-x-2">
                                            @csrf
                                            @method('PATCH')
                                            <input type="number" name="unit" value="{{ $detail->unit }}" 
                                                   class="w-20 border rounded-md px-2 py-1 text-sm">
                                            <button type="submit" class="text-blue-600 hover:text-blue-800">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">Rp {{ number_format($detail->price * $detail->unit, 2) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('orderDetails.updateStatus', $detail->id) }}" method="POST" class="flex items-center space-x-2">
                                            @csrf
                                            @method('PATCH')
                                            <select name="delivery_status_id" class="border rounded-md px-2 py-1 text-sm">
                                                @foreach ($deliveryStatuses as $status)
                                                    <option value="{{ $status->id }}" 
                                                            {{ $detail->delivery_status_id == $status->id ? 'selected' : '' }}>
                                                        {{ $status->status_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="text-blue-600 hover:text-blue-800">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <!-- Add any additional action buttons here -->
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>

    @if(session('success'))
        <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg" 
             x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 3000)">
            {{ session('success') }}
        </div>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.scrollTo(0, sessionStorage.getItem("scrollPosition") || 0);
            
            window.addEventListener("beforeunload", function() {
                sessionStorage.setItem("scrollPosition", window.scrollY);
            });
        });
    </script>
</body>
</html>