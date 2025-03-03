<template>
    <div
        class="border-2 rounded-full w-10 flex justify-center items-center h-10 relative"
    >
        <div
            :class="`border-[1.1rem] ${!stop ? 'animate-spin' :''} left-0 right-0 rounded-full
            absolute
             ${time / total == 0 ? 'border-l-transparent' : 'border-l-yellow-500'}
             ${time / total < 0.6 ? 'border-r-transparent' : 'border-r-amber-500'}
             ${time / total < 0.3 ? 'border-t-transparent' : 'border-t-amber-400'}
             ${time / total < 0.8 ? 'border-b-transparent' : 'border-b-orange-400'} z-0`"
        ></div>

        <h3 class="z-10">{{ time }}</h3>
    </div>
</template>

<script setup lang="ts">
import { defineModel, onMounted } from "vue";

const time = defineModel<number>({ default: 0 });

const emit = defineEmits(["timeOut"]);

const stop = defineModel<boolean>('stop');

const total = time.value;

onMounted(() => {
    setInterval(() => {
        if (stop.value) {
            return;
        }
        if (time.value === 0) {
            emit("timeOut");
            return;
        }

        time.value--;
    }, 1000);
});
</script>
