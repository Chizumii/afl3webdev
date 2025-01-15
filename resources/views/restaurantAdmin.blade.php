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

<div class="container mx-auto mt-8 px-4">
    <div class="flex justify-end mb-4">
        <form action="{{ route('restaurantAdmin.create') }}" method="GET">
            <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                CREATE CATERING
            </button>
        </form>
    </div>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-300">
        <table class="min-w-full table-auto text-left">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-sm font-semibold">Catering ID</th>
                    <th class="px-6 py-3 text-sm font-semibold">Catering Name</th>
                    <th class="px-6 py-3 text-sm font-semibold">Catering Address</th>
                    <th class="px-6 py-3 text-sm font-semibold">Catering Phone Number</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @if ($restaurants->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">No data available.</td>
                    </tr>
                @else
                    @foreach ($restaurants as $restaurant)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 border-b">{{ $restaurant->id }}</td>
                            <td class="px-6 py-3 border-b">{{ $restaurant->resto_name }}</td>
                            <td class="px-6 py-3 border-b">{{ $restaurant->address }}</td>
                            <td class="px-6 py-3 border-b">{{ $restaurant->number }}</td>
                            <td class="px-6 py-3 border-b flex justify-center gap-2">
                                <form action="{{ route('restaurantAdmin.edit', $restaurant->id) }}" method="GET" class="inline-block">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300">
                                        UPDATE
                                    </button>
                                </form>
                                
                                <form action="{{ route('restaurantAdmin.destroy', $restaurant->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300"
                                        onclick="return confirm('Are you sure you want to delete this restaurant?');">
                                        DELETE
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

    
</body>

</html>
