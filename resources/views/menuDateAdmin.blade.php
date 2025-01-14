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
    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Date</th>
                <th class="border border-gray-300 px-4 py-2">Menu Name</th>
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
                        <td class="border border-gray-300 px-4 py-2">{{ $menuDate->date }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $menuDate->menus ? $menuDate->menus->menu_name : 'No Menu Assigned' }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>

</html>
