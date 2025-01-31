<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="h-screen flex flex-col bg-gray-100">
    <header class="p-6 border-b bg-white fixed top-0 w-full z-10">
        <nav class="container mx-auto items-center flex justify-between">
            <div class="logo">
                <p class="font-bold text-xl text-zinc-600">ProbY</p>
                <p class="text-xs">Gestão de Projetos</p>
            </div>
            <div class="nav-links">
                <ul class="flex gap-4 font-semibold">
                    @if (Route::has('login'))
                    @auth
                    <li>
                        <a href="{{ route('projects.index') }}">
                            <x-primary-button>Ver Projetos</x-primary-button>
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('login') }}">
                            <x-secondary-button>Login</x-secondary-button>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">
                            <x-primary-button>Registrar</x-primary-button>
                        </a>
                    </li>
                    @endif
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <section class="hero p-6 flex-grow overflow-hidden flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('site/img/img.jpg') }}')">
        <div class="hero-container text-left text-zinc-600 backdrop-blur-md bg-zinc/90 p-20 rounded-lg">
            <h1 class="text-5xl md:text-7xl font-bold underline">ProbY</h1>
            <p class="text-xl md:text-2xl mb-8">Gestão de Projetos</p>
            <div class="">
                <ul class="flex flex-col md:flex-row gap-4 font-semibold">
                    <li>
                        <a href="{{ route('projects.index') }}">
                            <x-secondary-button>Ver Projetos</x-secondary-button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <footer class="credits p-6 text-center text-sm bg-white text-zinc-600 fixed bottom-0 w-full">
        <p>Desenvolvido por <a href="https://github.com/regispicaz" target="_blank"
                class="hover:text-zinc-500"><strong>Régis Picáz</strong></a>
            2025</p>
    </footer>

</body>

</html>
