
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import axios from 'axios';
import { createApp } from 'vue/dist/vue.esm-bundler';
import VueCookies from 'vue3-cookies';

import ResourcesContainer from "./components/ResourcesContainer.vue";
import ServicesList from "./components/ServicesList.vue";
import OrganisationsList from "./components/OrganisationsList.vue";
import UserList from "./components/UserList.vue";
import ChartComponent from "./components/ChartComponent.vue";
import PrimeVue from 'primevue/config';
import Chart from 'primevue/chart';




const app = createApp({});
app.use(VueCookies);
app.use(PrimeVue);
app.component('Chart', Chart);
app.config.globalProperties.$axios = axios;

app.component("resourcescontainer", ResourcesContainer)
.component("serviceslist", ServicesList)
.component('organisationslist', OrganisationsList)
.component('userlist', UserList)
.component('chartcomponent', ChartComponent);
const mountedApp = app.mount("#app"); 