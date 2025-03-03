<template>
    <div>
        <ModalComponent v-model="showResults">
            <div class="flex flex-col items-center">
                <h1 class="font-bold text-2xl mb-2">Terminaste el examen</h1>
                <div>
                    <svg
                        v-if="score > 6"
                        xmlns="http://www.w3.org/2000/svg"
                        width="50"
                        height="50"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-mood-happy text-teal-500"
                    >
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M9 9l.01 0" />
                        <path d="M15 9l.01 0" />
                        <path d="M8 13a4 4 0 1 0 8 0h-8" />
                    </svg>

                    <svg
                        v-else
                        xmlns="http://www.w3.org/2000/svg"
                        width="50"
                        height="50"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-mood-sad text-red-400"
                    >
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M9 10l.01 0" />
                        <path d="M15 10l.01 0" />
                        <path d="M9.5 15.25a3.5 3.5 0 0 1 5 0" />
                    </svg>
                </div>
                <h2>
                    Tu puntuación es de
                    <span
                        :class="`text-3xl font-bold ${
                            score > 6 ? 'text-teal-500' : 'text-red-400'
                        }`"
                    >
                        {{ score.toFixed() }}
                        puntos
                    </span>
                </h2>

                <a href="/" class="btn-primary mt-4 px-4 py-2 rounded-full">
                    Volver al inicio
                </a>
            </div>
        </ModalComponent>

        <div
            class="flex flex-col items-center justify-center w-full md:h-dvh space-y-4 p-2"
        >
            <h1
                class="text-4xl font-bold text-center text-white font-anton p-10"
            >
                Exam Driving SV
            </h1>
            <div class="flex gap-2 items-center justify-center flex-wrap">
                <ProgressComponent
                    :progress="currentQuestion"
                    :max="questions.length - 1"
                />

                <TimerComponent v-model="timer" v-model:stop="stopTimer" @time-out="timerOut" />
            </div>

            <h2 class="text-balance md:w-2xl text-center text-sm/7">
                {{ questions[currentQuestion]?.question }}
            </h2>

            <img
                v-if="questions[currentQuestion]?.image"
                :src="questions[currentQuestion].image"
                alt="Señal de trasito"
                class="aspect-ratio--1x1"
            />

            <div class="flex flex-col gap-2 md:max-w-2xl">
                <CheckboxComponent
                    v-for="(answer, index) in questions[currentQuestion]
                        ?.answers"
                    :key="index"
                    :id="index"
                    :text="answer.answer"
                    @selected-answer="stopTimer = true"
                    v-model="selectedAnswer"
                    v-model:isCorrectAnswer="answer.isCorrect"
                    v-model:errorAnswer="errorAnswer"
                />
            </div>
            <br />
            <div class="flex md:flex-row flex-col gap-4">
                <LifelinesComponent
                    :fifty_fifty="
                        questions[currentQuestion]?.lifelines?.fifty_fifty
                    "
                    :public="questions[currentQuestion]?.lifelines?.public"
                ></LifelinesComponent>
                <button
                    @click="next"
                    class="px-4 py-2 flex justify-center rounded-full btn-primary"
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
        <br />
    </div>
</template>

<script setup lang="ts">
import { computed, ref } from "vue";
import CheckboxComponent from "../../Components/CheckboxComponent.vue";
import ProgressComponent from "../../Components/ProgressComponent.vue";
import TimerComponent from "../../Components/TimerComponent.vue";
import ModalComponent from "../../Components/ModalComponent.vue";
import LifelinesComponent from "../../Components/LifelinesComponent.vue";

const props = defineProps({
    examQuestion: {
        type: Object,
        required: true,
    },
});

const questions = props.examQuestion.listQuestions;

const timer = ref(60);
const errorAnswer = ref(false);

const showResults = ref(false);

const totalCorrectAnswers = ref(0);

const stopTimer = ref(false);

const currentQuestion = ref(0);

const selectedAnswer = ref(null);

const totalPercentage = computed(() => {
    return questions.reduce((acc, question) => {
        return acc + question.percentage;
    }, 0);
});
const score = computed(() => {
    return (totalCorrectAnswers.value / totalPercentage.value) * 10;
});

const clear = () => {
    selectedAnswer.value = null;
    errorAnswer.value = false;
    stopTimer.value = false;
    timer.value = 60;
};

const timerOut = () => {
    showResults.value = true;
};

const next = () => {
    if (selectedAnswer.value == null || showResults.value) return;

    if (!errorAnswer.value) {
        totalCorrectAnswers.value +=
            questions[currentQuestion.value]?.percentage;
    }

    if (currentQuestion.value == questions.length - 1) {
        showResults.value = true;
        return;
    }

    currentQuestion.value++;

    clear();
};
</script>
