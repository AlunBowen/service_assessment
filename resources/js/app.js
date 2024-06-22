
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import axios from 'axios';
import { createApp } from 'vue/dist/vue.esm-bundler';
import VueCookies from 'vue3-cookies';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'


import TimeBasedChart from "./components/TimeBasedChart.vue";
import ResourcesContainer from "./components/ResourcesContainer.vue";
import ServicesList from "./components/ServicesList.vue";
import OrganisationsList from "./components/OrganisationsList.vue";
import UserList from "./components/UserList.vue";
import ChartComponent from "./components/ChartComponent.vue";
import AssessmentSectionsComponent from "./components/sections/SectionsListComponent.vue";
import AssessmentSingleSectionComponent from "./components/sections/SectionComponent.vue";
import AddAsessmentSectionComponent from "./components/sections/AddSectionComponent.vue";
import AssessmentSectionQuestionsComponent from "./components/sections/SectionQuestionsComponent.vue";
import AddQuestionComponent from "./components/AddQuestionComponent.vue";
import QuestionComponent from "./components/QuestionComponent.vue";
import ResultsContainerComponent from "./components/results/ResultsContainerComponent.vue";
import SectionResultsComponent from "./components/results/SectionResultsComponent.vue"; 
import TakeAssessmentComponenet from "./components/takeassessment/TakeAssessmentComponenet.vue";
import OverallResultsComponent from "./components/results/OverallResultsComponent.vue";
import StatsComponent from "./components/results/StatsComponent.vue";
import PrimeVue from 'primevue/config';
import Chart from 'primevue/chart';
import Slider from 'primevue/slider';
import Card from 'primevue/card';
import UpdateQuestionComponent from "./components/UpdateQuestionComponent.vue";
import CuratedResourcesContainer from "./components/CuratedResourcesContainer.vue";

const app = createApp({});
app.use(VueCookies);
app.use(PrimeVue);

app.component('Chart', Chart);
app.component('Slider', Slider);
app.component('Card', Card);

app.config.globalProperties.$axios = axios;

app.component("resourcescontainer", ResourcesContainer)
.component("serviceslist", ServicesList)
.component('statscomponent', StatsComponent)
.component('organisationslist', OrganisationsList)
.component('userlist', UserList)
.component('chartcomponent', ChartComponent)
.component('assessmentsections', AssessmentSectionsComponent)
.component('assessmentsinglesection', AssessmentSingleSectionComponent)
.component('addassessmentsection', AddAsessmentSectionComponent)
.component('assessmentsectionquestions', AssessmentSectionQuestionsComponent)
.component("font-awesome-icon", FontAwesomeIcon)
.component('question', QuestionComponent)
.component('resultscontainer', ResultsContainerComponent)
.component('sectionresults', SectionResultsComponent)
.component('takeassessment', TakeAssessmentComponenet)
.component('addquestion', AddQuestionComponent)
.component('overallresults', OverallResultsComponent)
.component('timebasedchart', TimeBasedChart)
.component('curatedresourcescontainer', CuratedResourcesContainer)
.component('updatequestion', UpdateQuestionComponent);

const mountedApp = app.mount("#app"); 