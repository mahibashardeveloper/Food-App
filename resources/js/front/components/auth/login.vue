<template>
    <div class="authentication animation-content">
        <div class="container">
            <div class="vh-100 row justify-content-center align-items-center p-3">
                <form @submit.prevent="login" class="border col-12 col-sm-8 col-md-6 col-lg-7 p-3 rounded-4 bg-white shadow">
                    <div class="form-group fw-bold h4">
                        Welcome to your account
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" v-model="loginParam.email">
                        <div class="error-text" v-if="error != null && error.email !== undefined" v-text="error.email[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" v-model="loginParam.password">
                        <div class="error-text" v-if="error != null && error.password !== undefined" v-text="error.password[0]"></div>
                    </div>
                    <div class="form-group">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-theme">
                                    <span v-if="loginLoading === false"> Login </span>
                                    <span v-if="loginLoading === true"> Loading... </span>
                                </button>
                            </div>
                            <div class="col-sm-6 text-sm-end py-3">
                                <router-link :to="{name:'forget'}" class="text-decoration-none text-danger">Forget password?</router-link>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        Don't have an account
                        <router-link :to="{name:'registration'}" class="text-decoration-none text-info">
                            Registration
                        </router-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

import apiRoutes from "../../services/apiRoutes";

import apiService from "../../services/apiServices";

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

            console.log(123123)

            apiService.POST(apiRoutes.login, this.loginParam, (res) => {

                this.loginLoading = false;

                console.log(res, 123456)

                if (res.status === 200) {

                    window.location.reload();

                } else {

                    this.error = res.errors;

                }

            })

        },

    }

}

</script>
