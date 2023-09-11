<template>

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
    <div class="d-flex justify-content-center align-items-center h-100" v-if="tableData.length === 0 && loading === false">
        <div class="w-100 text-center">
            <div class="mb-3">
                <i class="bi bi-exclamation-circle fs-1"></i>
            </div>
            <div class="mb-3">There are no data founded.</div>
            <span>Order and enjoy your product.</span>
        </div>
    </div>
    <!-- no data end -->

    <!-- list of order start -->
    <div class="px-3" v-if="tableData.length > 0 && loading === false">
        <div class="row border">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                Name
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                Price
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                Quantity
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                Action
            </div>
        </div>
        <div class="row border" v-for="(each) in tableData">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                {{each.name}}
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                ${{each.price}}
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                {{each.quantity}}
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                <a href="javascript:void(0)" class="text-decoration-none text-danger" @click="deleteModal(1, each.id)">
                    <i class="bi bi-trash2-fill"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- list of order end -->

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
                    <button type="button" class="btn btn-theme delete col-5" aria-label="Confirm" @click="deleteOrder" v-if="deleteLoading === false">Delete</button>
                    <button type="button" class="btn btn-theme delete col-5" v-if="deleteLoading === true">Loading...</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal end -->

</template>

<script>

import apiService from "../../../services/apiServices.js";
import apiRoutes from "../../../services/apiRoutes.js";

export default {

    data(){

        return{

            loading: false,

            deleteLoading: false,

            customer: [],

            deleteParam: { ids: [] },

            tableData: [],

            formData: { limit: 10, page: 1 },

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

        list() {
            this.loading = true;
            this.formData.page = this.current_page;
            apiService.POST(apiRoutes.OrderList, this.formData, (res) => {
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

        deleteOrder() {
            this.deleteLoading = true;
            this.selected.forEach((v) => {
                this.deleteParam.ids.push(v);
            })
            apiService.POST(apiRoutes.OrderDelete, this.deleteParam, (res) => {
                this.deleteLoading = false;
                if (res.status === 200) {
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
                this.categoryParam = { id: '', name: '', avatar: '' };
                this.current_page = 1;
                let myModalEl = document.getElementById('deleteModal');
                let modal = bootstrap.Modal.getInstance(myModalEl)
                modal.hide();
            }
        },

    }

}

</script>
