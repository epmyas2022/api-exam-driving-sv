@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center h-full gap-8">
        <h1 class="text-3xl font-bold">Tipos de examen</h1>


        <div class="w-lg shadow-lg shadow-amber-500/50 p-4 rounded-lg after:absolute after:top-0 after:right-0 after:left-0 relative">
            <div class="flex gap-2">


                <div>
                    <img src="{{ asset('images/traffic-light.png') }}" alt="Icono de examen de manejo" class="object-cover">
                </div>
                <div>
                    <h2 class="font-bold text-lg">Examen de señales de tránsito</h2>
                    <p>
                        Este examen consta de 10 preguntas sobre señales de tránsito, el tiempo límite para realizarlo es de
                        10
                        minutos.
                    </p>

                    <br>
                    <a href="{{ route('questions', ['type' => 'traffic-signs']) }}"
                        class="bg-amber-500 text-white px-4 py-2 rounded-md cursor-pointer">Iniciar examen</a>
                </div>
            </div>

        </div>
    </div>
@endsection
