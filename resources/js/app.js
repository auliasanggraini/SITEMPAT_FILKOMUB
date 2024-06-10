import { createApp } from 'vue';
import './bootstrap';

const app = createApp({});

import RuanganList from './components/RuanganList.vue';
import PeminjamanForm from './components/PeminjamanForm.vue';
import Login from './components/Login.vue';

app.component('example-component', ExampleComponent);
app.component('ruangan-list', RuanganList);
app.component('peminjaman-form', PeminjamanForm);
app.component('login', Login);

app.mount('#app');
