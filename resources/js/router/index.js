import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "courses_page_url",
        component: () => import("../pages/course.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
