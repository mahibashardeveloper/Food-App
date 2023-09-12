<template>

    <div class="px-2">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2">
            <div class="p-2">
                <div class="border p-3">
                    <div class="fw-bold mb-4"> Full Name </div>
                    <div class="fw-bold text-secondary text-opacity-75">{{profile_data.full_name}}</div>
                </div>
            </div>
            <div class="p-2">
                <div class="border p-3">
                    <div class="fw-bold mb-4"> Email </div>
                    <div class="fw-bold text-secondary text-opacity-75">{{profile_data.email}}</div>
                </div>
            </div>
            <div class="p-2">
                <div class="border p-3">
                    <div class="fw-bold mb-4"> Phone Number </div>
                    <div class="fw-bold text-secondary text-opacity-75">{{profile_data.phone_number}}</div>
                </div>
            </div>
            <div class="p-2">
                <div class="border p-3">
                    <div class="fw-bold mb-4"> Address </div>
                    <div class="fw-bold text-secondary text-opacity-75">{{profile_data.address}}</div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
            <div class="p-2">
                <div class="border py-3 px-4 bg-secondary-subtle">
                    <div class="row align-items-center">
                        <div class="col-6 fw-bold">Orders</div>
                        <div class="col-6 text-end">
                            <div class="bg-dark text-white fw-bold d-inline-block px-3 py-1">
                                10,000
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="border py-3 px-4 bg-success-subtle">
                    <div class="row align-items-center">
                        <div class="col-6 fw-bold">Delivered</div>
                        <div class="col-6 text-end">
                            <div class="bg-dark text-white fw-bold d-inline-block px-3 py-1">
                                4,000
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <div class="border py-3 px-4 bg-danger-subtle">
                    <div class="row align-items-center">
                        <div class="col-6 fw-bold">Delivered</div>
                        <div class="col-6 text-end">
                            <div class="bg-dark text-white fw-bold d-inline-block px-3 py-1">
                                4,000
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

import apiService from "../../../services/apiServices.js";
import apiRoutes from "../../../services/apiRoutes.js";

export default {

    data(){

        return{

            profile_data: '',

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
