<template>

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

            <router-link :to="{name:'shop'}" class="menu-link" active-class="active" @click="remove">

                <i class="bi bi-shop me-2"></i> Shop

            </router-link>

            <router-link :to="{name:'contact'}" class="menu-link" active-class="active" @click="remove">

                <i class="bi bi-telephone me-2"></i> Contact

            </router-link>

            <a href="javascript:void(0)" class="menu-link" @click="cartInfo">

                <i class="bi bi-cart me-2"></i> Cart

            </a>

            <router-link :to="{name:'login'}" class="menu-link" active-class="active" @click="remove">

                <i class="bi bi-box-arrow-right me-2"></i> Sign In

            </router-link>

        </div>

        <div class="cart-right-box" :class="{active: isCartInfoActive}">

            <div class="cart-header">

                <div class="h5 fw-bold">Cart List</div>

                <a href="javascript:void(0)" class="x-btn" @click="remove">

                    <i class="bi bi-x-lg"></i>

                </a>

            </div>

            <div class="cart-body">

                <div class="empty" v-if="cart.length === 0">
                    Empty Cart
                </div>

                <div class="cart-item" v-for="(item, index) in cart" :key="index">

                    {{ item.name }} - {{ item.price | currency }}

                </div>

            </div>

            <div class="cart-footer">

                <a href="javascript:void(0)" class="btn btn-checkout">

                    Checkout

                </a>

            </div>

        </div>

    </div>

</template>

<script>

export default {

    data(){

        return{

            cart: [],

            isRightSidebar: false,

            isHeaderScrolled: false,

            isCartInfoActive: false,

        }

    },

    mounted() {

        window.addEventListener("scroll", this.onScroll);

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

    }

}

</script>
