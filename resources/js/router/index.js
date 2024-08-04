import {createRouter, createWebHistory} from "vue-router";

import home from "../components/pages/user/Home.vue";
import About from "../components/pages/user/About.vue";
import Contact from "../components/pages/user/Contact.vue";
import Projects from "../components/pages/user/Projects.vue";
import News from "../components/pages/user/News.vue";
import Donwload from "../components/pages/user/Donwload.vue";
import GetInvolved from "../components/pages/user/GetInvolved.vue";
import DefaultLayout from "../components/pages/user/layouts/Default.vue";



const routes = [
    {
        path: '/',
        component: DefaultLayout,
        children: [
            { path: '/', component: home },
        ]
    },
    {
        path: '/o-nas',
        component: About,
    },
    {
        path: '/kontakt',
        component: Contact,
    },
    {
      path: '/dzialaj-lokalnie',
    },
    {
        path: '/projekty',
        component: Projects,
    },
    {
        path: '/Aktualnosci',
        component: News,
    },
    {
        path: '/do-pobrania',
        component: Donwload,
    },
    {
        path: '/zaangazuj-sie',
        component: GetInvolved,
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
