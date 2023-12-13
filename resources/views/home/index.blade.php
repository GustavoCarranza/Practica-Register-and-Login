@extends('layouts.app')

@section('titulo')
    Página Principal
@endsection

@section('contenido_main')
<div class="text-center font-extrabold text-xl">
    <p class="uppercase"> Practica numero 1: </p>
    <p> Crear un registro y un login funcional con todas las validaciones en Laravel utilizando POO y MVC </p>

    <div class="m-auto w-4/12 mt-5">
        <img 
            src="{{asset('img/fondo code.jpg')}}" 
            alt="Fondo principal"
            class="rounded-lg shadow-2xl"
            >
    </div>
</div>
@endsection