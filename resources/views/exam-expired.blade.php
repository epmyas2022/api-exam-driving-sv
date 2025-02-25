@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center h-full gap-8">
        <h1 class="text-3xl font-bold">El tiempo ha terminado
        </h1>

        <img src="{{ asset('images/time-expired.svg') }}" alt="Icono de reloj" class="h-48">
        <p>
            El tiempo para realizar el examen ha expirado, por favor intenta de nuevo.
        </p>

        <a class="bg-amber-500 text-white px-4 py-2 rounded-md cursor-pointer">Volver al inicio</a>
    </div>
@endsection
