<template>
    <div>
        <h2>{{ questions[currentQuestionIndex].question_en }}</h2>
        <button @click="goToPreviousQuestion" :disabled="currentQuestionIndex === 0">Back</button>
        <button @click="goToNextQuestion" :disabled="currentQuestionIndex === questions.length - 1">Next</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            questions: [], // Replace this with your actual questions data
            currentQuestionIndex: 0,
        };
    },
    methods: {
        goToPreviousQuestion() {
            if (this.currentQuestionIndex > 0) {
                this.currentQuestionIndex--;
            }
        },
        goToNextQuestion() {
            if (this.currentQuestionIndex < this.questions.length - 1) {
                this.currentQuestionIndex++;
            }
        },
    },
};
</script>