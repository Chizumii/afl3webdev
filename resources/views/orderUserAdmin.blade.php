<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Order Status</title>
</head>

<body>
    <x-navigationAdmin></x-navigationAdmin>
    <div class="p-6 bg-gray-50">
        <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-300">
            <table class="min-w-full table-auto text-left">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="border px-4 py-3 text-sm font-semibold">Order User ID</th>
                        <th class="border px-4 py-3 text-sm font-semibold">User ID</th>
                        <th class="border px-4 py-3 text-sm font-semibold">Order Total</th>
                        <th class="border px-4 py-3 text-sm font-semibold">Order Dates</th>
                        <th class="border px-4 py-3 text-sm font-semibold">Customer Name</th>
                        <th class="border px-4 py-3 text-sm font-semibold">Address</th>
                        <th class="border px-4 py-3 text-sm font-semibold">Phone Number</th>
                        <th class="border px-4 py-3 text-sm font-semibold">Payment Status</th>
                        <th class="border px-4 py-3 text-sm font-semibold text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach ($AllOrderUser as $order)
                        <tr class="hover:bg-gray-100">
                            <td class="border px-4 py-2">{{ $order->id }}</td>
                            <td class="border px-4 py-2">{{ $order->user_id }}</td>
                            <td class="border px-4 py-2">Rp {{number_format($order->total_price, 2) }}</td>
                            <td class="border px-4 py-2">{{ $order->date }}</td>
                            <td class="border px-4 py-2">
                                @if ($order->users)
                                    {{ $order->users->username }}
                                @else
                                    No User
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                @if ($order->users)
                                    {{ $order->users->address }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                @if ($order->users)
                                    {{ $order->users->number }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                {{ $order->is_payment_status ? 'Paid' : 'Unpaid' }}
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <form action="{{ route('orders.togglePayment', $order->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="py-2 px-4 font-semibold rounded-lg shadow-md text-white 
                                        {{ $order->is_payment_status ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' }} 
                                        transition duration-300">
                                        {{ $order->is_payment_status ? 'Mark as Unpaid' : 'Mark as Paid' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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

