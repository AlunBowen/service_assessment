<template>
    <div>
        <h2>{{ assessment.name_en }}</h2>
        <form @submit.prevent="addSection">
            <input type="hidden" name="_token" :value="csrf"> <!-- CSRF token -->
           

            <div class="form-group">
                <label for="name_en">Section Name (English)</label>
                <input type="text" id="name_en" v-model="section.name_en" class="form-control">
            </div>

            <div class="form-group">
                <label for="name_cym">Section Name (Welsh)</label>
                <input type="text" id="name_cym" v-model="section.name_cym" class="form-control">
            </div>

            <div class="form-group">
                <label for="description_en">Section Description (English)</label>
                <input type="text" id="description_en" v-model="section.description_en" class="form-control">
            </div>

            <div class="form-group">
                <label for="description_cym">Section Description (Welsh)</label>
                <input type="text" id="description_cym" v-model="section.description_cym" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Add Section</button>
        </form>
    </div>
</template>

<script>
export default {
    props: {
        assessment: {
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
            section: {
                name_en: '',
                name_cym: '',
                description_en: '',
                description_cym: '',
                assessment_id: this.assessment.id
            }
        };
    },
    methods: {
        addSection() {
            // Replace this with your actual API call
            fetch(`/api/assessmentsection`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrf
                },
                body: JSON.stringify(this.section)
            })
            .then(response => response.json())
            
                
            .then(data => {
                this.$emit('section-added', this.section);
                this.section = {
                    name_en: '',
                    name_cym: '',
                    description_en: '',
                    description_cym: '',
                    assessment_id: this.assessment.id
                }
                
            });
        }
    }
};
</script>