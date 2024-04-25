<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Title</title>

    @vite('resources/css/app.css')


    <!-- Fontawesome 6 -->
    <script src="https://kit.fontawesome.com/b4a141d0bd.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <header class='p-10 bg-zinc-200'>Page Header</header>

     
    <div class="p-2">
        @yield('content')
    </div>
</body>
</html>