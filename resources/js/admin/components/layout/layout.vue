<template>

    <div class="bg-color" :class="{active: isColorGearActive}">
        <a href="javascript:void(0)" class="animation" @click="colorGearController">
            <i class="bi bi-gear-fill"></i>
        </a>
        <div class="bg-color-group">
            <div class="fw-bold ps-4 pt-3">Background Color:</div>
            <div class="bg-color-box">
                <span data-color="#DC354533" style="background-color: #DC354533;" class="btn-color" @click="remove"></span>
                <span data-color="#0D6EFD33" style="background-color: #0D6EFD33;" class="btn-color" @click="remove"></span>
                <span data-color="#6C757D33" style="background-color: #6C757D33;" class="btn-color" @click="remove"></span>
                <span data-color="#19875433" style="background-color: #19875433;" class="btn-color" @click="remove"></span>
                <span data-color="#0DCAF033" style="background-color: #0DCAF033;" class="btn-color" @click="remove"></span>
            </div>
        </div>
    </div>

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
                <div class="badge-text">Components</div>
                <router-link :to="{name:'slider'}" class="sidebar-link" active-class="active" @click="remove">
                    sliders
                </router-link>
                <router-link :to="{name:'category'}" class="sidebar-link" active-class="active" @click="remove">
                    Categories
                </router-link>
                <router-link :to="{name:'deliveryCharge'}" class="sidebar-link" active-class="active" @click="remove">
                    Delivery Charges
                </router-link>
                <router-link :to="{name:'product'}" class="sidebar-link" active-class="active" @click="remove">
                    Products
                </router-link>
                <router-link :to="{name:'customers'}" class="sidebar-link" active-class="active" @click="remove">
                    Customers
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
                        <div class="avatar">
                            <img class="img-fluid" v-if="!profile_data.avatar" :src="'https://ui-avatars.com/api/?name='+profile_data.first_name" alt="profile-dummy">
                            <img class="img-fluid" v-else :src="profile_data.media && profile_data.media.full_file_path" alt="profile">
                        </div>
                        <div class="admin-info">
                            <div class="name">{{profile_data.first_name}} {{profile_data.last_name}}</div>
                            <div class="designation">{{profile_data.company_name}}</div>
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

                isColorGearActive: false,

            }

        },

        mounted() {

            function setThemeColor(color) {
                document.querySelector(':root').style.setProperty('--main-color', color);
            }

            function handleButtonClick(event) {
                let dataColor = event.target.getAttribute('data-color');
                setThemeColor(dataColor);
                localStorage.setItem('selectedColor', dataColor);
            }
            let themeButtons = document.querySelectorAll('.btn-color');
            themeButtons.forEach(color => {
                color.addEventListener('click', handleButtonClick);
            });
            const storedColor = localStorage.getItem('selectedColor');
            if (storedColor) {
                setThemeColor(storedColor);
            }

            this.getProfile();

        },

        methods: {

            colorGearController(){
                this.isColorGearActive = !this.isColorGearActive;
                this.isDropdownActive = false;
                this.isSidebarActive = false;
            },

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
                this.isColorGearActive = false;
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
