<template>
    <div class="h-3 bg-amber-100 sm:w-lg w-72 rounded-full relative">
        <div
            id="car"
            class="absolute top-[-200%] left-0 rounded-full transition-all duration-1000 ease-in-out overflow-hidden"
            :style="{ left: progress + '%' }"
        >
            <img
                src="../../../public/images/car.svg"
                alt="Icono de carro"
                class="h-12 w-12"
            />
        </div>
    </div>
</template>

<script setup lang="ts">
import { defineModel } from "vue";

const progress = defineModel<number>("progress");
</script>
