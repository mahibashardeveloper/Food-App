<template>

    <div class="authentication animation-content padding-top-content">

        <div class="container">

            <div class="vh-100 row justify-content-center align-items-center p-3">

                <div class="col-12 col-sm-10 col-lg-6 col-xl-5 p-3 d-none d-lg-block">
                    <img :src="'/images/background1.svg'" class="img-fluid" alt="background image">
                </div>

                <div class="col-12 col-sm-10 col-lg-6 col-xl-5 p-3">
                    <form @submit.prevent="forgot" method="post" class="border rounded-4 px-4 py-5 bg-white shadow" v-if="forgotType === 1">
                        <div class="form-group fw-bold h4">
                            Forget Password
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="text" name="email" class="form-control shadow-none border-secondary-subtle" v-model="forgotParam.email">
                            <div class="error-text" v-if="error != null && error.email !== undefined" v-text="error.email[0]"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-theme" v-if="forgotLoading === false">
                                Send Code
                            </button>
                            <button type="button" class="btn btn-theme" v-if="forgotLoading === true">
                                Loading...
                            </button>
                        </div>
                        <div class="form-group">
                            Are you remember Password
                            <router-link :to="{name:'login'}" class="text-decoration-none text-info">
                                Login
                            </router-link>
                        </div>
                    </form>
                    <form @submit.prevent="reset" method="post" class="border rounded-4 px-4 py-5 bg-white shadow" v-if="forgotType === 2">
                        <div class="form-group fw-bold h4">
                            Reset your account
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="email" class="form-control" disabled v-model="resetParam.email">
                        </div>
                        <div class="form-group">
                            <label for="code" class="form-label">Code</label>
                            <input id="code" type="text" name="code" class="form-control" v-model="resetParam.code">
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">New Password</label>
                            <input id="password" type="password" name="password" class="form-control" v-model="resetParam.password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" v-model="resetParam.password_confirmation">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-theme" v-if="resetLoading === false">
                                Reset
                            </button>
                            <button type="button" class="btn btn-theme" v-if="resetLoading === true">
                                Loading ...
                            </button>
                        </div>
                        <div class="form-group">
                            Are you remember Password
                            <router-link :to="{name:'login'}" class="text-decoration-none text-info">
                                Login
                            </router-link>
                        </div>
                    </form>
                    <div class="border rounded-4 px-4 py-5 bg-white shadow" v-if="forgotType === 3">
                        <div class="mb-4">
                            Your Account Has Been Reset Successfully
                        </div>
                        <router-link :to="{name: 'login'}" class="text-decoration-none text-primary">
                            Login
                        </router-link>
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

                resetLoading: false,

                resetParam: {
                    email: '',
                    code: '',
                    password: '',
                    password_confirmation: '',
                },

                forgotType: 1,

                error: null,

                forgotLoading: false,

                forgotParam: {
                    email: ''
                }

            }

        },

        mounted() {



        },

        methods: {

            forgot() {
                this.forgotLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.forgot, this.forgotParam, (res) => {
                    this.forgotLoading = false
                    if (res.status === 200) {
                        this.forgotType = 2;
                        this.resetParam.email = this.forgotParam.email;
                        this.$toast.success('The verification code has been sent to your email.', { position: "top-right" });
                    } else {
                        this.error = res.error;
                    }
                })
            },

            reset() {
                this.resetLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.reset, this.resetParam, (res) => {
                    this.resetLoading = false;
                    if (res.status === 200) {
                        this.$toast.success('Password has been reset successfully.', { position: "top-right" });
                        this.forgotType = 3;
                    } else {
                        this.error = res.error;
                    }
                })
            },

        }

    }

</script>
