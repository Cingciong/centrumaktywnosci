import {createRouter, createWebHistory} from "vue-router";

import home from "../components/pages/user/Home.vue";
import Reservation from "../components/pages/user/Reservation.vue";
import News from "../components/pages/user/News.vue";

import MainLayout from "../components/pages/user/layouts/Main.vue";
import DefaultLayout from "@/components/pages/user/layouts/Default.vue";



const routes = [
    {
        path: '/',
        component: MainLayout,
        children: [
            { path: '/', component: home },
        ]
    },
    {
        path: '/rezerwacje',
        component: DefaultLayout,
        children: [
            { path: '/rezerwacje', component: Reservation },
        ]
    },
    {
        path: '/aktualnosci',
        component: DefaultLayout,
        children: [
            { path: '/aktualnosci', component: News },
        ]
    },
    {
        path: '/:pathMatch(.*)*',
        redirect: '/'
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
