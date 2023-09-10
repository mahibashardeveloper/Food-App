<template>

    <div class="container-fluid shop">
        <div class="shop-wrapper">
            <div class="shop-sidebar" :class="{active: isActiveSidebar}">
                <div class="shop-sidebar-header">
                    <a href="javascript:void(0)" class="link">Filter</a>
                    <a href="javascript:void(0)" class="close-btn">
                        <i class="bi bi-x-lg"></i>
                    </a>
                </div>
                <div class="shop-sidebar-body">
                    <a href="javascript:void(0)" class="sub-link" @click="showAllProducts">Show All Products</a>
                    <div v-for="(category, index) in categories" :key="category.id">
                        <a href="javascript:void(0)" class="sub-link" @click="selectCategory(category.name)">{{category.name}}</a>
                    </div>
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
                            <div v-for="(product, index) in paginatedProducts" :key="product.id">

                                <div class="text-start p-3">
                                    <div class="border rounded-2 overflow-hidden product">
                                        <div class="mb-3 overflow-hidden">
                                            <img :src="'/storage/media/image/' + product.avatar" class="img-fluid product-image-hover" alt="product-1">
                                        </div>
                                        <div class="fw-bold ps-3">
                                            {{product.name}} { <span v-if="product.category_info != null"> {{ product.category_info.name }} </span> }
                                        </div>
                                        <div class="text-secondary pb-3 pt-2 ps-3">
                                            {{product.price}} tk
                                        </div>
                                        <a class="btn btn-theme ms-3 mb-3" @click="addToCart(product)">
                                            <i class="bi bi-cart"></i> <span class="text-des"> Cart </span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <div class="d-flex justify-content-between align-items-center" v-if="paginatedProducts.length > 0 && loading === false">

                        <div class="d-flex align-items-center" v-if="products.length > 0 && loading === false ">
                            <button type="button" class="btn btn-light border me-2" @click="PrevPage" :disabled="currentPage === 1">
                                Prev
                            </button>
                            <span class="btn btn-light disabled border"> {{ currentPage }} </span>
                            <button type="button" class="btn btn-light border ms-2" @click="NextPage" :disabled="currentPage === total_pages">Next</button>
                        </div>

                        <div class="fw-bold">
                            Total Pages: {{ total_pages }}
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

        paginatedProducts() {
            const startIndex = (this.currentPage - 1) * this.perPage;
            const endIndex = startIndex + this.perPage;
            return this.filteredProducts.slice(startIndex, endIndex);
        },

        filteredProducts() {
            if (!this.selectedCategory) {
                return this.products;
            }
            return this.products.filter((product) =>
                product.category_info && product.category_info.name === this.selectedCategory
            );
        },

    },

    data(){

        return{

            loading: false,
            products: [],
            categories: [],
            cart: [],
            isActiveSidebar: false,
            selectedCategory: null,
            searchTimeout: null,
            error: null,
            currentPage: 1,
            perPage: 10,
            total_pages: 1,

        }

    },

    mounted() {

        this.category_list();

        this.product_list();

    },

    methods: {

        showAllProducts() {
            this.selectedCategory = null;
        },
        selectCategory(categoryName) {
            this.selectedCategory = categoryName;
        },
        sidebarController() {
            this.isActiveSidebar = !this.isActiveSidebar;
        },
        addToCart(product) {
            store.dispatch('addToCart', product);
        },
        category_list() {
            this.loading = true;
            apiService.GET(apiRoutes.globalCategoryList, (res) => {
                this.loading = false;
                if (res.status === 200) {
                    this.categories = res.data.data;
                }
            });
        },
        product_list() {
            this.loading = true;
            apiService.GET(apiRoutes.globalProductList, (res) => {
                this.loading = false;
                if (res.status === 200) {
                    this.products = res.data.data;
                    this.total_pages = Math.ceil(res.data.total / this.perPage);
                    this.currentPage = res.data.current_page;
                }
            });
        },
        SearchData() {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                this.list();
            }, 500);
        },
        PrevPage() {
            if (this.currentPage > 1) {
                this.currentPage -= 1;
            }
        },
        NextPage() {
            if (this.currentPage < this.total_pages) {
                this.currentPage += 1;
            }
        },
        pageChange(page) {
            this.currentPage = page;
        },
    },

}

</script>
