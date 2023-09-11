<template>
    <div class="authentication">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12 col-sm-10 col-lg-8 col-xl-6 p-3">
                <div class="p-5 bg-white border-radius-15">
                    <div class="h3 mb-4"> Create New Account </div>
                    <form @submit.prevent="register">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control shadow-none border-secondary-subtle" v-model="registerParam.first_name">
                                    <div class="error-text" v-if="error != null && error.first_name !== undefined" v-text="error.first_name[0]"></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control shadow-none border-secondary-subtle" v-model="registerParam.last_name">
                                    <div class="error-text" v-if="error != null && error.last_name !== undefined" v-text="error.last_name[0]"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control shadow-none border-secondary-subtle" v-model="registerParam.email">
                            <div class="error-text" v-if="error != null && error.email !== undefined" v-text="error.email[0]"></div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control shadow-none border-secondary-subtle" v-model="registerParam.password">
                                    <div class="error-text" v-if="error != null && error.password !== undefined" v-text="error.password[0]"></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control shadow-none border-secondary-subtle" v-model="registerParam.password_confirmation">
                                    <div class="error-text" v-if="error != null && error.password_confirmation !== undefined" v-text="error.password_confirmation[0]"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" name="company_name" class="form-control shadow-none border-secondary-subtle" v-model="registerParam.company_name">
                            <div class="error-text" v-if="error != null && error.company_name !== undefined" v-text="error.company_name[0]"></div>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control shadow-none border-secondary-subtle" v-model="registerParam.phone_number">
                            <div class="error-text" v-if="error != null && error.phone_number !== undefined" v-text="error.phone_number[0]"></div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-theme" v-if="registerLoading === false">Registration</button>
                            <button type="button" class="btn btn-theme" v-if="registerLoading === true">loading.....</button>
                        </div>
                        <div class="text-start">
                            Have an account
                            <router-link :to="{name:'login'}" class="text-decoration-none text-info">
                                Login
                            </router-link>
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

                registerLoading: false,

                error: null,

                registerParam: {
                    first_name: '',
                    last_name: '',
                    company_name: '',
                    email: '',
                    phone_number: '',
                    password: '',
                    password_confirmation: '',
                }

            }

        },

        mounted() {



        },

        methods: {

            register() {

                this.registerLoading = true;

                this.error = null;

                apiService.POST(apiRoutes.register, this.registerParam, (res) => {

                    this.registerLoading = false;

                    this.registerParam = {

                        company_name: '',

                        full_name: '',

                        email: '',

                        phone_number: '',

                        password: '',

                        password_confirmation: '',

                    }

                    if (res.status === 200) {

                        this.$toast.success(res.msg, {

                            position: "top-right"

                        });

                        window.location.reload();

                    } else {

                        this.error = res.errors

                    }

                })


            },

        }

    }

</script>
