<script>
import axios from "axios";

export default {
  props: {
    lang: {
      type: String,
      default: "en",
    },
    
    section: {
      type: Number,
      default: 1,
    },
  },

  data() {
    return {
      count: 0,
      resources: [],
        searchTerm: "",
    };
  },

  //a function to get the data from the API

  mounted() {
    // get all resources and assign to a variable
    axios
      .get(`/api/resources/${this.section}`)
      .then((response) => {
        this.resources = response.data;
        
      })
      .catch((error) => {
        console.error(error);
      });
   
    
  },

  computed: {
    // Use a computed property to filter resources based on the search term
    filteredAssessments() {
      const lowerCaseSearchTerm = this.searchTerm.toLowerCase();
      return this.resources.filter((resources) => {
        // Modify the condition based on the properties you want to search
        return (
          // resources.name_en.toLowerCase().includes(lowerCaseSearchTerm) ||
          // resources.name_cym.toLowerCase().includes(lowerCaseSearchTerm)
          resources.name_en.toLowerCase().includes(lowerCaseSearchTerm) ||
          resources.name_cym.toLowerCase().includes(lowerCaseSearchTerm)
        );
      });
    },
  },
};
</script>

<template>
    
    
      <h1>Curated resources</h1>
      <div class="row">
        <div v-for="(resources, index) in filteredAssessments" :key="index" class="col-xl-3 col-lg-4 col-md-6 mb-4">
          <div class="card">
            <img
              src="https://www.ringcentral.com/us/en/blog/wp-content/uploads/2020/07/Effective-teamwork.png.webp"
              class="card-img-top"
              alt="..."
            />
            <div class="card-body">
              <div v-if="lang == 'cym'">
                {{ resources.name_cym }} <br>
                {{ resources.description_cym  }}
                
              </div>
              <div v-else>
                {{ resources.name_en}}<br>
                {{ resources.description_en}}
              </div>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
   
  </template>
  