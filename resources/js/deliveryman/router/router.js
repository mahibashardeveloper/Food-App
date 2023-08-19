import {createRouter, createWebHistory} from "vue-router";

// auth

import login from "../components/auth/login.vue";

import forget from "../components/auth/forget.vue";

// layout ----- ----- ----- ----- ----- ----- ----- ----- -----

import layout from "../components/layout/layout.vue";

// dashboard

import dashboard from "../components/dashboard/dashboard.vue";

// directory ----- ----- ----- ----- ----- ----- ----- ----- -----

const ROOT_URL = "/deliveryman";

// route ----- ----- ----- ----- ----- ----- ----- ----- -----

const routes = [

    // authentication

    {path: ROOT_URL + '/auth/login', name: 'login', component: login, meta: {title: 'login'}},

    {path: ROOT_URL + '/auth/forget', name: 'forget', component: forget, meta: {title: 'forget'}},

    // layout

    {path: ROOT_URL, name: 'layout', component: layout,

        children: [

            // dashboard

            {path: ROOT_URL + '/dashboard', name: 'dashboard', component: dashboard, meta: {title: 'dashboard'}},

        ],

    },

];

const router = createRouter({

    history: createWebHistory(),

    routes

})

export default router;
