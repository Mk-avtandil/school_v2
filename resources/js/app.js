import "./bootstrap";
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';

import router from "./router/index";
import { createApp } from "vue";

import App from "./App.vue";

createApp(App).use(router).mount("#app");

