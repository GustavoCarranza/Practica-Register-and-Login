@extends('layouts.app')

@section('titulo')
    Inicia sesión
@endsection

@section('contenido_main')
   {{--Creamos el diseño para el inicio de sesion--}} 
   <div class="md:flex md:justify-center md:gap-10 md:items-center">
         
    <div class="md:w-5/12 bg-white p-6 rounded-lg shadow-lg">
        <form action={{route('login')}} method="POST" novalidate>
            @csrf

            @if (session('mensaje'))
                <p>
                    {{session('mensaje')}}
                </p>
            @else
            @endif
            <div class="mb-5">
                <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                    Usuario
                </label>
                <input 
                    type="text" 
                    name="username" 
                    id="username" 
                    placeholder="Ingresar usuario" 
                    class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror">
                    @error('username')
                        <p class="bg-red-300 p-2 mt-3 text-white font-bold border-l-8 border-red-800 rounded-lg shadow-md">
                            {{$message}}
                        </p>
                    @enderror
            </div>  

            <div class="mb-5">
                <label for="password" class="mb -2 block uppercase text-gray-500 font-bold">
                    Ingresar Contraseña
                </label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    placeholder="Ingresar contraseña" 
                    class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="bg-red-300 p-2 mt-3 text-white font-bold border-l-8 border-red-800 rounded-lg shadow-md">
                            {{$message}}
                        </p>
                    @enderror
            </div> 

            <input type="submit" value="Crear cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"> 
             
        </form>
        <p class="text-sm">Si no tienes cuenta <a href={{route('register')}} class="text-gray-400 text-base hover:text-gray-950 underline"> Registrate</a></p>
    </div>
</div>
@endsection