<script>
import axios from "axios";

export default {
  props: {
    lang: {
      type: String,
      default: "en",

    },
    organisations: {
      type: Object,
      
    },
    
  },

  data() {
    console.log(this.organisations);
    return {
      count: 0,
      
        searchTerm: "",
    };
  },

  //a function to get the data from the API

  // mounted() {
  //   // get all assessments and assign to a variable
  //   axios
  //     .get("/api/organisations")
  //     .then((response) => {
  //       this.organisations = response.data;
  //     })
  //     .catch((error) => {
  //       console.error(error);
  //     });
  //   //get the session lang and assign to a variable
  //   console.log(this.lang);
  // },

//   computed: {
//     // Use a computed property to filter assessments based on the search term
//     filteredAssessments() {
//       const lowerCaseSearchTerm = this.searchTerm.toLowerCase();
//       return this.assessments.filter((assessment) => {
//         // Modify the condition based on the properties you want to search
//         return (
//           assessment.name_en.toLowerCase().includes(lowerCaseSearchTerm) ||
//           assessment.name_cym.toLowerCase().includes(lowerCaseSearchTerm)
//         );
//       });
//     },
//   },


};

</script>

<template>
  <div>
    <ol class="list-group list-group-numbered">

 
  <div v-for="organisation in organisations" :key="organisation.id">

  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">{{ organisation.name}}</div>
      {{ organisation.description}}
  
    </div>
   
  </li>
  
</div>

</ol></div>
  </template>
  