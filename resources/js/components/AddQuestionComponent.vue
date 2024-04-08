<template>
    <div>
        <h2>Add Question to {{ section.name_en }}</h2>
        <form @submit.prevent="addSection">
            <input type="hidden" name="_token" :value="csrf"> 
           

            <div class="form-group">
                <label for="name_en">Question (English)</label>
                <input type="text" id="name_en" v-model="question.question_en" class="form-control">
            </div>

            <div class="form-group">
                <label for="name_cym">Question Name (Welsh)</label>
                <input type="text" id="name_cym" v-model="question.question_cym" class="form-control">
            </div>

            <div class="form-group">
                <label for="level">Question Level</label>
                <select id="level" v-model="question.level" class="form-control">
                    <option value="1">Must</option>
                    <option value="2">Should</option>
                    <option value="3">Could</option>
</select>
            </div>

            <button type="submit" class="btn btn-primary">Add Question</button>
        </form>
    </div>
</template>

<script>
export default {
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
            question: {
                question_en: '',
                question_cym: '',
                level: '',
                
                assessment_section_id: this.section.id
            }
        };
    },
    methods: {
        addSection() {
            
            fetch(`/api/question`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrf
                },
                body: JSON.stringify(this.question)
            })
            .then(response => response.json())
            
                
            .then(data => {
                this.$emit('question-added', this.question);
                this.question = {
                    question_en: '',
                    question_cym: '',
                    level: '',
                    assessment_section_id: this.section.id
                }
                
            });
        }
    }
};
</script>