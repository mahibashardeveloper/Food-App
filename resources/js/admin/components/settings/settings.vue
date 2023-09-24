<template>

    <div class="row justify-content-center align-items-center mt-3">

        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-6 col-xxl-6 p-3">

            <div class="bg-white profile-content">

                <div class="profile-header">
                    <div class="card-title">
                        Settings
                    </div>
                    <div class="d-flex">
                        <a href="javascript:void(0)" class="btn btn-theme profile" @click="openSettingsModal">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>
                </div>

                <div class="profile-body">
                    <div class="pt-3">
                        <div class="mb-3">
                            Facebook Link:
                        </div>
                        <div class="mb-3 profile-info">
                            {{ settings_data.facebook }}
                        </div>
                        <div class="mb-3">
                            Twitter Link:
                        </div>
                        <div class="mb-3 profile-info">
                            {{ settings_data.twitter }}
                        </div>
                        <div class="mb-3">
                            Instagram Link:
                        </div>
                        <div class="mb-3 profile-info">
                            {{ settings_data.instagram }}
                        </div>
                        <div class="mb-3">
                            Linkedin Link:
                        </div>
                        <div class="mb-3 profile-info">
                            {{ settings_data.linkedin }}
                        </div>
                        <div class="mb-3">
                            Youtube Link:
                        </div>
                        <div class="mb-3 profile-info">
                            {{ settings_data.youtube }}
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
    <!-- edit profile modal end -->

</template>

<script>

    import apiService from "../../services/apiServices";

    import apiRoutes from "../../services/apiRoutes.js";
    export default {

        data() {

            return {
                settingsLoading: false,

                settings_data: '',

                updateSettingsLoading: false,

                error: null,

                edit: false,

                editParam: {
                    facebook: '',
                    twitter: '',
                    instagram: '',
                    linkedin: '',
                    youtube: '',
                },

            }

        },

        mounted() {

            this.getSettings();

        },

        methods: {

            openSettingsModal() {
                const modal = new bootstrap.Modal("#editProfileModal", {keyboard: false, backdrop: 'static'});
                modal.show();
                this.edit = true;
                this.editParam = JSON.parse(JSON.stringify(this.settings_data));
            },

            closeEditSettingsModal() {
                this.edit = false;
                this.error = null;
                let myModalEl = document.getElementById('editProfileModal');
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
                apiService.POST(apiRoutes.settings_update, this.editParam, (res) => {
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
