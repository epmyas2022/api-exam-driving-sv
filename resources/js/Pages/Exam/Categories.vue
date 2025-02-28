<template>
    <div
        class="flex flex-col justify-center items-center md:h-dvh w-full gap-2 p-4"
    >
        <h1 class="text-3xl font-bold">Tipos de examen</h1>
        <p>Selecciona el tipo de examen que deseas realizar.</p>
        <br />
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <CardExamComponent
                title="Examen de señales de tránsito"
                type="senalizacion"
                image="images/traffic-light.png"
                description="Este examen consta de 10 preguntas sobre señales de tránsito, el tiempo límite para realizarlo es de 10
                minutos."
            ></CardExamComponent>

            <CardExamComponent
                title="Examen de multas"
                image="images/fines.png"
                type="ley"
                description="Este examen consta de 10 preguntas sobre multas de tránsito, el tiempo límite para realizarlo es de 10
                minutos."
            ></CardExamComponent>

            <CardExamComponent
                title="Examen de reglamento general"
                image="images/regulation.png"
                type="reglamento"
                description="Este examen consta de 10 preguntas sobre el reglamento general de tránsito, el tiempo límite para realizarlo
                es de 10 minutos."
            ></CardExamComponent>

            <CardExamComponent
                title="Examen general VMT"
                type="vmt"
                image="images/jacket.png"
                description="Este examen consta de 10 preguntas sobre el reglamento general de tránsito, el tiempo límite para realizarlo
                es de 10 minutos."
            ></CardExamComponent>
        </div>
    </div>
</template>

<script setup lang="ts">
import CardExamComponent from "../../Components/CardExamComponent.vue";
</script>
