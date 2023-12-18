

<template>
    <div class="container">
      <!-- Search input -->
      <input v-model="searchTerm" placeholder="Search users" class="form-control my-3" />
  
      <!-- User table -->
      <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Organization</th>
            </tr>
        </thead>
        <tbody>
          <tr v-for="user in filteredUsers" :key="user.id">
            <td>{{ user.name }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.role }}</td>
            <td>{{ user.organization }}</td>
          </tr>
        </tbody>
      </table>
  
    </div>
</template>
  
  <script>
import axios from 'axios';

  export default {
    props: {
        organisation_id: {
            type: Number,
            default: 0,
        },
      
    },
    data() {
      return {
        searchTerm: "",
        users: [],
        
      };
    },

    mounted() {
      axios
        .get(`/api/organisationusers/${this.organisation_id}`)
        .then((response) => {
          this.users = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },

    
    computed: {
    // Use a computed property to filter assessments based on the search term
    filteredUsers() {
      const lowerCaseSearchTerm = this.searchTerm.toLowerCase();
      return this.users.filter((user) => {
        // Modify the condition based on the properties you want to search
        return (
          user.name.toLowerCase().includes(lowerCaseSearchTerm) ||
          user.email.toLowerCase().includes(lowerCaseSearchTerm)
        );
      });
    },
  },
  };
  </script>
  
  <style scoped>
  /* Add your styles here */
  </style>
  