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

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-4" v-if="loading === false">

        <div class="p-3">
            <div class="p-3 bg-white inset-shadow">

                <div class="d-flex align-items-center justify-content-between">
                    <div class="ms-3">Sliders</div>
                    <div class="btn btn-light disabled border-0"> <i class="bi bi-sliders"></i> </div>
                </div>

                <hr>

                <div class="pt-3 ps-3">Added Items.
                    <span v-if="slider_total_data != null">
                        {{slider_total_data.total}}
                    </span>
                </div>

            </div>
        </div>

        <div class="p-3">
            <div class="p-3 bg-white inset-shadow">

                <div class="d-flex align-items-center justify-content-between">
                    <div class="ms-3">Categories</div>
                    <div class="btn btn-light disabled border-0"> <i class="bi bi-link-45deg"></i> </div>
                </div>

                <hr>

                <div class="pt-3 ps-3">Added Items.
                    <span v-if="category_total_data != null">
                        {{category_total_data.total}}
                    </span>
                </div>

            </div>
        </div>

        <div class="p-3">
            <div class="p-3 bg-white inset-shadow">

                <div class="d-flex align-items-center justify-content-between">
                    <div class="ms-3">Products</div>
                    <div class="btn btn-light disabled border-0"> <i class="bi bi-bag"></i> </div>
                </div>

                <hr>

                <div class="pt-3 ps-3">Added Items.
                    <span v-if="product_total_data != null">
                        {{product_total_data.total}}
                    </span>
                </div>

            </div>
        </div>

        <div class="p-3">
            <div class="p-3 bg-white inset-shadow">

                <div class="d-flex align-items-center justify-content-between">
                    <div class="ms-3">Customers</div>
                    <div class="btn btn-light disabled border-0"> <i class="bi bi-people"></i> </div>
                </div>

                <hr>

                <div class="pt-3 ps-3">Added Items.
                    <span v-if="customer_total_data != null">
                        {{customer_total_data.total}}
                    </span>
                </div>

            </div>
        </div>

        <div class="p-3">
            <div class="p-3 bg-white inset-shadow">

                <div class="d-flex align-items-center justify-content-between">
                    <div class="ms-3">Orders</div>
                    <div class="btn btn-light disabled border-0"> <i class="bi bi-cart"></i> </div>
                </div>

                <hr>

                <div class="pt-3 ps-3">Added Items.
                    <span v-if="order_total_data != null">
                        {{order_total_data.total}}
                    </span>
                </div>

            </div>
        </div>

    </div>

</template>

<script>

    import apiService from "../../services/apiServices.js";

    import apiRoutes from "../../services/apiRoutes.js";

    export default {

        data(){

            return{

                loading: false,

                slider_total_data: '0',

                category_total_data: '0',

                product_total_data: '0',

                customer_total_data: '0',

                order_total_data: '0',

            }

        },

        mounted() {

            this.getSliderCount();

            this.getCategoryCount();

            this.getProductCount();

            this.getCustomerCount();

            this.getOrderCount();

        },

        methods: {

            getSliderCount() {
                this.loading = true;
                apiService.POST(apiRoutes.sliderList, this.formData, (res) => {
                    this.loading = false;
                    if (parseInt(res.status) === 200) {
                        this.slider_total_data = res.data
                    }
                });
            },

            getCategoryCount() {
                this.loading = true;
                apiService.POST(apiRoutes.categoryList, this.formData, (res) => {
                    this.loading = false;
                    if (parseInt(res.status) === 200) {
                        this.category_total_data = res.data
                    }
                });
            },

            getProductCount() {
                this.loading = true;
                apiService.POST(apiRoutes.productList, this.formData, (res) => {
                    this.loading = false;
                    if (parseInt(res.status) === 200) {
                        this.product_total_data = res.data
                    }
                });
            },

            getCustomerCount() {
                this.loading = true;
                apiService.POST(apiRoutes.customerList, this.formData, (res) => {
                    this.loading = false;
                    if (parseInt(res.status) === 200) {
                        this.customer_total_data = res.data
                    }
                });
            },

            getOrderCount() {
                this.loading = true;
                apiService.POST(apiRoutes.orderList, this.formData, (res) => {
                    this.loading = false;
                    if (parseInt(res.status) === 200) {
                        this.order_total_data = res.data
                    }
                });
            },

        }

    }

</script>
