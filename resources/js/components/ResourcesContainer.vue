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
    console.log(this.lang);
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
      <div class="row">
        <div v-for="(assessment, index) in filteredAssessments" :key="index" class="col-xl-3 col-lg-4 col-md-6 mb-4">
          <div class="card">
            <img
              src="https://www.ringcentral.com/us/en/blog/wp-content/uploads/2020/07/Effective-teamwork.png.webp"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <div v-if="lang == 'cym'">
                {{ assessment.name_cym }} <br>
                {{ assessment.description_cym  }}
              </div>
              <div v-else>
                {{ assessment.name_en }}<br>
                {{ assessment.description_en  }}
              </div>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
   
  </template>
  