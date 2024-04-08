<template>
    <div>
        <div>
        
        <p>Should</p>
        <div class="progress">
            
            <div class="progress-bar" role="progressbar" :style="{ width: `${levelTwoPercentage.toFixed(2)}%` }" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                {{ levelTwoPercentage.toFixed() }}%
            </div>
        </div>


        <p>Overall</p>
        <div class="progress">
            
            <div class="progress-bar" role="progressbar" :style="{ width: `${yesAnswersPercentage.toFixed(2)}%` }" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                {{ yesAnswersPercentage.toFixed() }}%
            </div>
        </div>
        
    </div>
   <br>
        <div v-for="question in questions" :key="question.id">
            <div class="row">
                <div class="col-md-10">
                    <p>{{ question.question_en }}</p>

                </div>
                <div class="col-md-2">
                        <p :class="{ 'bg-success text-center': findAnswer(question).answer === 'Yes', 'bg-danger text-center': findAnswer(question).answer === 'No' }" v-if="findAnswer(question)">
                            {{ findAnswer(question).answer }}
                        </p>
                        <p class="bg-secondary text-center" v-else>X</p>
                    
                </div>

             
            </div>
            
        </div> 
        

       
        
        
<!-- Button to complete section -->
<a :href="`/services/${this.service}/${section.id}`" class="btn btn-primary">
    Complete section
</a>


        </div>
    
</template>

<script>
import axios from 'axios';



export default {
    components: {
        
    },
    props: ['assessment', 'service', 'section'],
    data() {
        return {
            componentKey: 0,
            answers: [],
            questions: [],
            showModal: false,
            sectionNumber: this.section.id,
        };
    },
    created() {
        this.fetchAnswers();
        this.getQuestions();
        
    },
    methods: {
        fetchAnswers() {
            axios.get(`/api/answers/${this.assessment}/${this.service}/${this.section.id}`)
                .then(response => {
                    this.answers = response.data;
                });
        },
        getQuestions() {
            axios.get(`/api/question/${this.section.id}`)
                .then(response => {
                    this.questions = response.data;
                });
        },
        findAnswer(question) {
            return this.answers.find(answer => answer.question.id === question.id);
        },
        
    },
    computed: {
        yesAnswersCount() {
            return this.answers.filter(answer => answer.answer === 'Yes').length;
        },
        yesAnswersPercentage() {
            if (this.questions.length === 0) {
                return 0;
            }
            return (this.yesAnswersCount / this.questions.length) * 100;
        },


         levelTwoPercentage() {
            const levelTwoAnswers = this.answers.filter(answer => answer.question.level === 2);
            const levelTwoYesAnswersCount = levelTwoAnswers.filter(answer => answer.answer === 'Yes');


            if (levelTwoAnswers.length === 0) {
                return 0;
            }
            return (levelTwoYesAnswersCount.length / levelTwoAnswers.length) * 100;
         },

        
    },
};
</script>