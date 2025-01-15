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
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full border border-gray-300 divide-y divide-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Order ID
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Username
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Price
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Unit
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Menu Ordered
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                        Delivery Status
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($orderDetails as $detail)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $detail->id }}</td>
                    <td class="px-6 py-4 text-sm text-gray-800">
                        {{ $detail->orderUser->users->username ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800">
                        Rp {{number_format($detail->orderUser->total_price ?? 'N/A', 2) }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800">
                        {{ $detail->unit ?? 'N/A' }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-800">
                        {{ $detail->menuDates->menus->menu_name ?? 'N/A' }}
                    </td>
                    <td class="flex justify-end px-6 py-4 text-sm text-gray-800">
                        <form action="{{ route('orderDetails.updateStatus', $detail->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="delivery_status_id" class="border rounded-md px-2 py-1 text-sm text-gray-800">
                                @foreach ($deliveryStatuses as $status)
                                    <option value="{{ $status->id }}" {{ $detail->delivery_status_id == $status->id ? 'selected' : '' }}>
                                        {{ $status->status_name }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="ml-2 text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md">
                                Update
                            </button>
                        </form>                        
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                        No order details available.
                    </td>
                </tr>
                @endforelse
            </tbody>
            
        </table>
    </div>
    

</body>

</html>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Simpan posisi scroll sebelum halaman reload
        window.scrollTo(0, sessionStorage.getItem("scrollPosition") || 0);

        window.addEventListener("beforeunload", function () {
            sessionStorage.setItem("scrollPosition", window.scrollY);
        });
    });
</script>
