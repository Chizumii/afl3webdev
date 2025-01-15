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
    <div class="max-w-lg mx-auto p-6 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-6">Update Menu</h2>
        <form action="{{ route('menuAdmin.update', $menu->id) }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('PUT')
        
            <!-- Menu Name -->
            <div class="mb-4">
                <label for="menu_name" class="block text-gray-700 font-semibold">Menu Name</label>
                <input type="text" name="menu_name" id="menu_name" value="{{ old('menu_name', $menu->menu_name) }}" required
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        
            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $menu->description) }}</textarea>
            </div>
        
            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-semibold">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price', $menu->price) }}" required min="0"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        
            <!-- Image URL -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-semibold">Image URL (Optional)</label>
                <input type="text" name="image" id="image" value="{{ old('image', $menu->image) }}"
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
        
            <!-- Restaurant -->
            <div class="mb-4">
                <label for="resto_id" class="block text-gray-700 font-semibold">Restaurant</label>
                <select name="resto_id" id="resto_id" required
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}" {{ $menu->resto_id == $restaurant->id ? 'selected' : '' }}>
                            {{ $restaurant->resto_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        
            <!-- Submit Button -->
            <div class="flex justify-center mt-6">
                <button type="submit" 
                    class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Update Menu
                </button>
            </div>
        </form>
                       
    </div>




</body>

</html>
