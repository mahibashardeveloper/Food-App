<template>

    <div class="container shop">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            <div v-for="(product) in products" :key="product.id">
                <div class="text-start p-3 border mb-4">
                    <div class="overflow-hidden product">
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

</template>

<script>

import store from "../../store/index.js";
import apiService from "../../services/apiServices";
import apiRoutes from "../../services/apiRoutes";

export default {

    data(){

        return{

            products: [],

        }

    },

    mounted() {

        this.category_list();

        this.product_list();

    },

    methods: {

        addToCart(product) { store.dispatch('addToCart', product) },

        product_list() {
            this.loading = true;
            apiService.GET(apiRoutes.globalProductList, (res) =>{
                this.loading = false;
                if(res.status === 200) {
                    this.products = res.data.data;
                }
            })
        },

        category_list() {
            this.loading = true;
            apiService.GET(apiRoutes.globalCategoryList, (res) =>{
                this.loading = false;
                if(res.status === 200) {
                    this.categories = res.data.data;
                    setTimeout(() => {
                        $('.category-item').owlCarousel( { loop:true, margin:0, nav:false, autoplay:true, dots: true, responsive:{ 0:{ items:2 }, 600:{ items:4 }, 1000:{ items:6 } } } )
                    }, 200)
                }
            })
        },

    }

}

</script>
