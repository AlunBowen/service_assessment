<template>

    <br />
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
    
    <div>
     
        <curatedresourcescontainer v-if="section" :section="section"></curatedresourcescontainer>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    props: ['assessment', 'service'],
    data() {
        return {
            sections: [],
            results: [],
            lowestScore: 0,
            section: 0,
        };
    },
    created() {
        this.fetchSections();
        this.getResults();
        
        
    },
    methods: {
     

        fetchSections() {
            
            fetch(`/api/assessmentsection/${this.assessment}`)
                .then(response => response.json())
                .then(data => {
                    this.sections = data;
                });
        },
        getResults() {
            axios.get(`/api/answer/results/${this.assessment}/${this.service}`)
                .then(response => {
                    this.results = response.data;
                })
                .then(() => {
                    this.calculateLowestPerformingSection();
                })
        },

    

        calculateLowestPerformingSection() {
            let lowest = 300;
            
            this.results.forEach((result, i) => { 
                let totalSum = 0; 
                for (let j = 1; j < result.length; j++) { 
                    totalSum += result[j];
                    console.log(this.section)
                    ;
                }
                if (totalSum <= lowest) {
                    lowest = totalSum;
                    this.section = i+1; 
                }
                
                if (lowest === 150) {
                    this.section = 123;
                    
                }
            });
        },
    },
};
</script>