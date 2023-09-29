<template>

    <div class="row justify-content-center px-3">
        <div class="col-md-6 text-center">
            <div class="mb-3 fw-bold">
                Full Name
            </div>
            <div class="mb-3">
                {{ profile_data.full_name }}
            </div>
            <div class="mb-3 fw-bold">
                Email
            </div>
            <div class="mb-3">
                {{ profile_data.email }}
            </div>
            <div class="mb-3 fw-bold">
                Phone Number
            </div>
            <div class="mb-3">
                {{ profile_data.phone_number }}
            </div>
            <div class="mb-3 fw-bold">
                Address
            </div>
            <div class="mb-3">
                {{ profile_data.address }}
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center">
        <a href="javascript:void(0)" class="btn btn-light fw-bold px-3 py-1 border" @click="openEditProfileModal">
            Edit Profile
        </a>
        <a href="javascript:void(0)" class="btn btn-light fw-bold px-3 py-1 border ms-4" @click="openEditPasswordModal">
            Edit Password
        </a>
    </div>

    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Edit Profile</h1>
                        <button type="button" class="btn-close shadow-none" @click="closeEditProfileModal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Full Name</label>
                            <input type="text" name="full_name" class="form-control shadow-none" v-model="editParam.full_name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control shadow-none" v-model="editParam.email">
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control shadow-none" v-model="editParam.phone_number">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address" class="form-control shadow-none" v-model="editParam.address">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary px-4 py-2" @click="closeEditProfileModal">Close</button>
                        <button type="submit" class="btn btn-success px-4 py-2" v-if="updateProfileLoading === false" @click="updateProfile">Update</button>
                        <button type="button" class="btn btn-success px-4 py-2" v-if="updateProfileLoading === true">Loading...</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Edit Password</h1>
                        <button type="button" class="btn-close shadow-none" @click="closeEditPasswordModal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="text" name="password" class="form-control shadow-none" v-model="passwordParam.password">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">password confirm</label>
                            <input type="text" name="password_confirmation" class="form-control shadow-none" v-model="passwordParam.password_confirmation">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary px-4 py-2" @click="closeEditPasswordModal">Close</button>
                        <button type="submit" class="btn btn-success px-4 py-2" v-if="updateProfileLoading === false" @click="updateProfile">Update</button>
                        <button type="button" class="btn btn-success px-4 py-2" v-if="updateProfileLoading === true">Loading...</button>
                    </div>
                </form>
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

                profileDataLoading: false,

                profile_data: '',

                updateProfileLoading: false,

                error: null,

                edit: false,

                editParam: {
                    company_name: '',
                    first_name: '',
                    last_name: '',
                    email: '',
                    phone_number: '',
                    avatar: '',
                },

                passwordParam: {
                    password: '',
                    password_confirmation: '',
                },

            }

        },

        mounted() {

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

            updateProfile() {
                this.updateProfileLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.profile_update, this.editParam, (res) => {
                    this.updateProfileLoading = false;
                    if (res.status === 200) {
                        this.getProfile();
                        this.edit = false;
                        this.closeEditProfileModal();
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
