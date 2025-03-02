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
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }
        .link {
            @apply font-medium text-gray-700 underline decoration-pink-500
        }
        label {
            @apply block uppercase text-slate-700 mb-2
        }

        input, 
        textarea {
            @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
        }

        .error {
            @apply text-red-500 text-sm
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