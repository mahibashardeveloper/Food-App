import {createRouter, createWebHistory} from "vue-router";

// auth

import login from "../components/auth/login.vue";

import forget from "../components/auth/forget.vue";

// layout ----- ----- ----- ----- ----- ----- ----- ----- -----

import layout from "../components/layout/layout.vue";

// dashboard

import dashboard from "../components/dashboard/dashboard.vue";

// slider

import slider from "../components/slider/slider.vue";

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

    {path: ROOT_URL + '/auth/forget', name: 'forget', component: forget, meta: {title: 'forget'}},

    // layout

    {path: ROOT_URL, name: 'layout', component: layout,

        children: [

            // dashboard

            {path: ROOT_URL + '/dashboard', name: 'dashboard', component: dashboard, meta: {title: 'dashboard'}},

            // slider

            {path: ROOT_URL + '/sliders', name: 'slider', component: slider, meta: {title: 'sliders'}},

            // category

            {path: ROOT_URL + '/categories', name: 'category', component: category, meta: {title: 'categories'}},

            // product

            {path: ROOT_URL + '/products', name: 'product', component: product, meta: {title: 'products'}},

            // customer

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
