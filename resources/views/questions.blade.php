@extends('layouts.app')

@section('content')
    <form class="flex flex-col items-center justify-center w-full h-full space-y-4 p-2"
        action="{{ route('questions', ['currentQuestion' => $currentQuestion]) }}", method="POST">
        @csrf

        <div>
            <x-progress-exam-component :step="$currentQuestion" :total="count($listQuestions)" />
        </div>
        <h1 class="text-4xl font-bold text-center text-white font-anton p-10">
            Exam Driving SV
        </h1>

        <h2 class="text-balance  md:w-2xl text-center text-sm/7">
            {{ $listQuestions[$currentQuestion]['question'] }}
        </h2>


        @isset($listQuestions[$currentQuestion]['image'])
            <img src="{{ $listQuestions[$currentQuestion]['image'] }}" alt="Señal de trasito" class="aspect-ratio--1x1">
        @endisset


        <div class="flex flex-col gap-2 md:max-w-2xl" x-data="{ value: null }">

            @foreach ($listQuestions[$currentQuestion]['answers'] as $index => $question)
                <x-checkbox-component :id="$index" :text="$question['answer']" />
            @endforeach
        </div>
        <br>
        <div class="flex md:flex-row flex-col gap-4">

            <button
                class="flex gap-2 px-8 py-2 rounded-md bg-amber-500 text-white font-bold transition duration-200 hover:bg-white hover:text-black border-2 border-transparent hover:border-amber-500 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-world">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                    <path d="M3.6 9h16.8" />
                    <path d="M3.6 15h16.8" />
                    <path d="M11.5 3a17 17 0 0 0 0 18" />
                    <path d="M12.5 3a17 17 0 0 1 0 18" />
                </svg>

                Publico
            </button>

            <button
                class="flex gap-2 px-8 py-2 rounded-md bg-sky-500 text-white font-bold transition duration-200 hover:bg-white hover:text-black border-2 border-transparent hover:border-sky-500 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-percentage-50">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 21a9 9 0 0 0 0 -18m0 0v18" fill="currentColor" stroke="none" />
                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                </svg>
                50/50
            </button>

            <button
                class="px-4 py-2 flex justify-center rounded-full bg-teal-500 text-white font-bold transition duration-200 hover:bg-white hover:text-black border-2 border-transparent hover:border-teal-500 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M13 18l6 -6" />
                    <path d="M13 6l6 6" />
                </svg> </button>
        </div>

    </form>
@endsection
