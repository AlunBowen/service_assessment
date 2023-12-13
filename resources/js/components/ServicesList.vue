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
    <ol class="list-group list-group-numbered">


  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Subheading</div>
      Content for list item
    </div>
   
  </li>
  


</ol>
  </template>
  