<template>

    <div class="home animation-content">
        <div class="w-100">
            <div class="container py-5">
                <div class="slider owl-carousel owl-theme">
                    <div class="item">
                        <img :src="'/images/banner/banner-1.png'" class="img-fluid" alt="banner-1">
                    </div>
                    <div class="item">
                        <img :src="'/images/banner/banner-2.png'" class="img-fluid" alt="banner-2">
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100">
            <div class="container py-5">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4">
                    <div class="p-3">
                        <div class="p-3 border bg-white text-center rounded-2 shadow">
                            <div class="mb-3">
                                <i class="bi bi-tag fs-1 text-teal"></i>
                            </div>
                            <div class="fw-bold">
                                Best Price & Offer
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="p-3 border bg-white text-center rounded-2 shadow">
                            <div class="mb-3">
                                <i class="bi bi-recycle fs-1 text-teal"></i>
                            </div>
                            <div class="fw-bold">
                                Free Delivery
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="p-3 border bg-white text-center rounded-2 shadow">
                            <div class="mb-3">
                                <i class="bi bi-file-earmark-ruled fs-1 text-teal"></i>
                            </div>
                            <div class="fw-bold">
                                Great Daily Deal
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="p-3 border bg-white text-center rounded-2 shadow">
                            <div class="mb-3">
                                <i class="bi bi-box-seam fs-1 text-teal"></i>
                            </div>
                            <div class="fw-bold">
                                Easy Return
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100">
            <div class="container py-5">
                <div class="row">
                    <div class="col-sm-6 py-3">
                        <div class="position-relative">
                            <img :src="'/images/banner/image-16.jpg'" class="img-fluid rounded-3" alt="banner">
                            <div class="position-absolute start-0 top-0 h-100 d-flex align-items-center">
                                <div class="ps-4">
                                    <div class="h4 fw-bold mb-3"> Today Discount </div>
                                    <a href="javascript:void(0)" class="text-success">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 py-3">
                        <div class="position-relative">
                            <img :src="'/images/banner/image-17.jpg'" class="img-fluid rounded-3" alt="banner">
                            <div class="position-absolute start-0 top-0 h-100 d-flex align-items-center">
                                <div class="ps-4">
                                    <div class="h4 fw-bold mb-3"> 1000+ Foods </div>
                                    <a href="javascript:void(0)" class="text-success">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100">
            <div class="container py-5">
                <div class="h3 fw-bold">Featured Categories</div>
                <div class="category-item owl-carousel owl-theme">

                    <div class="item" v-for="(category) in displayedCategories" :key="category.id">
                        <div class="text-center p-3">
                            <div class="overflow-hidden">
                                <div class="pt-3">
                                    <img :src="'/storage/media/image/' + category.avatar" v-if="category.avatar !== null" class="img-fluid product-image-hover" alt="category">
                                    <i class="bi bi-tag fs-1" v-if="category.avatar === null"></i>
                                </div>
                                <div class="pb-3 fw-bold"> {{category.name}} </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="w-100">
            <div class="container py-5">
                <div class="h3 fw-bold">Popular Products</div>
                <div class="product-item owl-carousel owl-theme">
