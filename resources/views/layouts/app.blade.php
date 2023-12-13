<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DivSystemsWeb </title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

        
    <header class="p-7 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{route('home.index')}}" class="text-4xl font-bold">
            DivSystemsWeb
            </a>
        @auth
            <nav class="flex gap-4 items-start">
                <a href="{{route('principal.welcome', auth()->user()->username)}}" class="font-bold">
                    Perfil: 
                    <span>
                        {{auth()->user()->username}}
                    </span>
                </a>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                            Cerrar Sesión
                        </button>
                </form>
            </nav>
        </div>
    @endauth

    @guest
    <nav class="flex gap-3 items-center">
        <a class="font-bold uppercase text-gray-600 text-sm " href="{{route('login')}}">
            Iniciar sesión
        </a>
        <a href="{{route('register')}}" class="font-bold uppercase text-gray-600 text-sm">
            Crear cuenta
        </a>
    </nav> 
    @endguest
</header>

    <main class="container mx-auto mt-10">
        <h1 class="font-black text-center text-3xl mb-10">@yield('titulo')</h1>
        
        @yield('contenido_main')
    </main>

    <footer class="mt-10 text-center p-6 text-gray-500 font-bold uppercase">
        DivSystemsWeb - Todos los derechos reservados {{now()->year}}
    </footer>
    
</body>
</html>