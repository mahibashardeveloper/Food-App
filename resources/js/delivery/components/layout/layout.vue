<template>

    <div class="wrapper">
        <div class="sidebar" :class="{active: isSidebarActive}">
            <div class="sidebar-header">
                <router-link :to="{name:'dashboard'}" class="logo">
                    Admin Portal
                </router-link>
                <a href="javascript:void(0)" class="close-icon" @click="remove">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
            <div class="sidebar-body">
                <router-link :to="{name:'dashboard'}" class="sidebar-link" active-class="active" @click="remove">
                    Dashboard
                </router-link>
                <router-link :to="{name:'orders'}" class="sidebar-link" active-class="active" @click="remove">
                    Orders
                </router-link>
            </div>
        </div>
        <div class="section">
            <div class="header">
                <div class="controller" @click="sidebarController">
                    <i class="bi bi-justify-left"></i>
                </div>
                <div class="profile">
                    <div class="marge" @click="profileDropdownController">
                        <div class="admin-info">
                            <div class="name">{{profile_data.email}}</div>
                        </div>
                    </div>
                    <div class="profile-dropdown-menu" :class="{active: isDropdownActive}">
                        <router-link :to="{name:'profile'}" class="profile-link" active-class="active" @click="remove">
                            <i class="bi bi-person me-2"></i> Profile
                        </router-link>
                        <a href="javascript:void(0)" class="profile-link" @click="logout">
                            <span v-if="logoutLoading === false">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Logout
                            </span>
                            <span v-if="logoutLoading === true">
                                <i class="bi bi-box-arrow-in-right me-2"></i> loading ...
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content">
                <router-view/>
            </div>
        </div>
    </div>

</template>

<script>

    import apiService from "../../services/apiServices";

    import apiRoutes from "../../services/apiRoutes.js";

    export default {

        data(){

            return{

                isDropdownActive: false,

                isSidebarActive: false,

                logoutLoading: false,

                profile_data: '',

                profileDataLoading: false,

            }

        },

        mounted() {

            this.getProfile();

        },

        methods: {

            sidebarController(){
                this.isSidebarActive = !this.isSidebarActive;
                this.isDropdownActive = false;
                this.isColorGearActive = false;
            },

            profileDropdownController(){
                this.isDropdownActive = !this.isDropdownActive;
                this.isSidebarActive = false;
                this.isColorGearActive = false;
            },

            remove(){
                this.isDropdownActive = false;
                this.isSidebarActive = false;
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
