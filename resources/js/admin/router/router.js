import {createRouter, createWebHistory} from "vue-router";

// auth

import login from "../components/auth/login.vue";

import registration from "../components/auth/registration.vue";

import forget from "../components/auth/forget.vue";

// layout ----- ----- ----- ----- ----- ----- ----- ----- -----

import layout from "../components/layout/layout.vue";

// dashboard

import dashboard from "../components/dashboard/dashboard.vue";

// category

import category from "../components/category/category.vue";

// product

import product from "../components/product/product.vue"

// orders

import orders from "../components/orders/orders.vue";

// customers

import customers from "../components/customers/customers.vue";

// profile

import profile from "../components/profile/profile.vue";

// directory ----- ----- ----- ----- ----- ----- ----- ----- -----

const ROOT_URL = "/admin";

// route ----- ----- ----- ----- ----- ----- ----- ----- -----

const routes = [

    // authentication

    {path: ROOT_URL + '/auth/login', name: 'login', component: login, meta: {title: 'login'}},

    {path: ROOT_URL + '/auth/registration', name: 'registration', component: registration, meta: {title: 'registration'}},

    {path: ROOT_URL + '/auth/forget', name: 'forget', component: forget, meta: {title: 'forget'}},

    // layout

    {path: ROOT_URL, name: 'layout', component: layout,

        children: [

            // dashboard

            {path: ROOT_URL + '/dashboard', name: 'dashboard', component: dashboard, meta: {title: 'dashboard'}},

            // category

            {path: ROOT_URL + '/category', name: 'category', component: category, meta: {title: 'category'}},

            // product

            {path: ROOT_URL + '/product', name: 'product', component: product, meta: {title: 'product'}},

            // orders

            {path: ROOT_URL + '/customers', name: 'customers', component: customers, meta: {title: 'customers'}},

            // orders

            {path: ROOT_URL + '/orders', name: 'orders', component: orders, meta: {title: 'orders'}},

            // profile

            {path: ROOT_URL + '/profile', name: 'profile', component: profile, meta: {title: 'profile'}},

        ],

    },

];

const router = createRouter({

    history: createWebHistory(),

    routes

})

export default router;
