<template>

    <div class="partner-wrapper">
        <div class="partner-sidebar" :class="{active: isPartnerSidebarActive}">
            <div class="partner-sidebar-header">
                <a href="javascript:void(0)" class="partner-logo-link">
                    Partner Portal
                </a>
                <a href="javascript:void(0)" class="partner-close-btn" @click="remove">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
            <div class="partner-sidebar-body">
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
            <div class="partner-sidebar-footer">
                <a href="javascript:void(0)">
                    Logout
                </a>
            </div>
        </div>
        <div class="partner-section">
            <div class="partner-header">
                <a href="javascript:void(0)" class="partner-close-btn" @click="SidebarController">
                    <i class="bi bi-justify-left"></i>
                </a>
                <div class="partner-profile">
                    <div class="marge" @click="ProfileDropdownController">
                    <div class="partner-avatar">
                        <img class="img-fluid" v-if="!profile_data.avatar" :src="'https://ui-avatars.com/api/?name='+profile_data.full_name" alt="profile-dummy">

                        <img class="img-fluid" v-else :src="profile_data.media && profile_data.media.full_file_path" alt="profile">
                    </div>
                        <div class="partner-info">
                            <div class="name">{{profile_data.email}}</div>
                            <div class="designation">{{profile_data.full_name}}</div>
                        </div>
                    </div>
                    <div class="partner-dropdown-menu" :class="{active: isPartnerDropdownActive}">
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
            <div class="partner-content">
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

            isPartnerSidebarActive: false,

            isPartnerDropdownActive: false,

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

            this.isPartnerDropdownActive = !this.isPartnerDropdownActive;

            this.isPartnerSidebarActive = false;

        },

        SidebarController(){

            this.isPartnerSidebarActive = !this.isPartnerSidebarActive;

            this.isPartnerDropdownActive = false;

        },

        remove(){
            this.isPartnerDropdownActive = false;
            this.isPartnerSidebarActive = false;
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
