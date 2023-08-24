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
                    <div class="btn btn-primary disabled border"> <i class="bi bi-person"></i> </div>
                <div class="pt-3">SubAdmins</div>
                <div class="pt-3">Count No. <span v-if="subAdmin_total_data != null"> {{subAdmin_total_data.total}} </span> </div>
            </div>
        </div>
        <div class="p-3">
            <div class="p-3 bg-white inset-shadow">
                    <div class="btn btn-secondary disabled border"> <i class="bi bi-person"></i> </div>
                <div class="pt-3">Vendors</div>
                <div class="pt-3">Count No. <span v-if="vendor_total_data != null"> {{vendor_total_data.total}} </span> </div>
            </div>
        </div>
        <div class="p-3">
            <div class="p-3 bg-white inset-shadow">
                    <div class="btn btn-success disabled border"> <i class="bi bi-person"></i> </div>
                <div class="pt-3">Delivery Mans</div>
                <div class="pt-3">Count No. <span v-if="deliveryMan_total_data != null"> {{deliveryMan_total_data.total}} </span> </div>
            </div>
        </div>
        <div class="p-3">
            <div class="p-3 bg-white inset-shadow">
                    <div class="btn btn-danger disabled border"> <i class="bi bi-person"></i> </div>
                <div class="pt-3">Partners</div>
                <div class="pt-3">Count No. <span v-if="partner_total_data != null"> {{partner_total_data.total}} </span> </div>
            </div>
        </div>
        <div class="p-3">
            <div class="p-3 bg-white inset-shadow">
                    <div class="btn btn-warning disabled border"> <i class="bi bi-person"></i> </div>
                <div class="pt-3">Merchants</div>
                <div class="pt-3">Count No. <span v-if="merchant_total_data != null"> {{merchant_total_data.total}} </span> </div>
            </div>
        </div>
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
                <div class="pt-3">Count No. not implement</div>
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
                subAdmin_total_data: '0',
                vendor_total_data: '0',
                deliveryMan_total_data: '0',
                partner_total_data: '0',
                merchant_total_data: '0',
                category_total_data: '0',
                product_total_data: '0'
            }
        },
        mounted() {
            this.getSubAdminCount();
            this.getVendorCount();
            this.getDeliveryCount();
            this.getPartnerCount();
            this.getMerchantCount();
            this.getCategoryCount();
            this.getProductCount();
        },
        methods: {
            getSubAdminCount() {
                this.loading = true;
                apiService.POST(apiRoutes.subAdminList, this.formData, (res) => {
                    this.loading = false;
                    if (parseInt(res.status) === 200) {
                        this.subAdmin_total_data = res.data
                    }
                });
            },
            getVendorCount() {
                this.loading = true;
                apiService.POST(apiRoutes.vendorList, this.formData, (res) => {
                    this.loading = false;
                    if (parseInt(res.status) === 200) {
                        this.vendor_total_data = res.data
                    }
                });
            },
            getDeliveryCount() {
                this.loading = true;
                apiService.POST(apiRoutes.deliveryManList, this.formData, (res) => {
                    this.loading = false;
                    if (parseInt(res.status) === 200) {
                        this.deliveryMan_total_data = res.data
                    }
                });
            },
            getPartnerCount() {
                this.loading = true;
                apiService.POST(apiRoutes.partnerList, this.formData, (res) => {
                    this.loading = false;
                    if (parseInt(res.status) === 200) {
                        this.partner_total_data = res.data
                    }
                });
            },
            getMerchantCount() {
                this.loading = true;
                apiService.POST(apiRoutes.merchantList, this.formData, (res) => {
                    this.loading = false;
                    if (parseInt(res.status) === 200) {
                        this.merchant_total_data = res.data
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
        }
    }

</script>
