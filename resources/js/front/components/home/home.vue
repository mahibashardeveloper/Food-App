<template>

    <div class="home animation-content padding-top-content">
        <div class="w-100">
            <div class="container py-5">
                <div class="owl-carousel owl-theme slider-item">
                    <div class="item" v-for="(slider) in sliders" :key="slider.id">
                        <img :src="'/storage/media/image/' + slider.avatar" class="img-fluid slider rounded-5" alt="banner-1">
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100">
            <div class="container py-5">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4">
                    <div class="p-3">
                        <div class="p-3 bg-white text-center rounded-2 shadow">
                            <div class="mb-3">
                                <i class="bi bi-tag fs-1 text-teal"></i>
                            </div>
                            <div class="fw-bold">
                                Best Price & Offer
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="p-3 bg-white text-center rounded-2 shadow">
                            <div class="mb-3">
                                <i class="bi bi-recycle fs-1 text-teal"></i>
                            </div>
                            <div class="fw-bold">
                                Easy Return
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="p-3 bg-white text-center rounded-2 shadow">
                            <div class="mb-3">
                                <i class="bi bi-file-earmark-ruled fs-1 text-teal"></i>
                            </div>
                            <div class="fw-bold">
                                Great Daily Deal
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="p-3 bg-white text-center rounded-2 shadow">
                            <div class="mb-3">
                                <i class="bi bi-box-seam fs-1 text-teal"></i>
                            </div>
                            <div class="fw-bold">
                                Free Delivery
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100" data-aos="fade-up">
            <div class="container py-5">
                <div class="h3 fw-bold pb-3">Featured Categories</div>
                <div class="owl-carousel owl-theme category-item">
                    <div v-for="(category) in displayedCategories" :key="category.id">
                        <div class="text-center p-3 border rounded-4">
                            <div class="pt-3">
                                <div class="d-flex justify-content-center">
                                    <div class="col-6 overflow-hidden product rounded-4">
                                        <img :src="'/storage/media/image/' + category.avatar" v-if="category.avatar !== null" class="img-fluid product-image-hover rounded-4" alt="category">
                                    </div>
                                </div>
                                <i class="bi bi-tag fs-1" v-if="category.avatar === null"></i>
                            </div>
                            <div class="pb-3 fw-bold mt-4"> {{category.name}} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100" data-aos="fade-up">
            <div class="container py-5">
                <div class="h3 fw-bold pb-3">Popular Products</div>
                <div class="owl-carousel owl-theme product-item">
                    <div v-for="(product) in getProductsInRange(1, 10)" :key="product.id">
                        <div class="text-start p-3 border">
                            <div class="overflow-hidden product">
                                <div class="mb-3 overflow-hidden rounded-4">
                                    <img :src="'/storage/media/image/' + product.avatar" class="img-fluid product-image-hover rounded-4" alt="product-1">
                                </div>
                                <div class="fw-bold ps-3">
                                    {{product.name}}
                                </div>
                                <div class="text-secondary pb-3 pt-2 ps-3">
                                    {{currency}} {{product.price}}
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

        <div class="w-100" data-aos="fade-up">
            <div class="container py-5">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-3">

                    <div class="p-1">
                        <div class="p-3">
                            <div class="h6 fw-bold border-bottom border-success-subtle pb-3"> Recently Added </div>
                            <div class="p-2">

                                <div class="row ps-3 border-bottom py-3" v-for="(product) in getProductsInRange(1, 5)" :key="product.id">
                                    <div class="col-4 h-100">
                                        <img :src="'/storage/media/image/' + product.avatar" class="img-fluid rounded-4" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> {{product.name}} </div>
                                        <div class="text-success"> {{currency}} {{product.price}} </div>
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
                            <div class="h6 fw-bold border-bottom border-success-subtle pb-3"> Trending Products </div>
                            <div class="p-2">

                                <div class="row ps-3 border-bottom py-3" v-for="(product) in getProductsInRange(6, 10)" :key="product.id">
                                    <div class="col-4 h-100">
                                        <img :src="'/storage/media/image/' + product.avatar" class="img-fluid rounded-4" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> {{product.name}} </div>
                                        <div class="text-success"> {{currency}} {{product.price}} </div>
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

                                <div class="row ps-3 border-bottom py-3" v-for="(product) in getProductsInRange(11, 15)" :key="product.id">
                                    <div class="col-4 h-100">
                                        <img :src="'/storage/media/image/' + product.avatar" class="img-fluid rounded-4" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> {{product.name}} </div>
                                        <div class="text-success"> {{currency}} {{product.price}} </div>
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

        <div class="w-100" data-aos="fade-up">
            <div class="container py-5">
                <div class="h3 fw-bold pb-3">Best Selling Products</div>
                <div class="owl-carousel owl-theme product-item">
                    <div v-for="(product) in getProductsInRange(11, 20)" :key="product.id">
                        <div class="text-start p-3 border">
                            <div class="overflow-hidden product">
                                <div class="mb-3 overflow-hidden">
                                    <img :src="'/storage/media/image/' + product.avatar" class="img-fluid product-image-hover rounded-4" alt="product-1">
                                </div>
                                <div class="fw-bold ps-3">
                                    {{product.name}}
                                </div>
                                <div class="text-secondary pb-3 pt-2 ps-3">
                                    {{currency}} {{product.price}}
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

        <div class="w-100" data-aos="fade-up">
            <div class="container py-5">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-3">

                    <div class="p-1">
                        <div class="p-3">
                            <div class="h6 fw-bold border-bottom border-success-subtle pb-3"> Discount Arrivals </div>
                            <div class="p-2">

                                <div class="row ps-3 border-bottom py-3" v-for="(product) in getProductsReversRand(15, 19)" :key="product.id">
                                    <div class="col-4 h-100">
                                        <img :src="'/storage/media/image/' + product.avatar" class="img-fluid rounded-4" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> {{product.name}} </div>
                                        <div class="d-flex align-items-center">
                                            <div class="text-success"> {{currency}} {{product.price}} </div>
                                            <del class="text-secondary ms-2"> {{currency}} {{product.price * 1.5}} </del>
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
                            <div class="h6 fw-bold border-bottom border-success-subtle pb-3"> Discount Products </div>
                            <div class="p-2">

                                <div class="row ps-3 border-bottom py-3" v-for="(product) in getProductsReversRand(20, 24)" :key="product.id">
                                    <div class="col-4 h-100">
                                        <img :src="'/storage/media/image/' + product.avatar" class="img-fluid rounded-4" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> {{product.name}} </div>
                                        <div class="d-flex align-items-center">
                                            <div class="text-success"> {{currency}} {{product.price}} </div>
                                            <del class="text-secondary ms-2"> {{currency}} {{product.price * 1.5}} </del>
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
                            <div class="h6 fw-bold border-bottom border-success-subtle pb-3"> Discount Recommended Products </div>
                            <div class="p-2">

                                <div class="row ps-3 border-bottom py-3" v-for="(product) in getProductsReversRand(25, 29)" :key="product.id">
                                    <div class="col-4 h-100">
                                        <img :src="'/storage/media/image/' + product.avatar" class="img-fluid rounded-4" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> {{product.name}} </div>
                                        <div class="d-flex align-items-center">
                                            <div class="text-success"> {{currency}} {{product.price}} </div>
                                            <del class="text-secondary ms-2"> {{currency}} {{product.price * 1.5}} </del>
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

            getProductsReversRand() {
                return (startId, endId) => {
                    return this.products.filter(product => product.id >= startId && product.id <= endId);
                };
            },

        },

        data(){

            return{

                currency: '$',

                categories: [],

                sliders: [],

                products: [],

                cart: [],

                addLoading: false,

                formData:{
                    limit: 60,
                    page: 1,
                },

            }

        },

        mounted() {

            this.slider_list();

            this.category_list();

            this.product_list();

        },

        methods: {

            addToCart(product) { store.dispatch('addToCart', product) },

            slider_list() {
                this.loading = true;
                apiService.GET(apiRoutes.globalSliderList, (res) =>{
                    this.loading = false;
                    if(res.status === 200) {
                        this.sliders = res.data.data;
                        setTimeout(() => {
                            $('.slider-item').owlCarousel( { loop:true, margin:10, nav:false, autoplay:true, dots: true, responsive:{ 0:{ items:1 }, 600:{ items:1 }, 1000:{ items:1 } } } )
                        }, 200)
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
                            $('.category-item').owlCarousel( { loop:true, margin:10, nav:false, autoplay:true, dots: true, responsive:{ 0:{ items:2 }, 600:{ items:4 }, 1000:{ items:6 } } } )
                        }, 200)
                    }
                })
            },

            product_list() {
                this.loading = true;
                this.formData.page = this.current_page;
                apiService.POST(apiRoutes.globalProductList2, this.formData, (res) =>{
                    this.loading = false;
                    if(res.status === 200) {
                        this.products = res.data.data;
                        setTimeout(() => {
                            $('.product-item').owlCarousel( { loop:true, margin:10, nav:false, autoplay:false, dots: true, responsive:{ 0:{ items:2 }, 600:{ items:3 }, 1000:{ items:5 } } } )
                        }, 200)
                    }
                })
            },

        },

    }

</script>
