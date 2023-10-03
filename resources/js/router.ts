import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
const BASE_URL = '/'

import Login from "./components/Login.vue";
import About from "./components/About.vue";
import Top from "./components/Top.vue";
import NewAccount from "./components/NewAccount.vue";
interface RouteMeta {
    showHeader: boolean;
}

type CustomRouteRecord = RouteRecordRaw & {
    meta: RouteMeta;
}

const routes: CustomRouteRecord[] = [
    {
        path: "/login",
        name: "Login",
        meta: { showHeader: false },
        component: Login,
    },
    {
        path: "/new_account",
        name: "NewAccount",
        meta: { showHeader: false },
        component: NewAccount,
    },
    {
        path: "/about",
        name: "About",
        meta: { showHeader: true },
        component: About,
    },
    {
        path: "/top",
        name: "Top",
        meta: { showHeader: true },
        component: Top,
    }
]

const router = createRouter({
    history: createWebHistory(BASE_URL),
    routes
})

export default router