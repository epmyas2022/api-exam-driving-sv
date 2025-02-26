@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center items-center h-dvh w-full gap-2 p-4">
        <h1 class="text-3xl font-bold ">Tipos de examen</h1>
        <p>
            Selecciona el tipo de examen que deseas realizar.
        </p>

        <br>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-exam-card-component title="Examen de señales de tránsito" image="images/traffic-light.png"></x-exam-card-component>
            <x-exam-card-component title="Examen de multas" image="images/fines.png"></x-exam-card-component>
            <x-exam-card-component title="Examen de reglamento general" image="images/regulation.png"></x-exam-card-component>
            <x-exam-card-component title="Examen general VMT" image="images/jacket.png"></x-exam-card-component>
        </div>
    </div>
@endsection
