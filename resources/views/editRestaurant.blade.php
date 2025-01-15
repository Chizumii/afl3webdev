<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Create Restaurant</title>
</head>
<body>
  <x-navigationAdmin></x-navigationAdmin>
  <form action="{{ route('restaurantAdmin.update', $restaurant->id) }}" method="POST" class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg">
    @csrf
    @method('PUT')
    <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">Edit Restaurant</h2>

    <div class="mb-4">
        <label for="resto_name" class="block text-gray-700 text-sm font-bold mb-2">Restaurant Name</label>
        <input type="text" name="resto_name" id="resto_name" 
            value="{{ old('resto_name', $restaurant->resto_name) }}"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Enter restaurant name" required>
    </div>

    <div class="mb-4">
        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
        <input type="text" name="address" id="address" 
            value="{{ old('address', $restaurant->address) }}"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Enter address" required>
    </div>

    <div class="mb-4">
        <label for="number" class="block text-gray-700 text-sm font-bold mb-2">Phone Number</label>
        <input type="text" name="number" id="number" 
            value="{{ old('number', $restaurant->number) }}"
            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Enter phone number" required>
    </div>

    <div class="flex justify-center">
        <button type="submit" 
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            Update
        </button>
    </div>
</form>





  </body>
</html>