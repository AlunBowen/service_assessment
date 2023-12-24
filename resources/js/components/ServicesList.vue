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
      assessments: [],
        searchTerm: "",
    };
  },

  //a function to get the data from the API

  mounted() {
    // get all assessments and assign to a variable
    axios
      .get("/api/assessments")
      .then((response) => {
        this.assessments = response.data;
      })
      .catch((error) => {
        console.error(error);
      });
    //get the session lang and assign to a variable
   

    
  },

  computed: {
    // Use a computed property to filter assessments based on the search term
    filteredAssessments() {
      const lowerCaseSearchTerm = this.searchTerm.toLowerCase();
      return this.assessments.filter((assessment) => {
        // Modify the condition based on the properties you want to search
        return (
          assessment.name_en.toLowerCase().includes(lowerCaseSearchTerm) ||
          assessment.name_cym.toLowerCase().includes(lowerCaseSearchTerm)
        );
      });
    },
  },
};
</script>

<template>

<div class="mb-3 p-2 rounded bg-custom" >
          <h2>Search for resources</h2>
      <!-- Add a search input field -->
      <input
        v-model="searchTerm"
        type="text"
        class="form-control" 
        placeholder="Search by name..."
      />
    </div>
  <div v-for="(assessment, index) in filteredAssessments" :key="index">
    <ol class="list-group list-group-numbered">
      <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
          <div v-if="lang == 'cym'">
                {{ assessment.name_cym }} <br>
                {{ assessment.description_cym  }}
              </div>
              <div v-else>
                {{ assessment.name_en }}<br>
                {{ assessment.description_en  }}
              </div>
          <div class="justify-content-end">
            <a :href="'/assessments/' + assessment.id">View</a>
          </div>
        </div>
      </li>
  


</ol>
</div>
  </template>
  