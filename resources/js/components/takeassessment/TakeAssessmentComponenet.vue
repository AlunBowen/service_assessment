<template>
   
    <br />
    <button class="btn btn-secondary" @click="goBack">Back</button>
    <div class="d-flex justify-content-center align-items-center pb-3" >
        <h2>{{ section.name }}</h2>
        <h2>Question {{ currentQuestionIndex+1 }} / {{ questions.length }} </h2>
    </div>
    <div class="d-flex justify-content-center align-items-center pb-3" >
        <h3 class="text-center">{{ questions[currentQuestionIndex] && questions[currentQuestionIndex]['question_' + lang] }}</h3> 
        
    </div>
        <div class="justify-content-center align-items-center " v-if="questions && questions[currentQuestionIndex]">
            <div class="row pb-3">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="form-check-label pe-2">
                        <input type="radio" name="options" id="option1" autocomplete="off" 
                        v-model="selectedAnswer" value="Yes" @change="addAnswer('Yes')" > Yes
                    </label>
                    <label class="form-check-label ps-2">
                        <input type="radio" name="options" id="option2" autocomplete="off" 
                        v-model="selectedAnswer" value="No" @change="addAnswer('No')"> No
                    </label>
                </div>
                

            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <button class="btn btn-primary" @click="goToPreviousQuestion" :disabled="currentQuestionIndex === 0">Back</button>
                <button class="btn btn-primary" @click="goToNextQuestion" :disabled="currentQuestionIndex === questions.length - 1">Next</button>
                <button class="btn btn-secondary" @click="goBack" v-if="currentQuestionIndex === questions.length - 1">Submit</button>
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
        lang: {
            type: String,
            required: true,
        },
    },
    data() {
        return {
            questions: [],
            answers: [],
            currentQuestionIndex: 0,
            selectedAnswer: null,
            
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
            this.selectedAnswer = null;
        },
        goToNextQuestion() {
            if (this.currentQuestionIndex < this.questions.length - 1) {
                this.currentQuestionIndex++;
            }
            this.selectedAnswer = null;
        },
        goBack() {
            window.location.href = `/services/${this.service.id}`;
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