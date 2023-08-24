import {createRouter, createWebHistory} from "vue-router";

// layout ----- ----- ----- ----- ----- ----- ----- ----- -----

import layout from "../components/layout/layout.vue";

// home ----- ----- ----- ----- ----- ----- ----- ----- -----

import home from "../components/home/home.vue";

// cart ----- ----- ----- ----- ----- ----- ----- ----- ----- -----

import cart from "../components/cart/cart.vue";

// login ----- ----- ----- ----- ----- ----- ----- ----- ----- -----

import login from "../components/auth/login.vue";

// registration ----- ----- ----- ----- ----- ----- ----- ----- ----- -----

import registration from "../components/auth/registration.vue";

// forget ----- ----- ----- ----- ----- ----- ----- ----- ----- -----

import forget from "../components/auth/forget.vue";

// directory ----- ----- ----- ----- ----- ----- ----- ----- -----

const ROOT_URL = "/front";

// sub directory links ----- ----- ----- ----- ----- ----- ----- ----- -----

const routes = [

        // layout

        {path: ROOT_URL, name: 'layout', component: layout,

        children: [

            // home

            {path: ROOT_URL + '/home', name: 'home', component: home, meta: {title: 'home'}},

            // cart

            {path: ROOT_URL + '/cart', name: 'cart', component: cart, meta: {title: 'cart'}},

            // login

            {path: ROOT_URL + '/login', name: 'login', component: login, meta: {title: 'login'}},

            // registration

            {path: ROOT_URL + '/registration', name: 'registration', component: registration, meta: {title: 'registration'}},

            // forget

            {path: ROOT_URL + '/forget', name: 'forget', component: forget, meta: {title: 'forget'}},

        ],

    },

];

const router = createRouter({

    history: createWebHistory(),

    routes

})

export default router;
