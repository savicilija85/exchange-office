import Vue from 'vue';
import VueRouter from 'vue-router';

import ExchangeComponent from "../components/ExchangeComponent";
import UserSettingsComponent from "../components/UserSettingsComponent";
import CurrenciesSettingsComponent from "../components/CurrenciesSettingsComponent";

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'exchange',
        component: ExchangeComponent
    },
    {
        path: '/user-settings',
        name: 'user-settings',
        component: UserSettingsComponent
    },
    {
        path: '/currencies-settings',
        name: 'currencies-settings',
        component: CurrenciesSettingsComponent
    },
];

const router = new VueRouter({
   mode: 'history',
   routes
});

export default router;
