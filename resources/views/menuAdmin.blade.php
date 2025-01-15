<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Menu List</title>
</head>

<body>
    <x-navigationAdmin></x-navigationAdmin>

<div class="container mx-auto mt-8 px-4">
    <div class="flex justify-end mb-4">
        <form action="{{ route('menuAdmin.create') }}" method="GET">
            <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                CREATE MENU
            </button>
        </form>
    </div>

    <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-300">
        <table class="min-w-full table-auto text-left">
            <thead class="bg-gray-100 text-sm font-semibold text-gray-700">
                <tr>
                    <th class="px-6 py-3 border-b">Menu ID</th>
                    <th class="px-6 py-3 border-b">Menu Name</th>
                    <th class="px-6 py-3 border-b">Menu Description</th>
                    <th class="px-6 py-3 border-b">Menu Price</th>
                    <th class="px-6 py-3 border-b">Restaurant Name</th>
                    <th class="px-6 py-3 border-b">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm">
                @if ($menus->isEmpty())
                    <tr>
                        <td colspan="6" class="border-t border-b text-center py-4 text-gray-500">No menus available.</td>
                    </tr>
                @else
                    @foreach ($menus as $menu)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 border-b">{{ $menu->id }}</td>
                            <td class="px-6 py-4 border-b">{{ $menu->menu_name }}</td>
                            <td class="px-6 py-4 border-b">{{ $menu->description }}</td>
                            <td class="px-6 py-4 border-b">{{ $menu->price }}</td>
                            <td class="px-6 py-4 border-b">
                                {{ $menu->restos ? $menu->restos->resto_name : 'No Resto' }}
                            </td>
                            <td class="px-6 py-4 border-b flex items-center space-x-2">
                                <form action="{{ route('menuAdmin.edit', $menu->id) }}" method="GET">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300">
                                        UPDATE
                                    </button>
                                </form>
                                <form action="{{ route('menuAdmin.destroy', $menu->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300"
                                        onclick="return confirm('Are you sure you want to delete this menu?');">
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
