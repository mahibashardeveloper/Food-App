<template>

    <div class="row px-3">
        <div class="p-2 col-12 col-sm-6">
            <div class="fw-bold mb-4">
                Full Name
            </div>
            <div class="fw-bold text-secondary text-opacity-75">
                {{ profile_data.full_name }}
            </div>
        </div>

        <div class="p-2 col-12 col-sm-6">
            <div class="fw-bold mb-4">
                Email
            </div>
            <div class="fw-bold text-secondary text-opacity-75">
                {{ profile_data.email }}
            </div>
        </div>

        <div class="p-2 col-12 col-sm-6">
            <div class="fw-bold mb-4">
                Phone Number
            </div>
            <div class="fw-bold text-secondary text-opacity-75">
                {{ profile_data.phone_number }}
            </div>
        </div>

        <div class="p-2 col-12 col-sm-6">
            <div class="fw-bold mb-4">
                Address
            </div>
            <div class="fw-bold text-secondary text-opacity-75">
                {{ profile_data.address }}
            </div>
        </div>
    </div>

</template>

<script>

    import apiService from "../../../services/apiServices.js";

    import apiRoutes from "../../../services/apiRoutes.js";

    export default {

        data() {

            return {

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
