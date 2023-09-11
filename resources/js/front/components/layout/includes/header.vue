<template>

    <div id="preloader">
        <img :src="'/images/loading.gif'" class="img-fluid" alt="">
    </div>
    <div class="front-header fixed-top" :class="{ 'header-scrolled': isHeaderScrolled }">
        <router-link :to="{name:'home'}" class="company_name" @click="remove">
            Food Store
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
            <a href="javascript:void(0)" class="menu-link" @click="cartInfo">
                <i class="bi bi-cart me-2"></i> Cart <span class="badge bg-dark p-2 ms-2"> {{ products.length }} </span>
            </a>
            <span v-if="profile_data !== null">
                <router-link :to="{name:'my_account'}" class="menu-link" active-class="active" @click="remove">
                    <i class="bi bi-person-fill me-2"></i> {{profile_data.full_name}}
                </router-link>
                <a href="javascript:void(0)" class="menu-link" @click="logout">
                    <i class="bi bi-box-arrow-in-right me-2"></i>
                    <span v-if="logoutLoading === false"> Logout </span>
                    <span v-if="logoutLoading === true"> Loading </span>
                </a>
            </span>
            <span v-if="profile_data === null">
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
                <div class="empty" v-if="products.length === 0">
                    No Cart Item Added
                </div>
                <div class="item" v-for="(cartItem, index) in products" :key="index">
                    <span class="d-flex">
                        <img :src="'/storage/media/image/' + cartItem.avatar" class="img-fluid" alt="">
                        <span class="product-info">
                            <div class="price mb-2">Price: Per Kg ${{cartItem.price}}</div>
                            <div class="quantity">
                                <button @click="decrementQuantity(cartItem)"> <i class="bi bi-dash-lg"></i> </button>
                                <div class="qty"> {{ cartItem.quantity }} </div>
                                <button @click="incrementQuantity(cartItem)"> <i class="bi bi-plus-lg"></i> </button>
                                <button class="ms-2" @click="removeFromCart(cartItem)"> <i class="bi bi-x-lg"></i> </button>
                            </div>
                        </span>
                    </span>
                    <span> ${{ cartItem.price * cartItem.quantity }} </span>
                </div>
                <div id="error-message"></div>
            </div>
            <div class="cart-footer">
                <div class="cart-details">
                    <div class="cart-flex">
                        <span class="cart-desc">
                            <div class="mb-1">
                                Gross SubTotal
                            </div>
                            <div class="badge d-block ps-0 mt-2 text-dark">
                                Delivery Charge $100
                            </div>
                        </span>
                        <span class="cart-amount">
                            ${{subTotal}}
                        </span>
                    </div>
                </div>
                <a href="javascript:void(0)" class="btn-checkout">
                    Checkout
                </a>
            </div>
            </div>
        </div>

</template>

<script>

import apiService from "../../../services/apiServices";
import apiRoutes from "../../../services/apiRoutes.js";
import store from "../../../store/index";
export default {

    computed: {
        products: function() {
            return store.state.products
        },
        subTotal: function () {
            const total = this.products.reduce( (prev, current) => (current.price * current.quantity) + prev, 0)
            return total + 100;
        }
    },

    data(){
        return{
            isRightSidebar: false,
            isHeaderScrolled: false,
            isCartInfoActive: false,
            logoutLoading: false,
            profile_data: null,
            profileDataLoading: false,
            orderParam: {
                name: '',
                price: '',
                quantity: '',
            },
        }
    },

    mounted() {
        this.getCartItems();
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

        getCartItems(){
            store.dispatch('getCartItems')
        },

        decrementQuantity(cartItem) {
            if (cartItem.quantity > 1) {
                cartItem.quantity--;
            }
            this.subTotal -= cartItem.price
            store.dispatch('decrementCartItem', cartItem)
        },

        incrementQuantity(cartItem) {
            cartItem.quantity++;
            this.subTotal += cartItem.price
            store.dispatch('addToCart', cartItem)
        },

        removeFromCart(cartItem) {
            store.dispatch('removeFromCart', cartItem)
        },

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

        getProfile() {
            this.profileDataLoading = true;
            apiService.GET(apiRoutes.profile_details, (res) => {
                this.profileDataLoading = false;
                if (res.status === 200) {
                    this.profile_data = res.data;
                }
            })
        },

        logout() {
            this.logoutLoading = true;
            apiService.GET(apiRoutes.logout, (res) => {
                this.logoutLoading = false;
                if (res.status === 200) {
                    window.location.reload();
                }
            })
        },

    }

}

</script>
