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
    <div>
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Order User ID</th>
                    <th class="px-4 py-2">User ID</th>
                    <th class="px-4 py-2">Order Total</th>
                    <th class="px-4 py-2">Order Dates</th>
                    <th class="px-4 py-2">Customer Name</th>
                    <th class="px-4 py-2">Address</th>
                    <th class="px-4 py-2">Phone Number</th>
                    <th class="px-4 py-2">Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($AllOrderUser as $order)
                    <tr>
                        <td class="border px-4 py-2">{{ $order->id }}</td>
                        <td class="border px-4 py-2">{{ $order->user_id }}</td>
                        <td class="border px-4 py-2">{{ $order->total_price }}</td>
                        <td class="border px-4 py-2">{{ $order->date }}</td>
                        <td class="border px-4 py-2">@if($order->users)
                            {{ $order->users->username }}
                        @else
                            No User
                        @endif</td>
                        <td class="border px-4 py-2">{{ $order->users->address }}</td>
                        <td class="border px-4 py-2">{{ $order->users->number }}</td>
                        <td class="border px-4 py-2"> 
                            @if($order->is_payment_status === 1)
                            Paid
                        @else
                            Unpaid
                        @endif
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>
