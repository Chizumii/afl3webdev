<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Menu Date List</title>
</head>

<body>
    <x-navigationAdmin></x-navigationAdmin>

<div class="container mx-auto mt-8 px-4">
    <div class="flex justify-end mb-4">
        <form action="{{ route('menuDateAdmin.create') }}" method="GET">
            <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                CREATE MENU DATE
            </button>
        </form>
    </div>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-300">
        <table class="min-w-full table-auto text-left">
            <thead class="bg-gray-100 text-sm font-semibold text-gray-700">
                <tr>
                    <th class="px-6 py-3 border-b">Menu Date ID</th>
                    <th class="px-6 py-3 border-b">Date</th>
                    <th class="px-6 py-3 border-b">Menu Name</th>
                    <th class="px-6 py-3 border-b">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @if ($menuDates->isEmpty())
                    <tr>
                        <td colspan="4" class="border-t border-b text-center py-4 text-gray-500">No data available.</td>
                    </tr>
                @else
                    @foreach ($menuDates as $menuDate)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 border-b">{{ $menuDate->id }}</td>
                            <td class="px-6 py-4 border-b">{{ $menuDate->date }}</td>
                            <td class="px-6 py-4 border-b">
                                {{ $menuDate->menus ? $menuDate->menus->menu_name : 'No Menu Assigned' }}
                            </td>
                            <td class="px-6 py-4 border-b flex items-center space-x-2">
                                <form action="{{ route('menuDateAdmin.edit', $menuDate->id) }}" method="GET" class="inline-block">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300">
                                        UPDATE
                                    </button>
                                </form>
                                
                                <form action="{{ route('menuDateAdmin.destroy', $menuDate->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300"
                                        onclick="return confirm('Are you sure you want to delete this menu date?');">
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
