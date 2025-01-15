<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>User List</title>
</head>
<body class="bg-gray-50">
  <x-navigationAdmin></x-navigationAdmin>

  <div class="container mx-auto px-4 py-8">
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
      <table class="min-w-full table-auto border-collapse">
        <thead class="bg-brown-200 text-brown-800">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-semibold">User ID</th>
            <th class="px-6 py-3 text-left text-sm font-semibold">Username</th>
            <th class="px-6 py-3 text-left text-sm font-semibold">Address</th>
            <th class="px-6 py-3 text-left text-sm font-semibold">Phone Number</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($allUsers as $user)
            <tr class="hover:bg-brown-50">
              <td class="border-t border-b px-6 py-4 text-sm text-brown-700">{{ $user->id }}</td>
              <td class="border-t border-b px-6 py-4 text-sm text-brown-700">{{ $user->username }}</td>
              <td class="border-t border-b px-6 py-4 text-sm text-brown-700">{{ $user->address }}</td>
              <td class="border-t border-b px-6 py-4 text-sm text-brown-700">{{ $user->number }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
