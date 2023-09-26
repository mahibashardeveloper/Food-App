<template>

    <div class="row justify-content-center align-items-center mt-3">

        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-6 col-xxl-6 p-3">

            <div class="bg-white profile-content">

                <div class="profile-header">
                    <div class="card-title">
                        Profile
                    </div>
                    <div class="d-flex">
                        <a href="javascript:void(0)" class="btn btn-theme profile me-3" @click="openSettingsModal">
                            <i class="bi bi-patch-check"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-theme profile me-3" @click="openEditProfileModal">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="javascript:void(0)" class="btn btn-theme profile" @click="openEditPasswordModal">
                            <i class="bi bi-fingerprint"></i>
                        </a>
                    </div>
                </div>

                <div class="profile-body">
                    <div class="d-flex justify-content-center">
                        <div class="avatar">
                            <img class="img-fluid" v-if="!profile_data.avatar" :src="'https://ui-avatars.com/api/?name='+profile_data.first_name" alt="profile-dummy">
                            <img class="img-fluid" v-else :src="profile_data.media && profile_data.media.full_file_path" alt="profile">
                        </div>
                    </div>
                    <div class="pt-3">
                        <div class="mb-3">
                            Company Name.
                        </div>
                        <div class="mb-3 profile-info">
                            {{ profile_data.company_name }}
                        </div>
                        <div class="mb-3">
                            Full Name.
                        </div>
                        <div class="mb-3 profile-info">
                            {{ profile_data.first_name }} {{ profile_data.last_name }}
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
                        <div class="mb-3">
                            Social Media:
                        </div>
                        <div class="d-flex justify-content-start align-items-center">
                            <a :href="settings_data.facebook" target="_blank"> <i class="bi bi-facebook btn btn-secondary mx-1"></i> </a>
                            <a :href="settings_data.twitter" target="_blank"> <i class="bi bi-twitter btn btn-secondary mx-1"></i> </a>
                            <a :href="settings_data.instagram" target="_blank"> <i class="bi bi-instagram btn btn-secondary mx-1"></i> </a>
                            <a :href="settings_data.linkedin" target="_blank"> <i class="bi bi-linkedin btn btn-secondary mx-1"></i> </a>
                            <a :href="settings_data.youtube" target="_blank"> <i class="bi bi-youtube btn btn-secondary mx-1"></i> </a>
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
                        <div class="d-flex justify-content-center align-items-center">
                            <label for="file-upload">
                                <input type="file" class="d-none" id="file-upload" @change="attachFile($event)">
                                <span v-if="editParam.avatar === null" class="modal-avatar">
                                    <div class="text-center">
                                        <div class="mb-2">
                                            <i class="bi bi-card-image"></i>
                                        </div>
                                        Upload Image
                                    </div>
                                </span>
                                <img class="img-fluid modal-avatar" v-if="editParam.avatar !== null" :src="editParam.avatarFilePath" alt="profile">
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="first_name" class="form-label">
                            First Name
                        </label>
                        <input type="text" id="first_name" name="first_name" class="form-control" v-model="editParam.first_name">
                        <div class="error-text" v-if="error != null && error.first_name !== undefined" v-text="error.first_name[0]"></div>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">
                            Last Name
                        </label>
                        <input type="text" id="last_name" name="last_name" class="form-control" v-model="editParam.last_name">
                        <div class="error-text" v-if="error != null && error.last_name !== undefined" v-text="error.last_name[0]"></div>
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
                    <div class="mb-3">
                        <label for="company_name" class="form-label">
                            Company Name
                        </label>
                        <input type="text" id="company_name" name="company_name" class="form-control" v-model="editParam.company_name">
                        <div class="error-text" v-if="error != null && error.company_name !== undefined" v-text="error.company_name[0]"></div>
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

    <!-- edit social media modal start -->
    <div class="modal fade" id="editSettingsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel">
                        Edit Settings
                    </h1>
                    <button type="button" class="btn-close" @click="closeEditSettingsModal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="facebook" class="form-label">
                            Facebook Link
                        </label>
                        <input type="text" id="facebook" name="facebook" class="form-control" v-model="editParam.facebook">
                        <div class="error-text" v-if="error != null && error.facebook !== undefined" v-text="error.facebook[0]"></div>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">
                            Twitter Link
                        </label>
                        <input type="text" id="twitter" name="twitter" class="form-control" v-model="editParam.twitter">
                        <div class="error-text" v-if="error != null && error.twitter !== undefined" v-text="error.twitter[0]"></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Instagram Link
                        </label>
                        <input type="text" id="instagram" name="instagram" class="form-control" v-model="editParam.instagram">
                        <div class="error-text" v-if="error != null && error.instagram !== undefined" v-text="error.instagram[0]"></div>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">
                            Linkedin Link
                        </label>
                        <input type="text" id="linkedin" name="linkedin" class="form-control" v-model="editParam.linkedin">
                        <div class="error-text" v-if="error != null && error.linkedin !== undefined" v-text="error.linkedin[0]"></div>
                    </div>
                    <div class="mb-3">
                        <label for="youtube" class="form-label">
                            Youtube Link
                        </label>
                        <input type="text" id="youtube" name="youtube" class="form-control" v-model="editParam.youtube">
                        <div class="error-text" v-if="error != null && error.youtube !== undefined" v-text="error.youtube[0]"></div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-theme cancel" @click="closeEditSettingsModal"> Close </button>
                    <button type="button" class="btn btn-theme create" @click="updateSettings">
                        <span v-if="updateSettingsLoading === false">Edit</span>
                        <span v-if="updateSettingsLoading === true">Loading...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit social media modal end -->

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

                settingsLoading: false,

                settings_data: '',

                updateSettingsLoading: false,

                editSettingsParam: {
                    facebook: '',
                    twitter: '',
                    instagram: '',
                    linkedin: '',
                    youtube: '',
                },

            }

        },

        mounted() {

            this.getProfile();

            this.getSettings();

        },

        methods: {

            attachFile(event) {
                let file = event.target.files[0];
                let formData = new FormData();
                formData.append("file", file)
                formData.append("media_type", 1);
                apiService.UPLOAD(apiRoutes.media, formData, (res) => {
                    event.target.value = '';
                    if (res.status === 200) {
                        this.editParam.avatarFilePath = res.data.full_file_path
                        this.editParam.avatar = res.data.id
                    }
                })
            },

            openEditProfileModal() {
                const modal = new bootstrap.Modal("#editProfileModal", {keyboard: false, backdrop: 'static'});
                modal.show();
                this.edit = true;
                this.editParam = JSON.parse(JSON.stringify(this.profile_data));
                this.editParam.avatarFilePath = this.editParam.media != null ? this.editParam.media.full_file_path : null
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

            openSettingsModal() {
                const modal = new bootstrap.Modal("#editSettingsModal", {keyboard: false, backdrop: 'static'});
                modal.show();
                this.edit = true;
                this.editParam = JSON.parse(JSON.stringify(this.settings_data));
            },

            closeEditSettingsModal() {
                this.edit = false;
                this.error = null;
                let myModalEl = document.getElementById('editSettingsModal');
                let modal = bootstrap.Modal.getInstance(myModalEl);
                modal.hide();
            },

            getSettings() {
                this.settingsLoading = true;
                apiService.GET(apiRoutes.settings_details, (res) => {
                    this.settingsLoading = false;
                    if (res.status === 200) {
                        this.settings_data = res.data;
                    }
                })
            },

            updateSettings() {
                this.updateSettingsLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.settings_update, this.editSettingsParam, (res) => {
                    this.updateSettingsLoading = false;
                    if (res.status === 200) {
                        this.getSettings();
                        this.edit = false;
                        this.$toast.success('Your Settings has been updated successfully.', { position: "top-right" });
                        this.closeEditSettingsModal();
                    } else {
                        this.error = res.errors;
                    }
                })
            },

        }

    }

</script>
