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
    <form action="{{ route('menuDateAdmin.create') }}" method="GET">
        <button type="submit" 
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
            CREATE MENU DATE
        </button>
    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Menu Date ID</th>
                <th class="border border-gray-300 px-4 py-2">Date</th>
                <th class="border border-gray-300 px-4 py-2">Menu Name</th>
                <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($menuDates->isEmpty())
                <tr>
                    <td colspan="2" class="border border-gray-300 text-center py-4">No data available.</td>
                </tr>
            @else
                @foreach ($menuDates as $menuDate)
                    <tr class="hover:bg-gray-100">
                        <td class="border border-gray-300 px-4 py-2">{{ $menuDate->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $menuDate->date }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $menuDate->menus ? $menuDate->menus->menu_name : 'No Menu Assigned' }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form action="{{ route('menuDateAdmin.edit', $menuDate->id) }}" method="GET" class="inline-block">
                                @csrf
                                <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring">
                                    UPDATE
                                </button>
                            </form>
                            
                            <form action="{{ route('menuDateAdmin.destroy', $menuDate->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring"
                                    onclick="return confirm('Are you sure you want to delete this menu date?');">
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
