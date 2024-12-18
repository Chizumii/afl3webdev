<!DOCTYPE html>
<html lang= "en">

<head>
        {{-- <title>{{ $layoutTitle }}</title> --}}
    @vite('resources/css/app.css')
</head>

<body>
    <div>
        <main>
            {{ $slot }}
        </main>
    </div>

</body>

</html>
