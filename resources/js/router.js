import { createRouter, createWebHistory } from "vue-router";
import Login from "./components/Login/Index.vue";
import Register from "./components/Register/Index.vue";
import Dashboard from "./components/Dashboard/Index.vue";
import Peminjaman from "./components/Peminjaman/Index.vue";
import FormPeminjaman from "./components/Peminjaman/Create.vue";
import Profile from "./components/Profile/Index.vue";

const routes = [
    { path: "/login", name: "login", component: Login },
    { path: "/register", name: "register", component: Register },
    { path: "/dashboard", name: "dashboard", component: Dashboard },
    { path: "/peminjaman", name: "peminjaman", component: Peminjaman },
    { path: "/peminjaman/create", name: "form-peminjaman", component: FormPeminjaman },
    { path: "/profile", name: "profile", component: Profile },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
