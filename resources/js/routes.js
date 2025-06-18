import { createRouter, createWebHistory } from "vue-router";
import defaultLayout from "./layouts/Default.vue";
import simpleLayout from "./layouts/Simple.vue";

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
                layout: simpleLayout,
            },
        },
        {
            path: "/register",
            name: "register",
            component: () => import("./pages/Register.vue"),
            meta: {
                layout: simpleLayout,
            },
        },
    ],
});

export default router;
