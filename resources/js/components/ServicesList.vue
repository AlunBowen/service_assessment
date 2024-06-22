<script>
import axios from "axios";

export default {
  props: {
    lang: {
      type: String,
      
    },
    localization: {
      
    },
  },

  data() {
    return {
      count: 0,
      services: [],
        searchTerm: "",
      localizationData: {},
    };
  },

  //a function to get the data from the API

  mounted() {
    // get all services and assign to a variable
    axios
      .get("/api/services")
      
      .then((response) => {
        this.services = response.data;
        
      })
      .catch((error) => {
        console.error(error);
      });
    //get the session lang and assign to a variable
   
      console.log(this.localization);
    
  },

  created() {
    this.localizationData = JSON.parse(this.localization);
  },

  computed: {
    
    filteredServices() {
      const lowerCaseSearchTerm = this.searchTerm.toLowerCase();
      return this.services.filter((services) => {
        return (
          services.name.toLowerCase().includes(lowerCaseSearchTerm)
        );
      });
    },
  },
};
</script>

<template>
<div class="container">
<div class="mb-3 p-2 rounded bg-custom" >
          <h2>{{localizationData.findServices}}</h2>
      
      <input
        v-model="searchTerm"
        type="text"
        class="form-control" 
        placeholder="Search by name..."
      />
    </div>
    
    <ul class="list-group list-group">
      <li class="list-group-item d-flex justify-content-between align-items-start" v-for="(services, index) in filteredServices" :key="index">
        <div class="ms-2 me-auto">
          <div v-if="lang == 'cym'">
            <h2>{{ services.name }}</h2> 
            {{ services.description  }}
           
            
          </div>
          <div v-else>
            <h2>{{ services.name }}</h2> 
            {{ services.description}}<br>
            
          </div>
          
          <div class="justify-content-end">
            <a class="btn btn-primary" :href="'/services/' + services.id">{{ localizationData.assessTheService }}</a>
          </div>
        </div>
      </li>
    </ul>
</div>
  </template>
  