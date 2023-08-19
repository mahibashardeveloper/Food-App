import {createRouter, createWebHistory} from "vue-router";

// auth

import login from "../components/auth/login.vue";

import registration from "../components/auth/registration.vue";

import forget from "../components/auth/forget.vue";

// layout ----- ----- ----- ----- ----- ----- ----- ----- -----

import layout from "../components/layout/layout.vue";

// dashboard

import dashboard from "../components/dashboard/dashboard.vue";

// calender

import calender from "../components/calender/calender.vue";

// chat

import chat from "../components/chat/chat.vue";

// email

import email from "../components/email/email.vue";

// subAdmin

import subAdmin from "../components/subAdmin/subAdmin.vue";

// vendors

import vendors from "../components/vendors/vendors.vue";

// deliveryMan

import deliveryMan from "../components/deliveryMan/deliveryMan.vue";

// partners

import partners from "../components/partners/partners.vue";

// merchants

import merchants from "../components/merchants/merchants.vue";

// category

import category from "../components/category/category.vue";

// product

import product from "../components/product/product.vue"

// orders

import orders from "../components/orders/orders.vue";

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

            // calender

            {path: ROOT_URL + '/calender', name: 'calender', component: calender, meta: {title: 'calender'}},

            // chat

            {path: ROOT_URL + '/chat', name: 'chat', component: chat, meta: {title: 'chat'}},

            // email

            {path: ROOT_URL + '/email', name: 'email', component: email, meta: {title: 'email'}},

            // subAdmin

            {path: ROOT_URL + '/subAdmin', name: 'subAdmin', component: subAdmin, meta: {title: 'subAdmin'}},

            // vendors

            {path: ROOT_URL + '/vendors', name: 'vendors', component: vendors, meta: {title: 'vendors'}},

            // deliveryMan

            {path: ROOT_URL + '/deliveryMan', name: 'deliveryMan', component: deliveryMan, meta: {title: 'deliveryMan'}},

            // partners

            {path: ROOT_URL + '/partners', name: 'partners', component: partners, meta: {title: 'partners'}},

            // merchants

            {path: ROOT_URL + '/merchants', name: 'merchants', component: merchants, meta: {title: 'merchants'}},

            // category

            {path: ROOT_URL + '/category', name: 'category', component: category, meta: {title: 'category'}},

            // product

            {path: ROOT_URL + '/product', name: 'product', component: product, meta: {title: 'product'}},

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
