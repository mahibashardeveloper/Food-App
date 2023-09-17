<template>

    <div class="profile animation-content">

        <div class="container-fluid">
            <div class="customer-wrapper">
                <div class="customer-sidebar" :class="{active: isCustomerSideBarActive}">
                    <div class="customer-sidebar-header">
                        <router-link :to="{name: 'my_account'}" class="link">
                            Customer Portal
                        </router-link>
                        <a href="javascript:void(0)" class="close-btn" @click="removeController">
                            <i class="bi bi-x"></i>
                        </a>
                    </div>
                    <div class="customer-sidebar-body">
                        <router-link :to="{name: 'my_account'}" class="sub-link" @click="removeController">
                            My Account
                        </router-link>
                        <router-link :to="{name: 'order_history'}" class="sub-link" @click="removeController">
                            Order History
                        </router-link>
                        <router-link :to="{name: 'wishlist'}" class="sub-link" @click="removeController">
                            WishList
                        </router-link>
                        <router-link :to="{name: 'newsletter'}" class="sub-link" @click="removeController">
                            NewsLetter
                        </router-link>
                    </div>
                    <div class="customer-sidebar-footer">
                        <a href="javascript:void(0)" class="logout-btn" @click="logout">
                            Logout
                        </a>
                    </div>
                </div>
                <div class="customer-content">
                    <div class="customer-header">
                        <a href="javascript:void(0)" class="btn-controller" @click="customerSideBarController">
                            <i class="bi bi-justify-left"></i>
                        </a>
                    </div>
                    <div class="content-inner-content">
                        <router-view/>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>

    import apiService from "../../services/apiServices.js";

    import apiRoutes from "../../services/apiRoutes.js";

    export default {

        data(){

            return{

                isCustomerSideBarActive: false,

                profile_data: '',

                profileDataLoading: false,

            }

        },

        mounted() {  },

        methods: {

            customerSideBarController(){
                this.isCustomerSideBarActive = !this.isCustomerSideBarActive;
            },

            removeController(){
                this.isCustomerSideBarActive = false;
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
