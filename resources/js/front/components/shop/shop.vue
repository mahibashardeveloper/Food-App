<template>

    <div class="container padding-top-content">
        <div class="row">
            <div class="col-12 col-lg-2 pb-4 overflow-hidden">

                <div class="h4 fw-bold ps-2">Category List</div>

                <a href="javascript:void(0)" class="text-decoration-none text-secondary py-2 d-inline-block d-lg-block ps-2"
                   @click="formData.category_id = ''; product_list(current_page = 0)"> All
                </a>

                <a href="javascript:void(0)" class="text-decoration-none text-secondary py-2 d-inline-block d-lg-block ps-2"
                   v-for="(each) in categories" v-if="loading === false" @click="formData.category_id = each.id;
                   product_list(current_page = 0);"> {{each.name}}
                </a>

            </div>
            <div class="col-12 col-lg-10 overflow-hidden">

                <!-- page loading start -->
                <div v-if="productLoading === true">
                    <h6 class="card-text placeholder-glow">
                        <span class="p-2">
                            <span class="placeholder col-12 py-3 mb-3"></span>
                        </span>
                                <span class="p-2">
                            <span class="placeholder col-10 py-3 mb-3"></span>
                        </span>
                                <span class="p-2">
                            <span class="placeholder col-8 py-3 mb-3"></span>
                        </span>
                    </h6>
                </div>
                <!-- page loading end -->

                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4" v-if="productLoading === false">
                    <div v-for="(product) in products" :key="product.id">
                        <div class="text-start p-3 border mb-4">
                            <div class="overflow-hidden">
                                <div class="mb-3 overflow-hidden">
                                    <img :src="'/storage/media/image/' + product.avatar" class="img-fluid w-100" alt="product-1">
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <div class="fw-bold">
                                            {{product.name}}
                                        </div>
                                        <div class="text-secondary pb-3 pt-2">
                                            {{currency}} {{product.price}}
                                        </div>
                                    </div>
                                    <div class="col-12 text-end">
                                        <a class="btn btn-theme" @click="addToCart(product)">
                                            <i class="bi bi-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mb-4" v-if="products.length > 0 && loading === false">
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

                <div class="no-data-founded" v-if="productLoading === false && products.length === 0">
                    No category related data founded
                </div>

            </div>
        </div>
    </div>

</template>

<script>

    import store from "../../store/index.js";
    import apiService from "../../services/apiServices";
    import apiRoutes from "../../services/apiRoutes";

    export default {

        data(){

            return{

                currency: '$',

                categories: [],

                products: [],

                cart: [],

                formData:{
                    keyword:'',
                    category_id:'',
                    limit: 10,
                    page: 1
                },

                addLoading: false,

                loading: false,

                productLoading: false,

                total_pages: 0,

                current_page: 0,

                buttons: [],

                searchTimeout: null,

                error: null,

                responseData: null,

            }

        },

        mounted() {

            this.category_list();

            this.product_list();

        },

        methods: {

            addToCart(product) { store.dispatch('addToCart', product) },

            category_list() {
                this.loading = true;
                apiService.GET(apiRoutes.globalCategoryList, (res) =>{
                    this.loading = false;
                    if(res.status === 200) {
                        this.categories = res.data.data;
                    }
                })
            },

            product_list() {
                this.productLoading = true;
                this.formData.page = this.current_page;
                apiService.POST(apiRoutes.globalProductList2, this.formData,(res) =>{
                    this.productLoading = false;
                    if (res.status === 200) {
                        this.products = res.data.data;
                        this.total_pages = res.data.total < res.data.per_page ? 1 : Math.ceil((res.data.total / res.data.per_page));
                        this.current_page = res.data.current_page;
                        this.buttons = [...Array(this.total_pages).keys()].map((i) => i + 1);
                    }
                })
            },

            PrevPage() {
                if (this.current_page > 1) {
                    this.current_page = this.current_page - 1;
                    this.product_list();
                }
            },

            NextPage() {
                if (this.current_page < this.total_pages) {
                    this.current_page = this.current_page + 1;
                    this.product_list();
                }
            },

            pageChange(page) {
                this.current_page = page;
                this.product_list();
            },

        }

    }

</script>
