<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>User List</title>
</head>
<body>
  <x-navigationAdmin></x-navigationAdmin>
  <table class="min-w-full table-auto">
    <thead>
        <tr>
            <th class="px-4 py-2">User ID</th>
            <th class="px-4 py-2">Username</th>
            <th class="px-4 py-2">Address</th>
            <th class="px-4 py-2">Phone Number</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($allUsers as $user)
          <tr>
              <td class="border px-4 py-2">{{ $user->id }}</td>
              <td class="border px-4 py-2">{{ $user->username }}</td>
              <td class="border px-4 py-2">{{ $user->address }}</td>
              <td class="border px-4 py-2">{{ $user->number }}</td>
          </tr>
      @endforeach
  </tbody>
</table>
  </body>
</html>