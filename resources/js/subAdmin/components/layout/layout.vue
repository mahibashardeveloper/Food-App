<template>

    <div class="subAdmin-wrapper">
        <div class="subAdmin-sidebar" :class="{active: isSubAdminSidebarActive}">
            <div class="subAdmin-sidebar-header">
                <a href="javascript:void(0)" class="subAdmin-logo-link">
                    Sub Admin Portal
                </a>
                <a href="javascript:void(0)" class="subAdmin-close-btn" @click="remove">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
            <div class="subAdmin-sidebar-body">
                <router-link :to="{name:'dashboard'}" @click="remove">
                    Dashboard
                </router-link>
                <a href="javascript:void(0)" @click="remove">
                    Categories
                </a>
                <a href="javascript:void(0)" @click="remove">
                    Products
                </a>
                <a href="javascript:void(0)" @click="remove">
                    Orders
                </a>
            </div>
            <div class="subAdmin-sidebar-footer">
                <a href="javascript:void(0)">
                    Logout
                </a>
            </div>
        </div>
        <div class="subAdmin-section">
            <div class="subAdmin-header">
                <a href="javascript:void(0)" class="subAdmin-close-btn" @click="SidebarController">
                    <i class="bi bi-justify-left"></i>
                </a>
                <div class="subAdmin-profile">
                    <div class="marge" @click="ProfileDropdownController">
                    <div class="subAdmin-avatar">
                        <img class="img-fluid" v-if="!profile_data.avatar" :src="'https://ui-avatars.com/api/?name='+profile_data.full_name" alt="profile-dummy">

                        <img class="img-fluid" v-else :src="profile_data.media && profile_data.media.full_file_path" alt="profile">
                    </div>
                        <div class="subAdmin-info">
                            <div class="name">{{profile_data.email}}</div>
                            <div class="designation">{{profile_data.full_name}}</div>
                        </div>
                    </div>
                    <div class="subAdmin-dropdown-menu" :class="{active: isSubAdminDropdownActive}">
                        <router-link :to="{name:'profile'}" @click="remove">
                            <i class="bi bi-person me-2"></i>
                            Profile
                        </router-link>
                        <a href="javascript:void(0)" @click="logout">
                            <i class="bi bi-box-arrow-in-right me-2"></i>
                            <span v-if="logoutLoading === false">
                                Logout
                            </span>
                            <span v-if="logoutLoading === true">
                                loading ...
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="subAdmin-content">
                <router-view/>
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

            isSubAdminSidebarActive: false,

            isSubAdminDropdownActive: false,

            profile_data: '',

            profileDataLoading: false,

            logoutLoading: false,

        }

    },

    mounted() {

        this.getProfile();

    },

    methods: {

        ProfileDropdownController(){

            this.isSubAdminDropdownActive = !this.isSubAdminDropdownActive;

            this.isSubAdminSidebarActive = false;

        },

        SidebarController(){

            this.isSubAdminSidebarActive = !this.isSubAdminSidebarActive;

            this.isSubAdminDropdownActive = false;

        },

        remove(){
            this.isSubAdminDropdownActive = false;
            this.isSubAdminSidebarActive = false;
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
