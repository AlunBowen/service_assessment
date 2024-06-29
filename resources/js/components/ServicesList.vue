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
      placeholder: "Search by name...",
    };
  },

  

  mounted() {
    
    axios
      .get("/api/services")
      
      .then((response) => {
        this.services = response.data;
        
      })
      .catch((error) => {
        console.error(error);
      });
    
    
  },

  created() {
    this.localizationData = JSON.parse(this.localization);
    if (this.lang == "cym") {
      this.placeholder = "Chwilio yn ôl enw...";
    }
  },

  computed: {
    
    filteredServices() {
      const lowerCaseSearchTerm = this.searchTerm.toLowerCase();
      return this.services.filter((services) => {
        return (
          services.name_en.toLowerCase().includes(lowerCaseSearchTerm) || services.name_cym.toLowerCase().includes(lowerCaseSearchTerm)
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
        :placeholder="placeholder"
      />
    </div>
    
    <ul class="list-group list-group">
      <li class="list-group-item d-flex justify-content-between align-items-start" v-for="(services, index) in filteredServices" :key="index">
        <div class="ms-2 me-auto">
          
            <h2>{{ services['name_' + lang] }}</h2> 
            <p>{{ services['description_' + lang]  }}</p>
           
          
          <div class="justify-content-end">
            <a class="btn btn-primary" :href="'/services/' + services.id">{{ localizationData.assessTheService }}</a>
          </div>
        </div>
      </li>
    </ul>
</div>
  </template>
  