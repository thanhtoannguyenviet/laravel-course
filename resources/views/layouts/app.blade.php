<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @yield('styles')
        .alert-success {
            color: green;
        }
    </style>
</head>
<body>
        <div class="container mx-auto mt-10 mb-10 max-w-lg">
            <h1>@yield('title')</h1>
            <div>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
</body>
</html>