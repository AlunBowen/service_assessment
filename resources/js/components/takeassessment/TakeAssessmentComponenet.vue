<template>
    
    <div class="d-flex justify-content-center align-items-center" >
        <h1>{{ questions[currentQuestionIndex] && questions[currentQuestionIndex].question_en }}</h1>
        <p>{{ currentAnswer }}</p>

        
        </div>
        <div class="justify-content-center align-items-center" v-if="questions && questions[currentQuestionIndex]">
            <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <button class="btn btn-success btn-lg" @click="addAnswer('Yes')">Yes</button>
                <button class="btn btn-danger btn-lg" @click="addAnswer('No')">No</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <button class="btn btn-primary" @click="goToPreviousQuestion" :disabled="currentQuestionIndex === 0">Back</button>
                <button class="btn btn-primary" @click="goToNextQuestion" :disabled="currentQuestionIndex === questions.length - 1">Next</button>
            </div>
        </div>
       
        
    </div>
    <div v-else>
        <p>No questions found</p>
    </div>


</template>

<script>
import axios from 'axios';

export default {
    props: {
       section: {
            type: Object,
            required: true,
        },
        service: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            questions: [],
            answers: [],
            currentQuestionIndex: 0,
            
        };
    },
    methods: {
        getQuestions() {
            axios.get(`/api/question/${this.section.id}`)
                .then(response => {
                    this.questions = response.data;
                });
        },
        fetchAnswers() {
            axios.get(`/api/answers/1/${this.service.id}/${this.section.id}`)
                .then(response => {
                    this.answers = response.data;
                });
        },

        addAnswer(answer) {
            axios.post(`/api/answer/1/${this.service.id}/${this.section.id}/${this.questions[this.currentQuestionIndex].id}/${answer}`) 
                .then(() => {
                    this.fetchAnswers();
                });
        },

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
    created() {
        this.getQuestions();
        this.fetchAnswers();
    },
     
     computed: {
        currentAnswer() {
            const question = this.questions[this.currentQuestionIndex];
            const answer = this.answers.find(answer => answer.question_id === question.id);
            return answer ? answer.answer : 'No answer found';
        },
    },
};
</script>