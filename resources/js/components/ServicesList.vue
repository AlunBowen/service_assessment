<script>
import axios from "axios";

export default {
  props: {
    lang: {
      type: String,
      default: "en",
    },
  },

  data() {
    return {
      count: 0,
      services: [],
        searchTerm: "",
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
   

    
  },

  computed: {
    // Use a computed property to filter assessments based on the search term
    filteredServices() {
      const lowerCaseSearchTerm = this.searchTerm.toLowerCase();
      return this.services.filter((services) => {
        // Modify the condition based on the properties you want to search
        return (
          services.name.toLowerCase().includes(lowerCaseSearchTerm) ||
          services.name.toLowerCase().includes(lowerCaseSearchTerm)
        );
      });
    },
  },
};
</script>

<template>

<div class="mb-3 p-2 rounded bg-custom" >
          <h2>Search for services</h2>
      <!-- Add a search input field -->
      <input
        v-model="searchTerm"
        type="text"
        class="form-control" 
        placeholder="Search by name..."
      />
    </div>
<div class="container">
    <ul class="list-group list-group">
      <li class="list-group-item d-flex justify-content-between align-items-start" v-for="(services, index) in filteredServices" :key="index">
        <div class="ms-2 me-auto">
          <div v-if="lang == 'cym'">
            <b>{{ services.name }}</b> <br>
            {{ services.description  }}
            {{ services.department }}
          </div>
          <div v-else>
            <b>{{ services.name }}</b><br>
            {{ services.description}}<br>
            {{ services.department ? services.department.name : '' }}
          </div>
          <div class="justify-content-end">
            <a :href="'/services/' + services.id">View</a>
          </div>
        </div>
      </li>
    </ul>
</div>
  </template>
  