<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Resaturant List</title>
</head>

<body>
    <x-navigationAdmin></x-navigationAdmin>
    <form action="{{ route('restaurantAdmin.create') }}" method="GET">
        <button type="submit">CREATE</button>
    </form>


    <table class="min-w-full table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Catering ID</th>
                <th class="px-4 py-2">Catering Name</th>
                <th class="px-4 py-2">Catering Address</th>
                <th class="px-4 py-2">Catering Phone Number</th>
                <th class="px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($restaurants->isEmpty())
                <tr>
                    <td colspan="4" class="border border-gray-300 text-center py-4">No data available.</td>
                </tr>
            @else
                @foreach ($restaurants as $restaurant)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">{{ $restaurant->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $restaurant->resto_name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $restaurant->address }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $restaurant->number }}</td>
                        <td class="flex justify-end px-4 py-2">
                            <form action="{{ route('restaurantAdmin.edit', $restaurant->id) }}" method="GET">
                                @method('PUT')
                                @csrf
                                <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    UPDATE
                                </button>
                            </form>
                            <form action="{{ route('restaurantAdmin.destroy', $restaurant->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    onclick="return confirm('Are you sure you want to delete this restaurant?');">
                                    DELETE
                                </button>
                            </form>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>

</html>
