

<script>
export default {

    
    props: {
        assessment: {
            type: Object,
            required: true
        },
        
    },
    data() {
        return {
            assessmentSections: [],
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };
    },
    created() {
        this.fetchAssessmentSections();
    },
    methods: {
        fetchAssessmentSections() {
        
            fetch(`/api/assessmentsection/${this.assessment.id}`)
                .then(response => response.json())
                .then(data => {
                    this.assessmentSections = data;
                    
                });
        },
        updateSections(newSection) {
    // Add the new section to the list
    this.assessmentSections.push(newSection);
    console.log(newSection);
  },
        removeSection(section) {
            // Remove the section from the list
            this.assessmentSections = this.assessmentSections.filter(s => s.id !== section.id);
        }
    }
};
</script>

<template>
    <div>
        <h2>{{ assessment.name_en }}</h2>
        <div v-for="(section, index) in assessmentSections" :key="index">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <assessmentsinglesection :section="section" :csrf=csrfToken @section-deleted="removeSection"></assessmentsinglesection>
                </div>
            </div>
        </div>
    </div>

   

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add a new section
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add section to:</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <addassessmentsection :assessment="assessment" :csrf=csrfToken @section-added="fetchAssessmentSections"></addassessmentsection>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
</template>