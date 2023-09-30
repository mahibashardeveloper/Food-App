<template>

    <div class="authentication">

        <div class="row vh-100 justify-content-center align-items-center">

            <div class="col-12 col-sm-10 col-lg-6 col-xl-4 p-3 d-none d-lg-block">
                <img :src="'/images/background1.svg'" class="img-fluid" alt="background image">
            </div>

            <div class="col-12 col-sm-10 col-lg-6 col-xl-4 p-3" v-if="forgotType === 1">
                <div class="p-5 bg-white border-radius-15">
                    <div class="h3 mb-4"> Admin forget password </div>
                    <form @submit.prevent="forgot">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control shadow-none border-secondary-subtle" v-model="forgotParam.email">
                            <div class="error-text" v-if="error != null && error.email !== undefined" v-text="error.email[0]"></div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-theme" v-if="forgotLoading === false">Forget Password</button>
                            <button type="button" class="btn btn-theme" v-if="forgotLoading === true">Loading...</button>
                        </div>
                        <div class="text-start">
                            Remember Password
                            <router-link :to="{name:'login'}" class="text-decoration-none text-info">
                                Login
                            </router-link>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-sm-10 col-lg-6 col-xl-4 p-3" v-if="forgotType === 2">
                <div class="p-5 bg-white border-radius-15">
                    <div class="h3 mb-4"> Reset your admin account </div>
                    <form @submit.prevent="reset">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="email" class="form-control shadow-none border-secondary-subtle bg-transparent" disabled v-model="resetParam.email">
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <input id="code" type="text" name="code" class="form-control shadow-none border-secondary-subtle" v-model="resetParam.code">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password" class="form-control shadow-none border-secondary-subtle" v-model="resetParam.password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control shadow-none border-secondary-subtle" v-model="resetParam.password_confirmation">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-theme" v-if="resetLoading === false">Reset</button>
                            <button type="button" class="btn btn-theme" v-if="resetLoading === true">Loading...</button>
                        </div>
                        <div class="text-start">
                            Remember Password
                            <router-link :to="{name:'login'}" class="text-decoration-none text-info">
                                Login
                            </router-link>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-sm-10 col-lg-8 col-xl-6 col-xxl-5 py-5 text-center bg-white" v-if="forgotType === 3">
                <div class="pb-3">Your admin account has been reset</div>
                <router-link :to="{name: 'login'}" class="mt-3 text-decoration-none text-secondary">
                    Go to login page
                </router-link>
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

                resetParam: { email: '', code: '', password: '', password_confirmation: '' },

                forgotType: 1,

                error: null,

                forgotLoading: false,

                forgotParam: { email: '' }

            }

        },

        mounted() {  },

        methods: {

            forgot() {
                this.forgotLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.forgot, this.forgotParam, (res) => {
                    this.forgotLoading = false
                    if (res.status === 200) {
                        this.forgotType = 2;
                        this.resetParam.email = this.forgotParam.email;
                        this.$toast.success('The verification code has been sent to your email.', {
                            position: "top-right"
                        });
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
                        this.$toast.success('Password has been reset successfully.', {
                            position: "top-right"
                        });
                        this.forgotType = 3;
                    } else {
                        this.error = res.error;
                    }
                })
            },

        }

    }

</script>
