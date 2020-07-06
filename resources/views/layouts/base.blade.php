<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>To-Do List</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">
</head>
<body>
    <main class="page-container">
        @yield('content')
    </main>

    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>
