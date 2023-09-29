import {createRouter, createWebHistory} from "vue-router";

// layout ----- ----- ----- ----- ----- ----- ----- ----- -----

import layout from "../components/layout/layout.vue";

// home ----- ----- ----- ----- ----- ----- ----- ----- -----

import home from "../components/home/home.vue";

// shop ----- ----- ----- ----- ----- ----- ----- ----- -----

import shop from "../components/shop/shop.vue";

// checkout ----- ----- ----- ----- ----- ----- ----- ----- -----

import checkout from "../components/checkout/checkout.vue";

// login ----- ----- ----- ----- ----- ----- ----- ----- ----- -----

import login from "../components/auth/login.vue";

// registration ----- ----- ----- ----- ----- ----- ----- ----- ----- -----

import registration from "../components/auth/registration.vue";

// forget ----- ----- ----- ----- ----- ----- ----- ----- ----- -----

import forget from "../components/auth/forget.vue";

// profile ----- ----- ----- ----- ----- ----- ----- ----- ----- -----

import profile from "../components/profile/profile.vue";

// my account

import my_account from "../components/profile/ChildComponents/my_account.vue";

// order history

import order_history from "../components/profile/ChildComponents/order_history.vue";

// directory ----- ----- ----- ----- ----- ----- ----- ----- -----

const ROOT_URL = "/front";

// sub directory links ----- ----- ----- ----- ----- ----- ----- ----- -----

const routes = [

        // layout

        {path: ROOT_URL, name: 'layout', component: layout,

        children: [

            // home

            {path: ROOT_URL + '/home', name: 'home', component: home, meta: {title: 'home'} },

            // shop

            {path: ROOT_URL + '/shop', name: 'shop', component: shop, meta: {title: 'shop'} },

            // checkout

            {path: ROOT_URL + '/checkout', name: 'checkout', component: checkout, meta: {title: 'checkout'} },

            // login

            {path: ROOT_URL + '/auth/login', name: 'login', component: login, meta: {title: 'login'} },

            // registration

            {path: ROOT_URL + '/auth/registration', name: 'registration', component: registration, meta: {title: 'registration'} },

            // forget

            {path: ROOT_URL + '/auth/forget', name: 'forget', component: forget, meta: {title: 'forget'} },

            // profile

            {path: ROOT_URL + "/profile", component: profile,

                children: [

                    {path: ROOT_URL + "/my_account", name: "my_account", component: my_account, meta: { title: "my_account" }},

                    {path: ROOT_URL + "/order_history", name: "order_history", component: order_history, meta: { title: "order_history" }},

                ]

            },

        ],

    },

];

const router = createRouter({

    history: createWebHistory(),

    routes

})

export default router;
