import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from './store';
import axios from 'axios';

axios.defaults.baseURL = 'http://127.0.0.1:8000';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const app = createApp(App);
app.use(router);
app.use(store);
app.config.globalProperties.$axios = axios;
app.mount("#app");
