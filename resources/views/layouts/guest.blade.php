<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/script.js') }}" defer></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <img src="{{ asset('img/logoSherbyPizzeria.png') }}" alt="logo"
                    class="w-20 h-20 fill-current text-gray-500" />
            </a>

        </div>

        <h1 class="font-bold text-4xl mt-5">Connexion</h1>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <!--Modal de suppression -->
    <div id="modal"
        class=" hidden fixed z-50 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 bg-white rounded-md px-8 py-6 space-y-5 drop-shadow-lg">
        <h1 class="text-2xl font-semibold">Confirmer la suppression </h1>
        <div class="py-5 border-t border-b border-gray-300">
            <p>Êtes vous sûr de vouloir supprimer le compte?</p>
        </div>
        <div class="flex flex row gap-4 justify-end">
            <button id="delete"
                class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">Supprimer</button>
            <button id="close"
                class="py-1 px-3 text-white bg-rouge rounded border border-solid border-black">Fermer</button>
        </div>
    </div>

</body>

</html>
