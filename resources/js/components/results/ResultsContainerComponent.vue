<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6" v-for="section in sections" :key="section.id">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{ section.name_en }}</p>
                        <sectionresults :section="section.id" :service="service" :assessment="assessment"></sectionresults>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    props: ['assessment', 'service'],
    data() {
        return {
            sections: [],
        };
    },
    created() {
        this.fetchSections();
    },
    methods: {
        // fetchAnswers() {

        //     axios.get(`/api/answers/${this.assessment}/${this.service}`)
        //         .then(response => {
        //             this.answers = response.data;
        //             console.log(response.data);
        //         });
        // },

        fetchSections() {
            
            fetch(`/api/assessmentsection/${this.assessment}`)
                .then(response => response.json())
                .then(data => {
                    this.sections = data;
                });
        },
    },
};
</script>