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
                    <div class="btn btn-info disabled border"> <i class="bi bi-link-45deg"></i> </div>
                <div class="pt-3">Categories</div>
                <div class="pt-3">Count No. <span v-if="category_total_data != null"> {{category_total_data.total}} </span></div>
            </div>
        </div>
        <div class="p-3">
            <div class="p-3 bg-white inset-shadow">
                    <div class="btn btn-light disabled border"> <i class="bi bi-bag"></i> </div>
                <div class="pt-3">Products</div>
                <div class="pt-3">Count No. <span v-if="product_total_data != null"> {{product_total_data.total}} </span></div>
            </div>
        </div>
        <div class="p-3">
            <div class="p-3 bg-white inset-shadow">
                    <div class="btn btn-dark disabled border"> <i class="bi bi-cart"></i> </div>
                <div class="pt-3">Orders</div>
                <div class="pt-3">Count No. <span v-if="order_total_data != null"> {{order_total_data.total}} </span></div>
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
                category_total_data: '0',
                product_total_data: '0',
                order_total_data: '0',
            }
        },
        mounted() {
            this.getCategoryCount();
            this.getProductCount();
            this.getOrderCount();
        },
        methods: {
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
