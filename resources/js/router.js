import { createRouter, createWebHistory } from 'vue-router'
const BASE_URL = '/'

import Login from "./components/Login.vue";
import About from "./components/About.vue";


const routes = [
    {
        path: "/login",
        name: "Login",
        component: Login,
    },
    {
        path: "/about",
        name: "About",
        component: About,
    }
]

const router = createRouter({
    history: createWebHistory(BASE_URL),
    routes
})

export default router