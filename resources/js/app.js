
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import axios from 'axios';
import { createApp } from 'vue/dist/vue.esm-bundler';
import VueCookies from 'vue3-cookies';

import ResourcesContainer from "./components/ResourcesContainer.vue";


const app = createApp({});
app.use(VueCookies);
app.config.globalProperties.$axios = axios;

app.component("resourcescontainer", ResourcesContainer);

const mountedApp = app.mount("#app"); 