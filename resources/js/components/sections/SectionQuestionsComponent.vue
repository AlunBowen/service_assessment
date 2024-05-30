

<script>
export default {

    
    props: {
        section: {
            type: Object,
            required: true,
           
        },
        
    },
    data() {
        return {
            questions: [],
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };
    },
    created() {
        this.fetchSectionQuestions();
    },
    methods: {
        fetchSectionQuestions() {
        
            fetch(`/api/question/${this.section.id}`)
                .then(response => response.json())
                .then(data => {
                    this.questions = data;
                    
                });
                console.log("UPDATED");
        },
        updateSections(newSection) {
    // Add the new section to the list
    this.questions.push(newSection);
    console.log(newSection);
  },
        removeSection(section) {
            // Remove the section from the list
            this.questions = this.questions.filter(s => s.id !== section.id);
        },
        updateQuestion(newQuestion) {
            console.log("UPDATE123D");
            // Find the index of the question
            const index = this.questions.findIndex(q => q.id === newQuestion.id);
            // Create a new object with the updated properties
            const updatedQuestion = { ...this.questions[index], ...newQuestion };
            // Replace the question with the updated question
            this.questions.splice(index, 1, updatedQuestion);
        }
        
    }
};



</script>

<template>
   
   <h1> {{ section.name_en }} {{   }}</h1>

<a class="btn btn-secondary" :href="`/assessments/${section.assessment_id}`" target="_self">
     Back to assessment
</a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add a new question
</button>

    <div v-for="(question, index) in questions" :key="index">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <question :question="question" :csrf=csrfToken  
                @question-updated="fetchSectionQuestions" 
                @question-deleted="removeSection"></question>
            </div>
        </div>
    </div>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add question</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <addquestion :section="section" :csrf=csrfToken @question-added="fetchSectionQuestions" ></addquestion>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


    
</template>