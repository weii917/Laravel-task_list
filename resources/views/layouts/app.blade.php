<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Task List App</title>
    {{-- font-awsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- blade-formatter-disable  --}}
    <style type="text/tailwindcss">
    .btn{
        @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-neutral-700 hover:bg-slate-50 text-slate-700 
    }

    .link{
        @apply rounded-md px-2 py-1 ring-1 ring-slate-700/10 font-medium text-white bg-neutral-700 hover:bg-neutral-600
    }

    label{
        @apply block uppercase text-slate-700 mb-2
    }

    input,textarea{
        @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
    }

    .error{
        @apply text-red-500 text-sm
    }

    </style>
    {{-- blade-formatter-enable  --}}
    @yield('styles')
</head>

<body
    class="container mx-auto mt-10 mb-10 max-w-lg bg-[url('https://images.unsplash.com/photo-1586281380117-5a60ae2050cc?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-no-repeat bg-center bg-cover bg-opacity-50">
    <h1 class="text-2xl mb-4">@yield('title')</h1>
    <div>
        @if (session()->has('success'))
            <div>{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>

</html>
