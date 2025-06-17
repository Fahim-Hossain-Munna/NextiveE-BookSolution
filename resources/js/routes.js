import { createRouter, createWebHistory } from "vue-router";
import defaultLayout from "./layouts/Default.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            name: "home",
            component: () => import("./pages/Home.vue"),
            meta: {
                layout: defaultLayout,
            },
        },
        {
            path: "/enrollment/:slug/:id",
            name: "enrollment",
            component: () => import("./pages/Enrollment.vue"),
            meta: {
                layout: defaultLayout,
            },
        },
        {
            path: "/login",
            name: "login",
            component: () => import("./pages/Login.vue"),
            meta: {
                layout: defaultLayout,
            },
        },
        {
            path: "/register",
            name: "register",
            component: () => import("./pages/Register.vue"),
            meta: {
                layout: defaultLayout,
            },
        },
    ],
});

export default router;
