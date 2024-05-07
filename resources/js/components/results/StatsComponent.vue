//vue component boilerplate
<template>
    <div class="container">
        <div class="row">
        <div class="col-md-4">
            <Card>
                <template #title><h2>Completion rate</h2></template>
                <template #content>
                <p class="m-0">
                    The completion rate is the percentage of services that have been completed.
                </p>
                <p>{{ completionRate }}</p>
                </template>
            </Card>
        </div>  
        <div class="col-md-4">
            <Card>
                <template #title><h2>Latest update</h2></template>
                <template #content>
                <p class="m-0">
                    The completion rate is the percentage of services that have been completed.
                </p>
                </template>
            </Card>
        </div>  
        <div class="col-md-4">
            <Card>
                <template #title><h2>Service count</h2></template>
                <template #content>
                <p class="m-0">
                    The completion rate is the percentage of services that have been completed.
                </p>
               
                </template>
            </Card>
        </div>  
        </div>
        </div>

</template>
<script>
import  axios  from 'axios';

export default {

    props: {
      
        localization: {
            type: String,
            required: true,
        },
        organisation: {
            type: Number,
            required: true,
        },
        assessment: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            count: 0,
            services: [],
            searchTerm: "",
            localizationData: {},
            completionRate: 0,
        };
    },
    mounted() {
        
        axios
                .get(`/api/results/${this.organisation}/${this.assessment}`)
                .then((response) => {
                    this.completionRate = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    
    created() {
        this.localizationData = JSON.parse(this.localization);
    },
    computed: {
        filteredServices() {
            const lowerCaseSearchTerm = this.searchTerm.toLowerCase();
            return this.services.filter((services) => {
                return (
                    services.name.toLowerCase().includes(lowerCaseSearchTerm) ||
                    services.name.toLowerCase().includes(lowerCaseSearchTerm)
                );
            });
        },
    },
};

</script>