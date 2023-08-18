import {createRouter, createWebHistory} from "vue-router";

// layout ----- ----- ----- ----- ----- ----- ----- ----- -----

import layout from "../components/layout/layout.vue";

// home ----- ----- ----- ----- ----- ----- ----- ----- -----

import home from "../components/home/home.vue";

// shop ----- ----- ----- ----- ----- ----- ----- ----- ----- -----

import shop from "../components/shop/shop.vue";

// product_details ----- ----- ----- ----- ----- ----- ----- ----- ----- -----

import product_details from "../components/product_details/product_details.vue";

// cart ----- ----- ----- ----- ----- ----- ----- ----- ----- -----

import cart from "../components/cart/cart.vue";

// contact ----- ----- ----- ----- ----- ----- ----- ----- ----- -----

import contact from "../components/contact/contact.vue";

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

            // shop

            {path: ROOT_URL + '/shop', name: 'shop', component: shop, meta: {title: 'shop'}},

            // cart

            {path: ROOT_URL + '/cart', name: 'cart', component: cart, meta: {title: 'cart'}},

            // product_details

            {path: ROOT_URL + '/product_details', name: 'product_details', component: product_details, meta: {title: 'product_details'}},

            // contact

            {path: ROOT_URL + '/contact', name: 'contact', component: contact, meta: {title: 'contact'}},

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
