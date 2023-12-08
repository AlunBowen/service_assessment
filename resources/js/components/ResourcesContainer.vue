<script>
import axios from 'axios';
import VueCookies from 'vue3-cookies';


export default {
    props: {
        

        
    },
   
    data() {
        return {
            count: 0,
            assessments: [],
            lang: null,

        
    };
},


//a function to get the data from the API


mounted() {
   
    console.log(this.lang);
    // get all assessments and assign to a variable
    axios.get('/api/assessments')
        .then((response) => {
            this.assessments = response.data;
        })
        .catch((error) => {
            console.error(error);
        });
    //get the session lang and assign to a variable
    
    
   
         
},


methods: {
        getCookieValue() {
            // Replace 'your_cookie_name' with the actual name you used in Laravel
            const cookieValue = this.$cookies.get("language");

            if (cookieValue) {
                console.log('Cookie Value:', cookieValue);
            } else {
                console.log('Cookie not found');
            }
        }
    }
};
</script>

<template>
    <div>

        <button @click="getCookieValue">Get Cookie Value</button>
        lang: {{ this.lang }}

        </div>
        <div v-for="(assessment, index) in assessments" :key="index">

          
            <div v-if= "lang == 'cym'">
                {{ assessment.name_cym }}
            </div>
            <div v-else>
            {{ assessment.name_en }}
            </div>
        </div>
    
</template>