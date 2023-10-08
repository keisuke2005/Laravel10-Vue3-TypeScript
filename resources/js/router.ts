import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
const BASE_URL = '/'

import Login from "./components/Login.vue";
import About from "./components/About.vue";
import Top from "./components/Top.vue";
import AccountCreate from "./components/Account/Create.vue";
import AccountConfirm from "./components/Account/Confirm.vue";
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
        path: "/account/create",
        name: "AccountCreate",
        meta: { showHeader: false },
        component: AccountCreate,
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
    },
    {
        path: "/account/confirm",
        name: "AccountConfirm",
        meta: { showHeader: false },
        component: AccountConfirm,
    }
]

const router = createRouter({
    history: createWebHistory(BASE_URL),
    routes
})

export default router