<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | NovaCare</title>
</head>
<header style="background-color: #eee; color: white; padding: 10px 20px;">
    <nav>
        <ul
            style="list-style: none; margin: 0; padding: 0; display: flex; justify-content: space-between; align-items: center;">
            <li style="margin: 0; font-size: 1.5em;">
                <a href="/" style="color: black; text-decoration: none;">NovaCare Clinic</a>
            </li>
            <div style="display: flex; gap: 15px;">
                <li><a href="{{ route('control') }}" style="color: black; text-decoration: none;">I am an admin</a></li>
            </div>
        </ul>
    </nav>
</header>

<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
