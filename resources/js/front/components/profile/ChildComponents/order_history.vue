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

        <div class="row border mb-3 bg-dark-subtle fw-bold">
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

        <div class="row border mb-3 bg-white" v-for="(each) in tableData">
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
                <span v-if="each.status === 1">Pending</span>
                <span v-if="each.status === 2">processing</span>
                <span v-if="each.status === 3">shipped</span>
                <span v-if="each.status === 4">delivered</span>
                <span v-if="each.status === 5">undelivered</span>
                <span v-if="each.status === 6">returned</span>
                <span v-if="each.status === 7">cancelled</span>
            </div>
        </div>

        <div class="d-flex justify-content-center" v-if="tableData.length > 0 && loading === false">
            <div class="pagination">
                <div class="page-item" @click="PrevPage">
                    <a class="page-link" href="javascript:void(0)">
                        <i class="bi bi-caret-left-fill"></i>
                    </a>
                </div>
                <div v-if="buttons.length <= 6" class="d-flex">
                    <div v-for="(page) in buttons" class="page-item" :class="{'active': current_page === page}">
                        <a class="page-link" @click="pageChange(page)" href="javascript:void(0)" v-text="page"></a>
                    </div>
                </div>
                <div v-if="buttons.length > 6" class="d-flex">
                    <div class="page-item" :class="{'active': current_page === 1}">
                        <a class="page-link" @click="pageChange(1)" href="javascript:void(0)">1</a>
                    </div>
                    <div v-if="current_page > 3" class="page-item">
                        <a class="page-link" @click="pageChange(current_page - 2)" href="javascript:void(0)">...</a>
                    </div>
                    <div v-if="current_page === buttons.length" class="page-item" :class="{'active': current_page === (current_page - 2)}">
                        <a class="page-link" @click="pageChange(current_page - 2)" href="javascript:void(0)" v-text="current_page - 2"></a>
                    </div>
                    <div v-if="current_page > 2" class="page-item" :class="{'active': current_page === (current_page - 1)}">
                        <a class="page-link" @click="pageChange(current_page - 1)" href="javascript:void(0)" v-text="current_page - 1"></a>
                    </div>
                    <div v-if="current_page !== 1 && current_page !== buttons.length" class="page-item active">
                        <a class="page-link" @click="pageChange(current_page)" href="javascript:void(0)" v-text="current_page"></a>
                    </div>
                    <div v-if="current_page < buttons.length - 1" class="page-item" :class="{'active': current_page === (current_page + 1)}">
                        <a class="page-link" @click="pageChange(current_page + 1)" href="javascript:void(0)" v-text="current_page + 1"></a>
                    </div>
                    <div v-if="current_page === 1" class="page-item" :class="{'active': current_page === (current_page + 2)}">
                        <a class="page-link" @click="pageChange(current_page + 2)" href="javascript:void(0)" v-text="current_page + 2"></a>
                    </div>
                    <div v-if="current_page < buttons.length - 2" class="page-item">
                        <a class="page-link" @click="pageChange(current_page + 2)" href="javascript:void(0)">...</a>
                    </div>
                    <div class="page-item" :class="{'active': current_page === (current_page - buttons.length)}">
                        <a class="page-link" @click="pageChange(buttons.length)" href="javascript:void(0)" v-text="buttons.length"></a>
                    </div>
                </div>
                <div class="page-item" @click="NextPage">
                    <a class="page-link" href="javascript:void(0)">
                        <i class="bi bi-caret-right-fill"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <!-- list of order end -->

    <!-- delete modal start -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-body">
                    <div class="icon-size text-center">
                        <i class="bi bi-archive archive"></i>
                    </div>
                    <div class="delete-text text-center">
                        Are you sure ?
                    </div>
                </div>
                <div class="modal-footer border-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary col-5" @click="deleteModal(2,'')">Close</button>
                    <button type="button" class="btn btn-danger delete col-5" aria-label="Confirm" @click="deleteOrder" v-if="deleteLoading === false">Delete</button>
                    <button type="button" class="btn btn-danger delete col-5" v-if="deleteLoading === true">Loading...</button>
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
            formData: { limit: 5, page: 1 },
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

        PrevPage() {
            if (this.current_page > 1) {
                this.current_page = this.current_page - 1;
                this.list()
            }
        },

        NextPage() {
            if (this.current_page < this.total_pages) {
                this.current_page = this.current_page + 1;
                this.list()
            }
        },

        pageChange(page) {
            this.current_page = page;
            this.list();
        },

    }

}

</script>