<!--                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">-->
                    <div v-for="(product) in getProductsInRange(1, 10)" :key="product.id">
                        <div class="text-start p-3 border">
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
<!--                </div>-->
                </div>
            </div>
        </div>

        <div class="w-100">
            <div class="container py-5">
                <div class="h3 fw-bold">Daily Best Sells</div>
                <div class="product-item owl-carousel owl-theme">

                    <div v-for="(product) in getProductsInRange(11, 20)" :key="product.id">
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

        <div class="w-100">
            <div class="container py-5">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-3">
                    <div class="p-1">
                        <div class="p-3">
                            <div class="h6 fw-bold border-bottom border-success-subtle pb-3"> Trending Products </div>
                            <div class="p-2">

                                <div class="row ps-3 border-bottom pb-3" v-for="(product) in getProductsInRange(1, 5)" :key="product.id">
                                    <div class="col-4 h-100">
                                        <img :src="'/storage/media/image/' + product.avatar" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> {{product.name}} </div>
                                        <div class="d-flex align-items-center">
                                            <div class="text-success"> ${{product.price}} </div>
                                            <del class="text-secondary ms-2"> ${{product.price * 1.5}} </del>
                                        </div>
                                        <a href="javascript:void(0)" class="btn btn-outline-success mt-2" @click="addToCart(product)">
                                            Add To Cart
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="p-1">
                        <div class="p-3">
                            <div class="h6 fw-bold border-bottom border-success-subtle pb-3"> Recently Added </div>
                            <div class="p-2">

                                <div class="row ps-3 border-bottom pb-3" v-for="(product) in getProductsInRange(6, 10)" :key="product.id">
                                    <div class="col-4 h-100">
                                        <img :src="'/storage/media/image/' + product.avatar" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> {{product.name}} </div>
                                        <div class="d-flex align-items-center">
                                            <div class="text-success"> ${{product.price}} </div>
                                            <del class="text-secondary ms-2"> ${{product.price * 1.5}} </del>
                                        </div>
                                        <a href="javascript:void(0)" class="btn btn-outline-success mt-2" @click="addToCart(product)">
                                            Add To Cart
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="p-1">
                        <div class="p-3">
                            <div class="h6 fw-bold border-bottom border-success-subtle pb-3"> Top Rated </div>
                            <div class="p-2">

                                <div class="row ps-3 border-bottom pb-3" v-for="(product) in getProductsInRange(11, 15)" :key="product.id">
                                    <div class="col-4 h-100">
                                        <img :src="'/storage/media/image/' + product.avatar" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> {{product.name}} </div>
                                        <div class="d-flex align-items-center">
                                            <div class="text-success"> ${{product.price}} </div>
                                            <del class="text-secondary ms-2"> ${{product.price * 1.5}} </del>
                                        </div>
                                        <a href="javascript:void(0)" class="btn btn-outline-success mt-2" @click="addToCart(product)">
                                            Add To Cart
                                        </a>
                                    </div>
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

            displayedCategories() {
                return this.categories.slice(0, 10);
            },

            getProductsInRange() {
                return (startId, endId) => {
                    return this.products.filter(product => product.id >= startId && product.id <= endId);
                };
            },

        },

        data(){

            return{

                categories: [],

                products: [],

                cart: [],

                addLoading: false,

            }

        },

        mounted() {

            this.category_list();

            this.product_list();

            $('.slider').owlCarousel( { loop:true, margin:10, nav:false, autoplay:true, dots: true, animateOut: 'fadeOut', responsive:{ 0:{ items:1 }, 600:{ items:1 }, 1000:{ items:1 } } } )

        },

        methods: {

            addToCart(product) { store.dispatch('addToCart', product) },

            category_list() {
                this.loading = true;
                apiService.GET(apiRoutes.globalCategoryList, (res) =>{
                    this.loading = false;
                    if(res.status === 200) {
                        this.categories = res.data.data;

                        setTimeout(() => {

                            $('.category-item').owlCarousel( { loop:true, margin:10, nav:false, autoplay:true, dots: true, responsive:{ 0:{ items:2 }, 600:{ items:4 }, 1000:{ items:6 } } } )

                        }, 200)

                    }
                })
            },

            product_list() {
                this.loading = true;
                apiService.GET(apiRoutes.globalProductList, (res) =>{
                    this.loading = false;
                    if(res.status === 200) {
                        this.products = res.data.data;

                        setTimeout(() => {

                            $('.product-item').owlCarousel( { loop:true, margin:0, nav:false, autoplay:true, dots: true, responsive:{ 0:{ items:2 }, 600:{ items:3 }, 1000:{ items:5 } } } )

                        }, 200)

                    }
                })
            },

        },

    }

</script>
