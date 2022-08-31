import Vue from 'vue';
import VueRouter from 'vue-router';

import ExchangeComponent from "../components/ExchangeComponent";

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'exchange',
        component: ExchangeComponent
    },
];

const router = new VueRouter({
   mode: 'history',
   routes
});

export default router;
