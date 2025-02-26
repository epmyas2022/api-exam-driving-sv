<div class="max-w-lg  p-4 rounded-lg relative bg-gradient-to-r from-slate-100 to-slate-200  text-black border-b-8 border-b-amber-500">
    <div class="flex gap-2">


        <div>
            <img src="{{ asset($image) }}" alt="Icono de examen de manejo" class="object-cover w-20">
        </div>
        <div>
            <h2 class="font-bold text-lg">{{$title}}</h2>
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
