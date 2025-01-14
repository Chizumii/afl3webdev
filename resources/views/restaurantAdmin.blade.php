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
  <table class="min-w-full table-auto">
    <thead>
        <tr>
            <th class="px-4 py-2">Catering ID</th>
            <th class="px-4 py-2">Catering Name</th>
            <th class="px-4 py-2">Catering Address</th>
            <th class="px-4 py-2">Catering Phone Number</th>
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
                </tr>
            @endforeach
        @endif
  </tbody>
</table>
  </body>
</html>