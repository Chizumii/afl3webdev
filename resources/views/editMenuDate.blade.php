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
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold mb-4">Edit Menu Date</h2>
        <form action="{{ route('menuDateAdmin.update', $menuDate->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="mb-4">
                <label for="menu_id" class="block text-gray-700 font-bold">Select Menu:</label>
                <select name="menu_id" id="menu_id" class="w-full border-gray-300 rounded mt-2" required>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}" {{ $menuDate->menu_id == $menu->id ? 'selected' : '' }}>
                            {{ $menu->menu_name }}
                        </option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-4">
                <label for="date" class="block text-gray-700 font-bold">Select Date:</label>
                <input type="datetime-local" name="date" id="date" class="w-full border-gray-300 rounded mt-2" 
                    value="{{ old('date', \Carbon\Carbon::parse($menuDate->date)->format('Y-m-d\TH:i')) }}" required>
            </div>
    
            <div>
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                    Update Menu Date
                </button>
            </div>
        </form>
    </div>



</body>

</html>
