<template>
    <div
        class="max-w-lg p-4 rounded-lg relative bg-gradient-to-r from-slate-100 to-slate-200 text-black border-b-8 border-b-amber-500"
    >
        <div class="flex gap-2">
            <div>
                <img
                    :src="image"
                    alt="Icono de examen de manejo"
                    class="object-cover w-20"
                />
            </div>
            <div>
                <h2 class="font-bold text-lg">{{ title }}</h2>
                <p>
                    {{ description }}
                </p>

                <br />
                <a
                    :href="`questions/${type}`"
                    class="bg-amber-500 text-white px-4 py-2 rounded-md cursor-pointer"
                    >Iniciar examen</a
                >
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
defineProps<{
    title: string;
    image: string;
    type: string;
    description: string;
}>();
</script>
