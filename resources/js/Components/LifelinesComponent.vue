<template>
    <button
        v-if="countPublic == 0"
        @click="openPublic"
        class="flex gap-2 px-8 py-2 rounded-md bg-amber-500 text-white font-bold transition duration-200 hover:bg-white hover:text-black border-2 border-transparent hover:border-amber-500 cursor-pointer"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-world"
        >
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
        class="flex gap-2 px-8 py-2 rounded-md bg-sky-500 text-white font-bold transition duration-200 hover:bg-white hover:text-black border-2 border-transparent hover:border-sky-500 cursor-pointer"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-percentage-50"
        >
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path
                d="M12 21a9 9 0 0 0 0 -18m0 0v18"
                fill="currentColor"
                stroke="none"
            />
            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
        </svg>
        50/50
    </button>

    <ModalComponent v-model="showPublic">
        <div class="text-center">
            <h1 class="font-bold text-lg">¿Que dice el publico?</h1>
            <p class="text-sm mt-1">
                Recuerda que el publico puede equivocarse, pero en la mayoria de
                los casos aciertan
            </p>

            <br />

            <div class="flex flex-col gap-2 items-center">
                <div
                    v-for="item in public"
                    :key="item"
                    class="flex gap-2 items-center text-sm"
                >
                    <p class="text-sm">
                        {{ item.answer }}
                    </p>
                    <span
                        class="bg-green-500 text-white font-bold rounded-full p-2"
                    >
                        {{ item.percentage }}%</span
                    >
                </div>
            </div>
        </div>
    </ModalComponent>
</template>

<script setup lang="ts">
import ModalComponent from "./ModalComponent.vue";
import { ref } from "vue";

const showPublic = ref(false);

const countPublic = ref(0);

const openPublic = () => {
    showPublic.value = true;
    countPublic.value++;
};
defineProps<{
    public: Array<{
        answer: string;
        percentage: number;
    }>;
}>();
</script>
