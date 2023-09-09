<template>

    <div class="container-fluid shop">
        <div class="shop-wrapper">
            <div class="shop-sidebar">
                <div class="shop-sidebar-header">
                    <a href="javascript:void(0)" class="link">Shop Store</a>
                    <a href="javascript:void(0)" class="close-btn">
                        <i class="bi bi-x-lg"></i>
                    </a>
                </div>
                <div class="shop-sidebar-body">
                    <a href="javascript:void(0)" class="sub-link">Food</a>
                    <a href="javascript:void(0)" class="sub-link">Dress</a>
                    <a href="javascript:void(0)" class="sub-link">Shelter</a>
                    <a href="javascript:void(0)" class="sub-link">Education</a>
                    <a href="javascript:void(0)" class="sub-link">Treatment</a>
                </div>
            </div>
            <div class="shop-content">
                <div class="shop-header">
                    <a href="javascript:void(0)" class="btn-controller">
                        <i class="bi bi-justify-left"></i>
                    </a>
                </div>
                <div class="content-inner-content">
                    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                        <div v-for="(product, index) in getProductsInRange(1, 10)" :key="product.id">
                            <div class="text-start p-3">
                                <div class="border rounded-2 overflow-hidden product">
                                    <div class="mb-3 overflow-hidden">
                                        <img :src="'/storage/media/image/' + product.avatar" class="img-fluid product-image-hover" alt="product-1">
                                    </div>
                                    <div class="fw-bold ps-3">
                                        {{product.name}}
                                    </div>
                                    <div class="text-secondary pb-3 pt-2 ps-3">
                                        {{product.price}} tk
                                    </div>
                                    <a class="btn btn-theme cart-position" @click="addToCart(product)">
                                        <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
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

    computed: {
        getProductsInRange() {
            return (startId, endId) => {
                return this.products.filter(product => product.id >= startId && product.id <= endId);
            };
        },
    },

    data(){

        return{

            products: [],

            cart: [],

        }

    },

    mounted() {

        this.product_list();

    },

    methods: {

        addToCart(product) {
            store.dispatch('addToCart', product)
        },

        product_list() {
            this.loading = true;
            apiService.GET(apiRoutes.globalProductList, (res) =>{
                this.loading = false;
                if(res.status === 200) {
                    this.products = res.data.data;
                }
            })
        }

    }

}

</script>
