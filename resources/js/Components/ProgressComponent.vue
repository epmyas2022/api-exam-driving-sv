<template>
    <div ref="bar" class="h-3 bg-amber-100 sm:w-lg w-72 rounded-full relative">
        <div
            class="absolute top-[-200%] left-0 rounded-full transition-all duration-1000 ease-in-out overflow-hidden"
            :style="{ left: value + 'px' }"
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
import { computed, defineModel, onMounted, ref } from "vue";

const props = defineProps<{
    max: number;
}>();

const progress = defineModel<number>("progress");

const bar = ref<HTMLElement | null>(null);

const sizeBar = ref(0);

const value = computed(
    () =>
        (progress.value / props.max) *
        (progress.value > 0 ? sizeBar.value - 40 : 40)
);

const updateSizeBar = () => {
    if (bar.value) {
        sizeBar.value = bar.value.offsetWidth;
    }
};

onMounted(() => {
    updateSizeBar();
    window.addEventListener("resize", updateSizeBar);
});
</script>
