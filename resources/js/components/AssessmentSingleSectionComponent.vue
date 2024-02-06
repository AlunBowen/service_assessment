

<script>
import AddQuestionComponent from './AddQuestionComponent.vue';

export default {
    emits: ['section-added', 'section-deleted'],
    props: {
        section: {
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
            sectionQuestions: [],
        };
    },
    created() {
        this.fetchAssessmentSections();
    },
    methods: {
        fetchAssessmentSections() {
            if (this.section.id === undefined) {
                return;
            }
            fetch(`/api/question/${this.section.id}`)
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
            fetch(`/api/assessmentsection/${this.section.id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrf
                }
            })
                .then(response => response.json())
                .then(data => {
                this.$emit('section-deleted', this.section);
            });
        },
        goToQuestions() {
            this.$router.push(`/assessmentsection/${this.section.id}/questions`);
            console.log(this.section.id);
        }
    },
    components: { AddQuestionComponent }
};
</script>
<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>{{ section.name_en }}</h2>
            </div>
            <div class="col text-center">
                <button class="btn btn-danger" @click="deleteSection">Delete Section</button>
            </div>
            <div class="col text-right">
                <a class="btn btn-primary" :href="`/assessmentsection/${this.section.id}/questions`" target="_self">View Questions</a>
            </div>
        </div>
    </div>


</template>