<template>

    <div class="shop">

        <div class="w-100 bg-white py-5">

            <div class="container">

                <div class="row align-items-center justify-content-between">

                    <div class="col-sm-6 mb-3">

                        <form action="" method="post">

                            <div class="position-relative">

                                <div class="position-absolute start-0 top-50 translate-middle-y">

                                    <i class="bi bi-search ps-3 pe-2 border-end"></i>

                                </div>

                                <input type="text" name="" class="form-control ps-5" placeholder="Search Here" required>

                            </div>

                        </form>

                    </div>

                    <div class="col-sm-4 mb-3 text-end">

                        <select name="" class="form-select">

                            <option value="">Select Category</option>

                            <option value="">Food</option>

                            <option value="">Dress</option>

                            <option value="">Shelter</option>

                            <option value="">Education</option>

                            <option value="">Treatment</option>

                        </select>

                    </div>

                </div>

            </div>

            <div class="container">

                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-01.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-02.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-03.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-04.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-05.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-06.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-07.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-08.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-09.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-10.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-11.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-12.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-13.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-14.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                    <div class="text-start p-3">

                        <div class="border rounded-2 overflow-hidden product">

                            <div class="mb-3 overflow-hidden text-center">

                                <img :src="'/images/products/image-15.jpg'" class="img-fluid product-image-hover" alt="product-1">

                            </div>

                            <div class="fw-bold ps-3">

                                Product Title 1

                            </div>

                            <div class="text-secondary pb-3 pt-2 ps-3">

                                100 tk

                            </div>

                            <router-link :to="{name:'product_details'}" class="btn btn-theme cart-position">

                                <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>

                            </router-link>

                        </div>

                    </div>

                </div>

                <div class="mt-3">

                    <nav aria-label="Page navigation example">

                        <ul class="pagination justify-content-center">

                            <li class="page-item">

                                <a class="page-link" href="javascript:void(0)">

                                    <i class="bi bi-caret-left-fill"></i>

                                </a>

                            </li>

                            <li class="page-item active">

                                <a class="page-link" href="javascript:void(0)">

                                    1

                                </a>

                            </li>

                            <li class="page-item">

                                <a class="page-link" href="javascript:void(0)">

                                    2

                                </a>

                            </li>

                            <li class="page-item">

                                <a class="page-link" href="javascript:void(0)">

                                    3

                                </a>

                            </li>

                            <li class="page-item">

                                <a class="page-link" href="javascript:void(0)">

                                    4

                                </a>

                            </li>

                            <li class="page-item">

                                <a class="page-link" href="javascript:void(0)">

                                    5

                                </a>

                            </li>

                            <li class="page-item">

                                <a class="page-link" href="javascript:void(0)">

                                    <i class="bi bi-caret-right-fill"></i>

                                </a>

                            </li>

                        </ul>

                    </nav>

                </div>

            </div>

        </div>

    </div>

</template>

<script>

export default {

    data(){

        return{}

    },

    mounted() {



    },

    methods: {



    }

}

</script>
