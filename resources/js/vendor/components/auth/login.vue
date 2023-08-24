<template>

    <div class="authentication">

        <div class="row vh-100 justify-content-center align-items-center">

            <div class="col-12 col-sm-10 col-lg-8 col-xl-6 col-xxl-5 p-3">

                <div class="p-5 bg-white border-radius-15">

                    <div class="h3 mb-4"> Welcome to your account </div>

                    <form @submit.prevent="login">

                        <div class="mb-3">

                            <label for="email" class="form-label">Email</label>

                            <input type="email" name="email" class="form-control shadow-none border-secondary-subtle" v-model="loginParam.email" autocomplete="off">

                            <div class="error-text" v-if="error != null && error.email !== undefined" v-text="error.email[0]"></div>

                            <div class="error-text" v-if="error != null && error.error !== undefined" v-text="error.error"></div>

                        </div>

                        <div class="mb-3">

                            <label for="password" class="form-label">Password</label>

                            <input type="password" name="password" class="form-control shadow-none border-secondary-subtle" v-model="loginParam.password" autocomplete="off">

                            <div class="error-text" v-if="error != null && error.password !== undefined" v-text="error.password[0]"></div>

                        </div>

                        <div class="row align-items-center">

                            <div class="col-12 col-md-6">

                                <div class="mb-3">

                                    <button type="submit" class="btn btn-theme" v-if="loginLoading === false">Login</button>

                                    <button type="button" class="btn btn-theme" v-if="loginLoading === true">loading...</button>

                                </div>

                            </div>

                            <div class="col-12 col-md-6 text-md-end">

                                <div class="mb-3">

                                    <router-link :to="{name:'forget'}" class="text-decoration-none text-danger">

                                        Forget Password!

                                    </router-link>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

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

            loginLoading: false,

            error: null,

            loginParam: {

                email: '',

                password: '',

            },

        }

    },

    mounted() {



    },

    methods: {

        login() {

            this.loginLoading = true;

            this.error = null;

            apiService.POST(apiRoutes.login, this.loginParam, (res) => {

                this.loginLoading = false;

                if (res.status === 200) {

                    this.$toast.success('Login Successful', {

                        position:

                            "top-right"

                    });

                    window.location.reload();

                } else {

                    this.error = res.errors;

                }

            })

        },

    }

}

</script>
