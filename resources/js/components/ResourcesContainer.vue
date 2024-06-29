<script>
import axios from "axios";

export default {
  props: {
    lang: {
      type: String,
      default: "en",
    },
    localization: {
      
    },
  },

  data() {
    return {
      count: 0,
      resources: [],
        searchTerm: "",
      localizationData: {},
      placeholder: "Search by name...",
      
    };
    
  },

  //a function to get the data from the API

  mounted() {
    // get all resources and assign to a variable
    axios
      .get("/api/resources")
      .then((response) => {
        this.resources = response.data;
        console.log(this.resources);
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
    filteredAssessments() {
      const lowerCaseSearchTerm = this.searchTerm.toLowerCase();
      return this.resources.filter((resources) => {
        return ( 
          resources.name_en.toLowerCase().includes(lowerCaseSearchTerm) ||
          resources.name_cym.toLowerCase().includes(lowerCaseSearchTerm)
        );
      });
    },
  },
};
</script>

<template>
    
    
        <div class="mb-3 p-2 rounded bg-custom" >
          <h2>{{localizationData.Searchforresources}}</h2>
    
      <input
        v-model="searchTerm"
        type="text"
        class="form-control" 
        :placeholder="placeholder"
      />
    </div>
      <div class="row">
        <div v-for="(resources, index) in filteredAssessments" :key="index" class="col-xl-3 col-lg-4 col-md-6 mb-4">
          <div class="card">
            <img
              src="https://www.ringcentral.com/us/en/blog/wp-content/uploads/2020/07/Effective-teamwork.png.webp"
              class="card-img-top"
              alt="Resource image"
              
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
              <a href="#" class="btn btn-primary">{{ localizationData.GoSomewhere }}</a>
            </div>
          </div>
        </div>
      </div>
   
  </template>
  