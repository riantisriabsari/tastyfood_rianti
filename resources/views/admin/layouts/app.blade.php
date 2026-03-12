<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100 flex">


    @include('admin.layouts.sidebar')


    <div class="flex-1">
        @include('admin.layouts.navbar')


        <main class="p-6">
            @yield('content')
        </main>
    </div>


</body>
</html>