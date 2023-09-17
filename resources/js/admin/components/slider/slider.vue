<template>

    <div class="row justify-content-between">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">  </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-end">

            <!-- add modal controller start -->
            <a href="javascript:void(0)" class="btn btn-theme create my-2" @click="manageModal(1, null)" :class="tableData.length === 4 && 'd-none'">
                <i class="bi bi-plus-lg me-2"></i> Add
            </a>
            <!-- add modal controller end -->

        </div>
    </div>

    <!-- page loading start -->
    <div v-if="loading === true">
        <h6 class="card-text placeholder-glow">
                <span class="p-2">
                    <span class="placeholder col-12 py-3 mb-3"></span>
                </span>
            <span class="p-2">
                    <span class="placeholder col-10 py-3 mb-3"></span>
                </span>
            <span class="p-2">
                    <span class="placeholder col-7 py-3 mb-3"></span>
                </span>
        </h6>
    </div>
    <!-- page loading end -->

    <!-- no data start -->
    <div class="slider-page-no-data-found" v-if="tableData.length === 0 && loading === false">
        <div class="text-center">
            <div class="mb-3">
                <i class="bi bi-exclamation-circle fs-1"></i>
            </div>
            <div class="mb-3">There are no data founded.</div>
            <span>Click “Add” to create new data.</span>
        </div>
    </div>
    <!-- no data end -->

    <!-- data list start -->
    <div class="container-fluid" v-if="tableData.length > 0 && loading === false">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-2">
            <div class="p-2" v-for="(each) in tableData">
                <span v-if="each.avatar === null">
                    No Data
                </span>
                <span class="w-100 h-100" v-if="each.avatar !== null">
                    <div class="bg-white p-3">
                        <img class="img-fluid h-100 mb-3" :src="'/storage/media/image/'+each.avatar" alt="slider image">
                        <div class="row justify-content-between align-items-center px-3">
                            <button type="button" class="col-5 btn rounded-0 btn-secondary" @click="manageModal(1, each.id)">
                                Edit
                            </button>
                            <button type="button" class="col-5 btn rounded-0 btn-danger" @click="deleteModal(1, each.id)">
                                Delete
                            </button>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </div>
    <!-- data list end -->

    <!-- manage modal start -->
    <div class="modal fade" id="manageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel">
                        <span v-if="sliderParam.id === ''">
                            Create Slider
                        </span>
                        <span v-if="sliderParam.id !== ''">
                            Edit Slider
                        </span>
                    </h1>
                    <button type="button" class="btn-close" @click="manageModal(2,'')"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="mb-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <label for="file-upload" class="w-100 border">
                                    <input type="file" class="d-none" id="file-upload" @change="attachFile($event)">
                                    <span v-if="sliderParam.avatar === null">
                                    <div class="text-center py-5">
                                        <div class="mb-2">
                                            <i class="bi bi-card-image"></i>
                                        </div>
                                        Upload Image
                                    </div>
                                </span>
                                    <img class="img-fluid" v-if="sliderParam.avatar !== null" :src="'/storage/media/image/'+sliderParam.avatar" alt="profile">
                                </label>
                            </div>
                        </div>
                        <div class="error-text" v-if="error != null && error.avatar !== undefined" v-text="error.avatar[0]"></div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-theme cancel" @click="manageModal(2,'')">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme create" @click="manageSlider">
                        <span v-if="createLoading === false">
                            <span v-if="sliderParam.id === ''"> save </span> <span v-if="sliderParam.id !== ''"> Update </span>
                        </span>
                        <span v-if="createLoading === true">
                            Loading...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- manage modal end -->

    <!-- delete modal start -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-body">
                    <div class="icon-size">
                        <i class="bi bi-archive archive"></i>
                    </div>
                    <div class="delete-text">
                        Are you sure ?
                    </div>
                </div>
                <div class="modal-footer border-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-theme cancel col-5" @click="deleteModal(2,'')">Close</button>
                    <button type="button" class="btn btn-theme delete col-5" aria-label="Confirm" @click="deleteSlider" v-if="deleteLoading === false">Delete</button>
                    <button type="button" class="btn btn-theme delete col-5" v-if="deleteLoading === true">Loading...</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal end -->

</template>

<script>

import apiService from "./../../services/apiServices.js";
import apiRoutes from "./../../services/apiRoutes.js";

