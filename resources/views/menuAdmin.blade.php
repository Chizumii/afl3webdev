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
    <form action="{{ route('menuAdmin.create') }}" method="GET">
        <button type="submit" 
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
            CREATE MENU
        </button>
    </form>
    <div class="container mx-auto mt-8">
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Menu ID</th>
                    <th class="border border-gray-300 px-4 py-2">Menu Name</th>
                    <th class="border border-gray-300 px-4 py-2">Menu Description</th>
                    <th class="border border-gray-300 px-4 py-2">Menu Price</th>
                    <th class="border border-gray-300 px-4 py-2">Restaurant Name</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($menus->isEmpty())
                    <tr>
                        <td colspan="5" class="border border-gray-300 text-center py-4">No menus available.</td>
                    </tr>
                @else
                    @foreach ($menus as $menu)
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2">{{ $menu->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $menu->menu_name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $menu->description }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $menu->price }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $menu->restos ? $menu->restos->resto_name : 'No Resto' }}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form action="{{ route('menuAdmin.edit', $menu->id) }}" method="GET">
                                    @csrf
                                    <button type="submit"
                                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring">
                                        UPDATE
                                    </button>
                                </form>
                                <form action="{{ route('menuAdmin.destroy', $menu->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring"
                                        onclick="return confirm('Are you sure you want to delete this menu?');">
                                        DELETE
                                    </button>
                                </form>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>
