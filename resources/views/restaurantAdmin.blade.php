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
        <button type="submit" 
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
            CREATE CATERING
        </button>
    </form>
    
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-blue-600 text-black">
                <tr class="bg-gray-200">
                    <th class="px-6 py-3 text-left text-sm font-semibold">Catering ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Catering Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Catering Address</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Catering Phone Number</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if ($restaurants->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">No data available.</td>
                    </tr>
                @else
                    @foreach ($restaurants as $restaurant)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-3 border border-gray-300">{{ $restaurant->id }}</td>
                            <td class="px-6 py-3 border border-gray-300">{{ $restaurant->resto_name }}</td>
                            <td class="px-6 py-3 border border-gray-300">{{ $restaurant->address }}</td>
                            <td class="px-6 py-3 border border-gray-300">{{ $restaurant->number }}</td>
                            <td class="px-6 py-3 flex justify-center gap-2">
                                <form action="{{ route('restaurantAdmin.edit', $restaurant->id) }}" method="GET">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring">
                                        UPDATE
                                    </button>
                                </form>
                                <form action="{{ route('restaurantAdmin.destroy', $restaurant->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring"
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
    
</body>

</html>
