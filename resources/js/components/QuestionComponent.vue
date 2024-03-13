

<script>


export default {
    emits: ['question-added', 'question-deleted'],
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
        fetchAssessmentSections() {
            if (this.question.id === undefined) {
                return;
            }
            fetch(`/api/question/${this.question.id}`)
                .then(response => response.json())
                .then(data => {
                this.sectionQuestions = data;
                console.log(data);
            });
        },
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
        
    },
    
};
</script>
<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h3>{{ question.question_en }}</h3>
            </div>
            <div class="col text-right">
                <button class="btn btn-danger" @click="deleteSection">Delete Section</button>
            </div>
        </div>
    </div>
</template>

