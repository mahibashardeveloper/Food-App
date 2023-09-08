<template>
    <div class="authentication animation-content">
        <div class="container">
            <div class="min-vh-100 row justify-content-center align-items-center p-3">
                <form @submit.prevent="register" class="border col-12 col-sm-8 col-md-6 col-lg-7 p-3 rounded-4 bg-white shadow">
                    <div class="form-group fw-bold h4">
                        Create New account
                    </div>
                    <div class="form-group">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" name="full_name" class="form-control" v-model="registerParam.full_name">
                        <div class="error-text" v-if="error != null && error.full_name !== undefined" v-text="error.full_name[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" v-model="registerParam.email">
                        <div class="error-text" v-if="error != null && error.email !== undefined" v-text="error.email[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" v-model="registerParam.password">
                        <div class="error-text" v-if="error != null && error.password !== undefined" v-text="error.password[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control" v-model="registerParam.password_confirmation">
                        <div class="error-text" v-if="error != null && error.password_confirmation !== undefined" v-text="error.password_confirmation[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" v-model="registerParam.phone_number">
                        <div class="error-text" v-if="error != null && error.phone_number !== undefined" v-text="error.phone_number[0]"></div>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" v-model="registerParam.address">
                        <div class="error-text" v-if="error != null && error.address !== undefined" v-text="error.address[0]"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-theme">
                            <span v-if="registerLoading === false"> Registration </span>
                            <span v-if="registerLoading === true"> Loading... </span>
                        </button>
                    </div>
                    <div class="form-group">
                        Have an account
                        <router-link :to="{name:'login'}" class="text-decoration-none text-info">
                            Login
                        </router-link>
                    </div>
                </form>
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

            registerLoading: false,

            error: null,

            registerParam: {
                full_name: '',
                email: '',
                password: '',
                password_confirmation: '',
                phone_number: '',
                address: '',
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
                    full_name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                    phone_number: '',
                    address: '',
                }

                if (res.status === 200) {

                    this.$toast.success('Registration Successfully', { position: "top-right" });

                } else {

                    this.error = res.errors

                }

            })

        },

    },

}

</script>
