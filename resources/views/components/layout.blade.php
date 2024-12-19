<!DOCTYPE html>
<html lang= "en">

<head>
    {{-- <title>{{ $layoutTitle }}</title> --}}
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('mydesign/mystyle.css') }}">
</head>

<body>
    <div>
        <main>
            {{ $slot }}
        </main>
    </div>

</body>
<script src="{{ asset('mydesign/mystyle.css') }}"></script>
</html>
