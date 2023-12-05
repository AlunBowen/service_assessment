
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import { createApp } from 'vue/dist/vue.esm-bundler';

import ResourcesContainer from "./components/ResourcesContainer.vue";

const app = createApp({});

app.component("resourcescontainer", ResourcesContainer);

const mountedApp = app.mount("#app"); 