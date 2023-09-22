<template>

    <div class="row justify-content-between">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
            <!-- search from start -->
            <form class="my-2">
                <div class="position-relative">
                    <input type="text" name="" class="form-control ps-5" placeholder="Search here" v-model="formData.q" @keyup="SearchData">
                    <div class="position-absolute start-0 top-50 translate-middle-y ps-3">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </form>
            <!-- search from end -->
        </div>
    </div>

    <!-- card body start -->
    <div class="card-body">
        <div class="card-header">
            Customers
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
        <div class="page-no-data-found" v-if="tableData.length === 0 && loading === false">
            <div class="w-100">
                <div class="mb-3">
                    <i class="bi bi-exclamation-circle fs-1"></i>
                </div>
                <div class="mb-3">There are no data founded.</div>
                <span>Click “Add” to create new data.</span>
            </div>
        </div>
        <!-- no data end -->

        <div class="card-list" v-if="tableData.length > 0 && loading === false">

            <div class="row align-middle align-items-center header-section">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                    Customer Name
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                    Email
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                    Phone Number
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                    Action
                </div>
            </div>

            <div class="row align-middle align-items-center border-bottom body-section" v-for="(each) in tableData">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                    <div class="marge">full Name</div>
                    {{each.full_name}}
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                    <div class="marge">Email</div>
                    {{each.email}}
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                    <div class="marge">Phone Number</div>
                    {{each.phone_number}}
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 py-2">
                    <div class="marge">Address</div>
                    {{each.address}}
                </div>
            </div>

        </div>

        <div class="card-footer">

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

    </div>
    <!-- card body end -->

</template>

<script>

    import apiService from "../../services/apiServices.js";

    import apiRoutes from "../../services/apiRoutes.js";

    export default {

        data() {

            return {

                loading: false,

                customer: [],

                tableData: [],

                formData: { limit: 5, page: 1 },

                total_pages: 0,

                current_page: 0,

                buttons: [],

                searchTimeout: null,

                error: null,

                responseData: null,

                total_data: 0,

            }

        },

        mounted() {

            this.list();

        },

        methods: {

            list() {
                this.loading = true;
                this.formData.page = this.current_page;
                apiService.POST(apiRoutes.customerList, this.formData, (res) => {
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

            SearchData() {
                clearTimeout(this.searchTimeout);
                this.searchTimeout = setTimeout(() => {
                    this.list();
                }, 500);
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
