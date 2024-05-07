<template>
    <div>

        
        <div>
            <p>Must</p>
        <div class="progress">
            
            <div class="progress-bar bg-success" role="progressbar" :style="{ width: `${levelOnePercentage.toFixed(2)}%` }" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                {{ levelOnePercentage.toFixed() }}%
            </div>
        </div>

        <p>Should</p>
        <div class="progress">
            
            <div class="progress-bar bg-info" role="progressbar" :style="{ width: `${levelTwoPercentage.toFixed(2)}%` }" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                {{ levelTwoPercentage.toFixed() }}%
            </div>
        </div>


        <p>Could</p>
        <div class="progress">
            
            <div class="progress-bar" role="progressbar" :style="{ width: `${levelThreePercentage.toFixed(2)}%` }" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                {{ levelThreePercentage.toFixed() }}%
            </div>
        </div>
        
    </div>
   <br>


   
  
</div>

    
    
</template>

<script>
import axios from 'axios';



export default {
    components: {
        
    },
    props: ['organisation', 'assessment'],
    data() {
        return {
            componentKey: 0,
            answers: [],
            questions: [],
            showModal: false,
            must: 0,
            mustLength: 0,
            should: 0,
            shouldLength: 0,
            could: 0,
            couldLength: 0,
        
        };
    },
    async created() {
        await this.fetchAnswers();
        // this.getQuestions();
        
    },
    methods: {
        async fetchAnswers() {
            try {
                const response = await axios.get(`/api/answers/${this.organisation}/${this.assessment}`);
                this.answers = response.data;
                this.must = this.answers.must || 0;
                this.mustLength = this.answers.mustLength || 0;
                this.should = this.answers.should || 0;
                this.shouldLength = this.answers.shouldLength || 0;
                this.could = this.answers.could || 0;
                this.couldLength = this.answers.couldLength || 0;
                
            } catch (error) {
                console.error(error);
            }
        },
       
        findAnswer(question) {
            return this.answers.find(answer => answer.question.id === question.id);
        },
        
    },

    
    
    computed: {
        levelOnePercentage() {
            if (this.answers.services) {
                return (this.must / this.mustLength * 100) / this.answers.services.length;
            }
            return 0; // or some other default value
        },
        levelTwoPercentage() {
            if (this.answers.services) {
                return (this.should / this.shouldLength * 100) / this.answers.services.length;
            }
            return 0; // or some other default value
        },
        levelThreePercentage() {
            if (this.answers.services) {
                return (this.could / this.couldLength * 100) / this.answers.services.length;
            }
            return 0; // or some other default value
        },
    },
};
</script>