<template>

    <div class="row justify-content-center align-items-center mt-3">

        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-6 col-xxl-6 p-3">

            <div class="bg-white profile-content">

                <div class="profile-header">
                    <div class="card-title">
                        Profile
                    </div>
                    <div class="d-flex">
                        <a href="javascript:void(0)" class="btn btn-theme profile me-2" @click="openEditProfileModal" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit Profile">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-theme profile" @click="openEditPasswordModal" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit Password">
                            <i class="bi bi-fingerprint"></i>
                        </a>
                    </div>
                </div>

                <div class="profile-body">
                    <div class="pt-3">
                        <div class="mb-3">
                            Full Name.
                        </div>
                        <div class="mb-3 profile-info">
                            {{ profile_data.full_name }}
                        </div>
                        <div class="mb-3">
                            Email.
                        </div>
                        <div class="mb-3 profile-info">
                            {{ profile_data.email }}
                        </div>
                        <div class="mb-3">
                            Phone Number.
                        </div>
                        <div class="mb-3 profile-info">
                            {{ profile_data.phone_number }}
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- edit profile modal start -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel">
                        Edit Profile
                    </h1>
                    <button type="button" class="btn-close" @click="closeEditProfileModal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">
                            full Name
                        </label>
                        <input type="text" id="full_name" name="full_name" class="form-control" v-model="editParam.full_name">
                        <div class="error-text" v-if="error != null && error.full_name !== undefined" v-text="error.full_name[0]"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Email
                        </label>
                        <input type="email" id="email" name="email" class="form-control" v-model="editParam.email">
                        <div class="error-text" v-if="error != null && error.email !== undefined" v-text="error.email[0]"></div>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">
                            Phone Number
                        </label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control" v-model="editParam.phone_number">
                        <div class="error-text" v-if="error != null && error.phone_number !== undefined" v-text="error.phone_number[0]"></div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-theme cancel" @click="closeEditProfileModal"> Close </button>
                    <button type="button" class="btn btn-theme create" @click="updateProfile">
                        <span v-if="updateProfileLoading === false">Edit</span>
                        <span v-if="updateProfileLoading === true">Loading...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit profile modal end -->

    <!-- change password modal start -->
    <div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel">
                        Edit Password
                    </h1>
                    <button type="button" class="btn-close" @click="closeEditPasswordModal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            New Password
                        </label>
                        <input type="password" id="password" name="password" class="form-control" v-model="passwordParam.password">
                        <div class="error-text" v-if="error != null && error.password !== undefined" v-text="error.password[0]"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">
                            Confirm Password
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" v-model="passwordParam.password_confirmation">
                        <div class="error-text" v-if="error != null && error.password_confirmation !== undefined" v-text="error.password_confirmation[0]"></div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-theme cancel" @click="closeEditPasswordModal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-theme create" @click="updatePassword">
                        <span v-if="updateProfileLoading === false"> Edit </span>
                        <span v-if="updateProfileLoading === true"> Loading... </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- change password modal end -->

</template>

<script>

import apiService from "../../services/apiServices";

import apiRoutes from "../../services/apiRoutes.js";

export default {

    data() {

        return {
            profileDataLoading: false,

            profile_data: '',

            updateProfileLoading: false,

            error: null,

            edit: false,

            editParam: { full_name: '', email: '', phone_number: '', address: '' },

            passwordParam: { password: '', password_confirmation: '' },

        }

    },

    mounted() {

        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        this.getProfile();

    },

    methods: {

        openEditProfileModal() {
            const modal = new bootstrap.Modal("#editProfileModal", {keyboard: false, backdrop: 'static'});
            modal.show();
            this.edit = true;
            this.editParam = JSON.parse(JSON.stringify(this.profile_data));
        },

        closeEditProfileModal() {
            this.edit = false;
            this.error = null;
            let myModalEl = document.getElementById('editProfileModal');
            let modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide();
        },

        openEditPasswordModal() {
            const modal = new bootstrap.Modal("#editPasswordModal", {keyboard: false, backdrop: 'static'});
            modal.show();
            this.edit = true;
            this.editParam = JSON.parse(JSON.stringify(this.profile_data));
        },

        closeEditPasswordModal() {
            this.edit = false;
            this.passwordParam = {password: "", password_confirmation: ""};
            this.error = null;
            let myModalEl = document.getElementById('editPasswordModal');
            let modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide();
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

        updateProfile() {
            this.updateProfileLoading = true;
            this.error = null;
            apiService.POST(apiRoutes.profile_update, this.editParam, (res) => {
                this.updateProfileLoading = false;
                if (res.status === 200) {
                    this.getProfile();
                    this.edit = false;
                    this.$toast.success('Your Profile has been updated successfully.', { position: "top-right" });
                    this.closeEditProfileModal();
                    window.location.reload();
                } else {
                    this.error = res.errors;
                }
            })
        },

        updatePassword() {
            this.updateProfileLoading = true;
            this.error = null;
            apiService.POST(apiRoutes.profile_password, this.passwordParam, (res) => {
                this.updateProfileLoading = false;
                if (res.status === 200) {
                    this.getProfile();
                    this.edit = false;
                    this.$toast.success('Your password has been updated successfully.', { position: "top-right" });
                    this.closeEditPasswordModal();
                } else {
                    this.error = res.errors;
                }
            })
        },

    }

}

</script>
