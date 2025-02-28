<template>
    <Transition name="fade">
        <div
            v-if="show"
            class="fixed top-0 right-0 left-0 bottom-0 bg-black/40 z-50 flex justify-center items-center"
        >
            <div class="bg-white p-4 text-black md:w-1/3 rounded-sm">
                <div class="flex justify-end">
                    <button
                        @click="show = false"
                        class="cursor-pointer text-black rounded-full border-black border-2"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            width="20"
                            height="20"
                            stroke-width="2"
                        >
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4">
                    <slot></slot>
                </div>
            </div>
        </div>
    </Transition>
</template>

<script setup lang="ts">
import { defineModel } from "vue";

const show = defineModel<boolean>();

</script>
<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
