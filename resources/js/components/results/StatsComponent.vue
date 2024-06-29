//vue component boilerplate
<template>
    <div class="container">
        <div class="row">
        <div class="col-md-4 ">
            <Card class="card p-2 ">
                <template #title><h2 class="text-center">Start rate</h2><hr /></template>
                
                <template #content>
                <p class="m-0 fs-6 text-center">
                    The start rate is the percentage of your services that have started the assessment. 
                </p>
                <hr />
                <h1 class="fs-1 text-center"><p>{{ completionRate }}%</p></h1>
                </template>
            </Card>
        </div>  
        <div class="col-md-4">
            <Card class="card p-2">
                <template #title><h2 class="text-center">Latest update</h2><hr /></template>
                <template #content>
                <p class="m-0 fs-6 text-center">
                    The date of the last update to the system.
                </p>
                <hr />
                <h1 class="fs-1 text-center"><p>{{ dateOfLastUpdate }}</p></h1>
                </template>
            </Card>
        </div>  
        <div class="col-md-4">
            <Card class="card p-2">
                <template #title><h2 class="text-center">Service count</h2><hr /></template>
                <template #content>
                <p class="m-0 fs-6 text-center">
                    The number of services that have been added to the system.
                </p>
                <hr />
                <h1 class="fs-1 text-center"><p>{{ countOfServices }}</p></h1>
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
            dateOfLastUpdate: "",
            countOfServices: 0,
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

        axios
                .get(`/api/results/lastupdate/${this.organisation}/${this.assessment}`)
                .then((response) => {
                    this.dateOfLastUpdate = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });

        axios
                .get(`/api/countofservices/${this.organisation}`)
                .then((response) => {
                    this.countOfServices = response.data;
                    console.log(this.countOfServices);
                })
                .catch((error) => {
                    console.error(error);
                });
                console.log(this.countOfServices);

                
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