export default {

    data(){

        return{

            loading: false,

            createLoading: false,

            deleteLoading: false,

            slider: [],

            sliderParam: {
                id: '',
                avatar: '',
                avatarFilePath: '',
            },

            deleteParam: {
                ids: []
            },

            tableData: [],

            formData: {
                limit: 10,
                page: 1
            },

            total_pages: 0,

            current_page: 0,

            buttons: [],

            searchTimeout: null,

            error: null,

            responseData: null,

            total_data: 0,

            selected: [],

        }

    },

    mounted() {
        this.list();
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
                    this.sliderParam.avatar = res.data.file_path
                }
            })
        },

        openEditModal() {
            this.getSingle();
            const myModal = new bootstrap.Modal("#manageModal", {keyboard: false});
            myModal.show();
        },

        deleteSlider() {
            this.deleteLoading = true;
            this.selected.forEach((v) => {
                this.deleteParam.ids.push(v);
            })
            apiService.POST(apiRoutes.sliderDelete, this.deleteParam, (res) => {
                this.deleteLoading = false;
                if (res.status === 200) {
                    this.$toast.success(res.msg, {position: "bottom-right"});
                    this.deleteModal(2, '')
                    this.list();
                    this.selected = [];
                } else {
                    this.error = res.errors;
                }
            })
        },

        deleteModal(type, id) {
            if (type === 1) {
                this.deleteParam.ids.push(id)
                const myModal = new bootstrap.Modal("#deleteModal", {keyboard: false, backdrop: 'static'});
                myModal.show();
            } else {
                this.selected = [];
                this.sliderParam = { id: '', avatar: '' };
                this.current_page = 1;
                let myModalEl = document.getElementById('deleteModal');
                let modal = bootstrap.Modal.getInstance(myModalEl)
                modal.hide();
            }
        },

        manageModal(type, data = null) {
            this.error = null;
            this.sliderParam = { id: '', avatar: null };
            if (type === 1) {
                this.getSlider();
                if (data !== null) {
                    this.getSingle(data);
                }
                const myModal = new bootstrap.Modal("#manageModal", {keyboard: false, backdrop: 'static'});
                myModal.show();
            } else {
                const myModal = document.querySelector("#manageModal");
                const modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();
            }
        },

        getSlider() {
            apiService.POST(apiRoutes.sliderList, '', (res) => {
                if (res.status === 200) {
                    this.slider = res.data.data
                }
            })
        },

        manageSlider() {
            if (this.sliderParam.id) {
                this.edit();
            } else {
                this.create();
            }
        },

        getSingle(id = null) {
            let param = { id: '' }
            if (id != null) { param.id = id } else { param.id = this.selected[0] }
            apiService.POST(apiRoutes.sliderSingle, param, (res) => {
                if (res.status === 200) {
                    this.sliderParam = res.data;
                } else {
                    this.error = res.errors;
                }
            });
        },

        create() {
            this.createLoading = true;
            this.error = null;
            apiService.POST(apiRoutes.sliderCreate, this.sliderParam, (res) => {
                this.createLoading = false;
                if (res.status === 200) {
                    this.$toast.success(res.msg, {position: "bottom-right"});
                    this.manageModal(2, null);
                    this.list();
                    this.selected = [];
                } else {
                    this.error = res.errors;
                }
            });
        },

        edit() {
            this.createLoading = true;
            this.error = null;
            apiService.POST(apiRoutes.sliderUpdate, this.sliderParam, (res) => {
                this.createLoading = false;
                if (res.status === 200) {
                    this.getSlider();
                    this.$toast.success(res.msg, {position: "bottom-right"});
                    this.manageModal(2, null);
                    this.list();
                    this.selected = [];
                } else {
                    this.error = res.errors;
                }
            });
        },

        list() {
            this.loading = true;
            this.formData.page = this.current_page;
            apiService.POST(apiRoutes.sliderList, this.formData, (res) => {
                this.loading = false;
                this.selected = [];
                if (res.status === 200) {
                    this.tableData = res.data.data;
                    this.total_data = res.data.total;
                    this.total_pages = res.data.total < res.data.per_page ? 1 : Math.ceil((res.data.total / res.data.per_page));
                    this.current_page = res.data.current_page;
                    this.buttons = [...Array(this.total_pages).keys()].map((i) => i + 1);
                }
            });
        },

    }
}

</script>
