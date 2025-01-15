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
    <div class="p-4">
        <table class="min-w-full table-auto border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Order User ID</th>
                    <th class="border px-4 py-2">User ID</th>
                    <th class="border px-4 py-2">Order Total</th>
                    <th class="border px-4 py-2">Order Dates</th>
                    <th class="border px-4 py-2">Customer Name</th>
                    <th class="border px-4 py-2">Address</th>
                    <th class="border px-4 py-2">Phone Number</th>
                    <th class="border px-4 py-2">Payment Status</th>
                    <th class="border px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($AllOrderUser as $order)
                    <tr>
                        <td class="border px-4 py-2">{{ $order->id }}</td>
                        <td class="border px-4 py-2">{{ $order->user_id }}</td>
                        <td class="border px-4 py-2">{{ $order->total_price }}</td>
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
                                    {{ $order->is_payment_status ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' }}">
                                    {{ $order->is_payment_status ? 'Mark as Unpaid' : 'Mark as Paid' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
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

