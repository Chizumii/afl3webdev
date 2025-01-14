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
    <div class="container mx-auto mt-8">
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Menu ID</th>
                    <th class="border border-gray-300 px-4 py-2">Menu Name</th>
                    <th class="border border-gray-300 px-4 py-2">Menu Description</th>
                    <th class="border border-gray-300 px-4 py-2">Menu Price</th>
                    <th class="border border-gray-300 px-4 py-2">Restaurant Name</th>
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
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>
