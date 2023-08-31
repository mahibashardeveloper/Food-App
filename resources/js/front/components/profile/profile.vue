<template>
    <div class="profile">
        <div class="container-fluid">
            <div class="row px-4">
                <div class="col-md-12">
                    <div class="row">
                        <div class="p-1 fw-bold">
                            Customer Details
                        </div>
                        <div class="p-1">
                            <div class="fw-bold">
                                Full Name
                            </div>
                            <div class="text-secondary">
                                {{profile_data.full_name}}
                            </div>
                        </div>
                        <div class="p-1">
                            <div class="fw-bold">
                                Email
                            </div>
                            <div class="text-secondary">
                                {{profile_data.email}}
                            </div>
                        </div>
                        <div class="p-1">
                            <div class="fw-bold">
                                Phone Number
                            </div>
                            <div class="text-secondary">
                                {{profile_data.phone_number}}
                            </div>
                        </div>
                        <div class="p-1">
                            <div class="fw-bold">
                                Address
                            </div>
                            <div class="text-secondary">
                                {{profile_data.address}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="h4 fw-bold">
                        Orders
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="h4 fw-bold">
                        Payment Details
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="h4 fw-bold">
                        Product List
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

            profile_data: '',

            profileDataLoading: false,

        }

    },

    mounted() {

        this.getProfile();

    },

    methods: {

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
