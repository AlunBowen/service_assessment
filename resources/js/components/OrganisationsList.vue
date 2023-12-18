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
    <div class="justify-content-end">
      <a :href="'/organisations/' + organisation.id">View</a>
    </div>
    </div>
   
  </li>
  
</div>

</ol></div>
  </template>
  