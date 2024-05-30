

<script>


export default {
    emits: ['question-added', 'question-deleted', 'question-updated'],
    props: {
        question: {
            type: Object,
            required: true
        },
        csrf: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            
        };
    },
    created() {
        
    },
    methods: {
        deleteSection() {
            if (confirm('Are you sure you want to delete this section?') === false) {
                return;
            }
            fetch(`/api/question/${this.question.id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrf
                }
            })
                .then(response => response.json())
                .then(data => {
                this.$emit('question-deleted', this.question);
            });
        },
        updateQuestion() {
            this.$emit('question-updated', this.question);
        }
        
    },
    
};
</script>
<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <p>{{ question.question_en }}</p>
            </div>
           
            

            
            <div class="col text-right">
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Update Question
</button>
                <button class="btn btn-danger" @click="deleteSection">Delete Section</button>
            </div>
        </div>
    </div>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add questions to:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <updatequestion :question="question" :csrfToken=csrf  ></updatequestion>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" 
        @click="updateQuestion">Done</button>
      </div>
    </div>
  </div>
</div>
</template>

