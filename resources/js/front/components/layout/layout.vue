<template>

    <div id="preloader">

        <img :src="'/images/loading.gif'" class="img-fluid" alt="">

    </div>

    <div class="front-header fixed-top" :class="{ 'header-scrolled': isHeaderScrolled }">

        <router-link :to="{name:'home'}" class="company_name" @click="remove">

            Redishketch

        </router-link>

        <a href="javascript:void(0)" class="menu-icon-btn" @click="rightSidebarController">

            <i class="bi bi-justify-right"></i>

        </a>

        <div class="menu-group-link" :class="{active: isRightSidebar}">

            <a href="javascript:void(0)" class="menu-close" @click="remove">

                <i class="bi bi-x-lg"></i>

            </a>

            <router-link :to="{name:'home'}" class="menu-link" active-class="active" @click="remove">

                <i class="bi bi-house-door me-2"></i> Home

            </router-link>

            <a href="javascript:void(0)" class="menu-link" @click="cartInfo">

                <i class="bi bi-cart me-2"></i> Cart <span class="badge bg-dark p-2 ms-2"> 000 </span>

            </a>

            <span v-if="profile_data !== null">

                <router-link :to="{name:'profile'}" class="menu-link" active-class="active" @click="remove">

                    <i class="bi bi-person-fill me-2"></i> {{profile_data.full_name}}

                </router-link>

                <a href="javascript:void(0)" class="menu-link" @click="logout">

                    <i class="bi bi-box-arrow-in-right me-2"></i>

                    <span v-if="logoutLoading === false"> Logout </span>

                    <span v-if="logoutLoading === true"> Loading </span>

                </a>

            </span>

            <span v-else>

                <router-link :to="{name:'login'}" class="menu-link" active-class="active" @click="remove">

                    <i class="bi bi-box-arrow-right me-2"></i> Sign In

                </router-link>

            </span>

        </div>

        <div class="cart-right-box" :class="{active: isCartInfoActive}">

            <div class="cart-header">

                <div class="h5 fw-bold">Cart List</div>

                <a href="javascript:void(0)" class="x-btn" @click="remove">

                    <i class="bi bi-x-lg"></i>

                </a>

            </div>

            <div class="cart-body">

                <div class="empty">
                    Empty Cart
                </div>

            </div>

            <div class="cart-footer">

                <router-link :to="{name:'cart'}" class="btn btn-checkout">

                    Checkout

                </router-link>

            </div>

        </div>

    </div>

    <router-view/>

    <div class="w-100 bg-light container-fluid">

        <div class="front-footer">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">

                <div class="p-3">

                    <div class="h4 footer-head"> Company </div>

                    <a href="javascript:void(0)" class="footer-sub-link"> About Us </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Delivery Information </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Privacy & Policy </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Terms & Conditions </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Contact Us </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Support Center </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Careers </a>

                </div>

                <div class="p-3">

                    <div class="h4 footer-head"> Account </div>

                    <a href="javascript:void(0)" class="footer-sub-link"> Sign In </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> View Cart </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> My Wishlist </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Track My Order </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Help Ticket </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Shipping Details </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Compare Product </a>

                </div>

                <div class="p-3">

                    <div class="h4 footer-head"> Corporate </div>

                    <a href="javascript:void(0)" class="footer-sub-link"> Become a vendor </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Affiliate Program </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Farm Business </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Farm Careers </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Our Suppliers </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Accessibility </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Promotions </a>

                </div>

                <div class="p-3">

                    <div class="h4 footer-head"> Popular </div>

                    <a href="javascript:void(0)" class="footer-sub-link"> Milk & Flavoured Milk </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Butter and Margarine </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Eggs Substitutes </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Marmalades </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Sour Cream and Dips </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Tea & Kombusa </a>

                    <a href="javascript:void(0)" class="footer-sub-link"> Cheese </a>

                </div>

            </div>

        </div>

        <div class="py-4 text-center border-top">

            <div class="mb-2">


                <i class="bi bi-c-circle me-2"></i> 2025, Redishketch - Ecommerce Template

            </div>

            <div class="fw-bold"> All rights reserved </div>

        </div>

    </div>

</template>

<script>

import apiService from "../../services/apiServices";

import apiRoutes from "../../services/apiRoutes.js";

export default {

    data() {

        return {

            isRightSidebar: false,

            isHeaderScrolled: false,

            isCartInfoActive: false,

            logoutLoading: false,

            profile_data: '',

            profileDataLoading: false,

        }

    },

    mounted() {

        this.getProfile();

        window.addEventListener("scroll", this.onScroll);

        setTimeout(() =>{

            const preloader = document.getElementById('preloader');

            setTimeout(() => {

                document.getElementById('app').removeChild(preloader)

            },1000)

        },3000);

    },

    methods: {

        rightSidebarController(){

            this.isRightSidebar = !this.isRightSidebar;

            this.isCartInfoActive = false;

        },

        cartInfo(){

            this.isCartInfoActive = !this.isCartInfoActive;

            this.isRightSidebar = false;

        },

        remove(){

            this.isRightSidebar = false;

            this.isCartInfoActive = false

            window.scrollTo({ top: 0, left: 0, behavior: 'smooth' });

        },

        onScroll() {

            const scrollPos = window.scrollY;

            this.isHeaderScrolled = scrollPos > 0;

        },

        logout() {

            this.logoutLoading = true;

            apiService.GET(apiRoutes.logout, (res) => {

                this.logoutLoading = false;

                if (res.status === 200) {

                    this.$toast.success('Logout Successful', { position: "top-right" });

                    window.location.reload()

                }

            })

        },

        getProfile() {

            this.profileDataLoading = true;

            apiService.GET(apiRoutes.profile_details, (res) => {

                this.profileDataLoading = false;

                if (res.status === 200) {

                    this.profile_data = res.data;

                }

            })

        },

    }

}

</script>

<style lang="scss">

    @import "resources/scss/front/style.scss";

</style>
