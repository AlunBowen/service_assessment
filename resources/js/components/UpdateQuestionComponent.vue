<template>
     <form @submit.prevent="updateQuestion">
            <input type="hidden" name="_token" :value="csrfToken"> 

    <div class="form-group">
        <label for="name_en">Question (English)</label>
        <input type="text" id="name_en" v-model="localQuestion.question_en" class="form-control">
    </div>
    <div class="form-group">
        <label for="name_cym">Question Name (Welsh)</label>
        <input type="text" id="name_cym" v-model="localQuestion.question_cym" class="form-control">
    </div>
    <div class="form-group">
        <label for="level">Question Level</label>
        <select id="level" v-model="localQuestion.level" class="form-select">
            <option value="1">Must</option>
            <option value="2">Should</option>
            <option value="3">Could</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Question</button>
     </form>
    
</template>

<script>
export default {
    props: {
        question: {
            type: Object,
            required: true
        },
        csrfToken: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            localQuestion: { ...this.question }
        };
    },
    methods: {
        updateQuestion() {
            fetch(`/api/question/${this.localQuestion.id}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
                body: JSON.stringify(this.localQuestion),
            })
            .then(response => response.json())
            .then(data => {
                this.$emit('question-updated', this.localQuestion);
                this.localQuestion = { ...data };
            });
        }
    }
};
</script>