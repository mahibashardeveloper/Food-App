<template>

    <div class="home">
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
                <div class="py-3 category-item owl-carousel owl-theme">
                    <div class="text-center p-3">
                        <div class="border rounded-3 overflow-hidden">
                            <div class="mb-3">
                                <img :src="'/images/products/p-01.jpg'" class="img-fluid w-100 h-100" alt="product-1">
                            </div>
                            <div class="fw-bold">
                                Category Title 1
                            </div>
                            <div class="text-secondary pb-3 pt-2">
                                8 Items
                            </div>
                        </div>
                    </div>
                    <div class="text-center p-3">
                        <div class="border rounded-3 overflow-hidden">
                            <div class="mb-3">
                                <img :src="'/images/products/p-02.jpg'" class="img-fluid w-100 h-100" alt="product-1">
                            </div>
                            <div class="fw-bold">
                                Category Title 1
                            </div>
                            <div class="text-secondary pb-3 pt-2">
                                12 Items
                            </div>
                        </div>
                    </div>
                    <div class="text-center p-3">
                        <div class="border rounded-3 overflow-hidden">
                            <div class="mb-3">
                                <img :src="'/images/products/p-03.jpg'" class="img-fluid w-100 h-100" alt="product-1">
                            </div>
                            <div class="fw-bold">
                                Category Title 1
                            </div>
                            <div class="text-secondary pb-3 pt-2">
                                19 Items
                            </div>
                        </div>
                    </div>
                    <div class="text-center p-3">
                        <div class="border rounded-3 overflow-hidden">
                            <div class="mb-3">
                                <img :src="'/images/products/p-05.jpg'" class="img-fluid w-100 h-100" alt="product-1">
                            </div>
                            <div class="fw-bold">
                                Category Title 1
                            </div>
                            <div class="text-secondary pb-3 pt-2">
                                7 Items
                            </div>
                        </div>
                    </div>
                    <div class="text-center p-3">
                        <div class="border rounded-3 overflow-hidden">
                            <div class="mb-3">
                                <img :src="'/images/products/p-06.jpg'" class="img-fluid w-100 h-100" alt="product-1">
                            </div>
                            <div class="fw-bold">
                                Category Title 1
                            </div>
                            <div class="text-secondary pb-3 pt-2">
                                2 Items
                            </div>
                        </div>
                    </div>
                    <div class="text-center p-3">
                        <div class="border rounded-3 overflow-hidden">
                            <div class="mb-3">
                                <img :src="'/images/products/p-07.jpg'" class="img-fluid w-100 h-100" alt="product-1">
                            </div>
                            <div class="fw-bold">
                                Category Title 1
                            </div>
                            <div class="text-secondary pb-3 pt-2">
                                5 Items
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100">
            <div class="container py-5">
                <div class="h3 fw-bold">Popular Products</div>
                <div class="py-3 product-item owl-carousel owl-theme">

                    <div v-for="(product, index) in products" :key="index">
                        <div class="text-start p-3">
                            <div class="border rounded-2 overflow-hidden product">
                                <div class="mb-3 overflow-hidden">
                                    <img :src="product.image" class="img-fluid product-image-hover" alt="product-1">
                                </div>
                                <div class="fw-bold ps-3">
                                    {{product.name}}
                                </div>
                                <div class="text-secondary pb-3 pt-2 ps-3">
                                    {{product.price}} tk
                                </div>
                                <a class="btn btn-theme cart-position">
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
                <div class="h3 fw-bold">Daily Best Sells</div>
                <div class="py-3 product-item owl-carousel owl-theme">

                    <div v-for="product in products" :key="product.id">
                        <div class="text-start p-3">
                            <div class="border rounded-2 overflow-hidden product">
                                <div class="mb-3 overflow-hidden">
                                    <img :src="product.image" class="img-fluid product-image-hover" alt="product-1">
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
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-06.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> Product Title 1 </div>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-07.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> Product Title 1 </div>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-08.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> Product Title 1 </div>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-09.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> Product Title 1 </div>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-10.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> Product Title 1 </div>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-1">
                        <div class="p-3">
                            <div class="h6 fw-bold border-bottom border-success-subtle pb-3"> Recently Added </div>
                            <div class="p-2">
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-11.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> Product Title 1 </div>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-12.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> Product Title 1 </div>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-13.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> Product Title 1 </div>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-14.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> Product Title 1 </div>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-15.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <div class="h6"> Product Title 1 </div>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-1">
                        <div class="p-3">
                            <div class="h6 fw-bold border-bottom border-success-subtle pb-3"> Top Rated </div>
                            <div class="p-2">
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-01.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <p class="fw-bold"> Product Title 1 </p>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-02.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <p class="fw-bold"> Product Title 1 </p>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-03.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <p class="fw-bold"> Product Title 1 </p>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-05.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <p class="fw-bold"> Product Title 1 </p>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
                                    </div>
                                </div>
                                <div class="row ps-3 border-bottom">
                                    <div class="col-4 h-100">
                                        <img :src="'/images/products/image-06.jpg'" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-8 p-2">
                                        <p class="fw-bold"> Product Title 1 </p>
                                        <div class="d-flex align-items-center"> <div class="text-success"> $22.85 </div> <del class="text-secondary opacity-25 ms-2"> $24.80 </del> </div>
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

    export default {

        data(){

            return{

                products: [
                    { id: 1, image: '/images/products/p-01.jpg', name: 'Product 1', price: 10.00 },
                    { id: 2, image: '/images/products/p-02.jpg', name: 'Product 2', price: 20.00 },
                    { id: 3, image: '/images/products/p-03.jpg', name: 'Product 3', price: 30.00 },
                    { id: 4, image: '/images/products/p-05.jpg', name: 'Product 4', price: 40.00 },
                    { id: 5, image: '/images/products/p-06.jpg', name: 'Product 5', price: 50.00 },
                    { id: 6, image: '/images/products/p-07.jpg', name: 'Product 6', price: 60.00 },
                    { id: 7, image: '/images/products/p-08.jpg', name: 'Product 7', price: 70.00 },
                    { id: 8, image: '/images/products/p-09.jpg', name: 'Product 8', price: 80.00 },
                    { id: 9, image: '/images/products/p-10.jpg', name: 'Product 9', price: 90.00 },
                    { id: 10, image: '/images/products/p-11.jpg', name: 'Product 10', price: 100.00 },
                ],

                cart: [],

            }

        },

        mounted() {

            $('.slider').owlCarousel(
                {
                    loop:true,
                    margin:10,
                    nav:false,
                    autoplay:true,
                    dots: true,
                    animateOut: 'fadeOut',
                    responsive:{
                        0:{ items:1 },
                        600:{ items:1 },
                        1000:{ items:1 }
                    }
                }
            )

            $('.category-item').owlCarousel(
                {
                    loop:true,
                    margin:10,
                    nav:false,
                    autoplay:true,
                    dots: true,
                    responsive:{
                        0:{ items:2 },
                        600:{ items:3 },
                        1000:{ items:6 }
                    }
                }
            )

            $('.product-item').owlCarousel(
                {
                    loop:true,
                    margin:0,
                    nav:false,
                    autoplay:true,
                    dots: true,
                    responsive:{
                        0:{ items:2 },
                        600:{ items:3 },
                        1000:{ items:5 }
                    }
                }
            )

        },

        methods: {

            addToCart(product) {
                store.dispatch('addToCart', product)
            },

        }

    }

</script>
