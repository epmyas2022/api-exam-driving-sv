<template>
    <div
        class="flex flex-col items-center justify-center w-full h-dvh space-y-4 p-2"
    >
        <h1 class="text-4xl font-bold text-center text-white font-anton p-10">
            Exam Driving SV
        </h1>
        <div class="flex gap-2 items-center justify-center flex-wrap">
            <ProgressComponent
                :progress="(currentQuestion / questions.length) * 100 - 4"
            />

            <TimerComponent v-model="timer" />
        </div>

        <h2 class="text-balance md:w-2xl text-center text-sm/7">
            {{ questions[currentQuestion].question }}
        </h2>

        <img
            v-if="questions[currentQuestion].image"
            :src="questions[currentQuestion].image"
            alt="Señal de trasito"
            class="aspect-ratio--1x1"
        />

        <div class="flex flex-col gap-2 md:max-w-2xl">
            <CheckboxComponent
                v-for="(answer, index) in questions[currentQuestion].answers"
                :key="index"
                :id="index"
                :text="answer.answer"
                v-model="selectedAnswer"
                v-model:isCorrectAnswer="answer.isCorrect"
                v-model:errorAnswer="errorAnswer"
            />
        </div>
        <br />
        <div class="flex md:flex-row flex-col gap-4">
            <button
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

            <button
                @click="next"
                :disabled="currentQuestion === questions.length - 1"
                class="px-4 py-2 flex justify-center rounded-full bg-teal-500 text-white font-bold transition duration-200 hover:bg-white hover:text-black border-2 border-transparent hover:border-teal-500 cursor-pointer"
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
                    class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right"
                >
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l14 0" />
                    <path d="M13 18l6 -6" />
                    <path d="M13 6l6 6" />
                </svg>
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import CheckboxComponent from "../../Components/CheckboxComponent.vue";
import ProgressComponent from "../../Components/ProgressComponent.vue";
import TimerComponent from "../../Components/TimerComponent.vue";

const props = defineProps({
    examQuestion: {
        type: Object,
        required: true,
    },
});

const questions = props.examQuestion.listQuestions;

const timer = ref(60);
const errorAnswer = ref(false);

const currentQuestion = ref(0);

const selectedAnswer = ref(null);

const clear = () => {
    selectedAnswer.value = null;
    errorAnswer.value = false;
    timer.value = 60;
};

const next = () => {
    if (selectedAnswer.value == null) return;
    currentQuestion.value++;


    clear();
};
</script>
