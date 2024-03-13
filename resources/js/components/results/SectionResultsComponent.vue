<template>
    <div>
        <div>
        <!-- ... -->
        

        <div class="progress">
            
            <div class="progress-bar" role="progressbar" :style="{ width: `${yesAnswersPercentage.toFixed(2)}%` }" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                {{ yesAnswersPercentage.toFixed() }}%
            </div>
        </div>
        <!-- ... -->
    </div>

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
        
        
        
              <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
 Complete section
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add section</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
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
            answers: [],
            questions: [],
            showModal: false,
        };
    },
    created() {
        this.fetchAnswers();
        this.getQuestions();
    },
    methods: {
        fetchAnswers() {
            axios.get(`/api/answers/${this.assessment}/${this.service}/${this.section}`)
                .then(response => {
                    this.answers = response.data;
                });
        },
        getQuestions() {
            axios.get(`/api/question/${this.section}`)
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
            return (this.yesAnswersCount / this.questions.length) * 100;
        },
    },
};
</script>