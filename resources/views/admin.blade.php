<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Admin Dashboard</title>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Navigation -->
    <x-navigationAdmin></x-navigationAdmin>

    <!-- Main Content -->
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome, Admin</h1>
            <p class="text-gray-600">Manage your restaurant's menus, menu dates, and other configurations from here.</p>

        
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-10">
        <div class="container mx-auto py-4 text-center">
            <p>&copy; {{ date('Y') }} Kateringku Management System. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>
