<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6" v-for="section in sections" :key="section.id">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-text">{{ section.name_en }}</h2>
                        <sectionresults :section="section" :service="service" :assessment="assessment"></sectionresults>
                    </div>
                </div>
                <br />
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