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
    {{-- alpinejs --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- blade-formatter-disable  --}}
    <style type="text/tailwindcss">
    .cancel-link,.btn{
        @apply rounded-md px-2 py-1 text-center font-medium shadow-sm ring-1 ring-neutral-700 hover:bg-slate-50 text-slate-700 
    }

    .add-btn,.add-link,.back-btn{
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

<body style="background-image: url('{{ asset('img/task-img.jpg') }}')"
    class="container mx-auto mt-20 max-w-xl bg-[url(img/task-img.jpg)] bg-no-repeat bg-auto bg-center bg-opacity-50">
    <div class="bg-img">
        <h1 class="text-2xl mb-4">@yield('title')</h1>

        <div x-data="{ flash: true }">
            @if (session()->has('success'))
                <div x-show="flash"
                    class="relative mb-10 rounded border-yellow-400 bg-yellow-100 px-4 py-3 text-lg text-yellow-700"
                    role="alert">
                    <strong class="font-bold">Success!</strong>
                    <div>
                        <div>{{ session('success') }}</div>
                    </div>

                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            @click="flash = false" stroke="currentColor" class="h-6 w-6 cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </div>
            @endif
            @yield('content')
        </div>
    </div>
</body>

</html>
