<template>

    <div class="row justify-content-between">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">

            <!-- search from start -->
            <form class="my-2">
                <div class="position-relative">
                    <input type="search" name="" class="form-control ps-5" placeholder="Search here" v-model="formData.q" @keyup="SearchData">
                    <div class="position-absolute start-0 top-50 translate-middle-y ps-3">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </form>
            <!-- search from end -->

        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-end">

            <!-- add modal controller start -->
            <a href="javascript:void(0)" class="btn btn-theme create my-2" @click="manageModal(1, null)">
                <i class="bi bi-plus-lg me-2"></i> Add
            </a>
            <!-- add modal controller end -->

        </div>
    </div>

    <!-- card body start -->
    <div class="card-body">
        <div class="card-header">

            Categories

            <span class="d-flex align-items-center ms-3" v-if="tableData.length > 0 && loading === false && selected.length > 0">
                <a href="javascript:void(0)" class="select-icon" @click="deleteModal(1)">
                    <i class="bi bi-trash2"></i>
                </a>
                <a href="javascript:void(0)" class="ms-2 select-icon" v-if="selected.length === 1" @click="openEditModal">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </span>

        </div>

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

        <!-- no data start -->
        <div class="page-no-data-found" v-if="tableData.length === 0 && loading === false">
            <div class="w-100">
                <div class="mb-3">
                    <i class="bi bi-exclamation-circle fs-1"></i>
                </div>
                <div class="mb-3">There are no data founded.</div>
                <span>Click “Add” to create new data.</span>
            </div>
        </div>
        <!-- no data end -->

        <div class="card-list" v-if="tableData.length > 0 && loading === false">

            <div class="row header-section">
                <div class="col-12 col-sm-9 py-2">
                    <div class="d-flex">
                        <input type="checkbox" class="form-check-input me-3 d-none d-sm-block" :checked="tableData.length > 0 && tableData.length === selected.length" @change="toggleCheckAll($event)">
                        Name
                    </div>
                </div>
                <div class="col-12 col-sm-3 py-2">
                    Action
                </div>
            </div>

            <div class="row border-bottom body-section align-items-center" v-for="(each) in tableData">

                <div class="col-12 col-sm-9 py-2">
                    <div class="marge">Category Name</div>
                    <div class="d-flex align-items-center">
                        <input type="checkbox" class="form-check-input me-3 d-none d-sm-block" :checked="CheckIfChecked(each.id)" @change="toggleCheck($event,each.id)">
                        <div class="product-image border">
                            <span v-if="each.avatar === null">
                                <img class="img-fluid category-image" :src="'/images/category.svg'" alt="category.png">
                            </span>
                            <span class="w-100 h-100" v-if="each.avatar !== null">
                                <img class="img-fluid" :src="'/storage/media/image/'+each.avatar" alt="person-image">
                            </span>
                        </div>
                        {{each.name}}
                    </div>
                </div>

                <div class="col-12 col-sm-3 py-2">
                    <div class="marge">Action</div>
                    <a href="javascript:void(0)" class="text-decoration-none text-secondary me-3" @click="manageModal(1, each.id)">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="javascript:void(0)" class="text-decoration-none text-danger" @click="deleteModal(1, each.id)">
                        <i class="bi bi-trash2"></i>
                    </a>
                </div>

            </div>

        </div>

        <div class="card-footer">

            <div class="d-flex justify-content-center" v-if="tableData.length > 0 && loading === false">
                <div class="pagination">
                    <div class="page-item" @click="PrevPage">
                        <a class="page-link" href="javascript:void(0)">
                            <i class="bi bi-caret-left-fill"></i>
                        </a>
                    </div>
                    <div v-if="buttons.length <= 6" class="d-flex">
                        <div v-for="(page) in buttons" class="page-item" :class="{'active': current_page === page}">
                            <a class="page-link" @click="pageChange(page)" href="javascript:void(0)" v-text="page"></a>
                        </div>
                    </div>
                    <div v-if="buttons.length > 6" class="d-flex">
                        <div class="page-item" :class="{'active': current_page === 1}">
                            <a class="page-link" @click="pageChange(1)" href="javascript:void(0)">1</a>
                        </div>
                        <div v-if="current_page > 3" class="page-item">
                            <a class="page-link" @click="pageChange(current_page - 2)" href="javascript:void(0)">...</a>
                        </div>
                        <div v-if="current_page === buttons.length" class="page-item" :class="{'active': current_page === (current_page - 2)}">
                            <a class="page-link" @click="pageChange(current_page - 2)" href="javascript:void(0)" v-text="current_page - 2"></a>
                        </div>
                        <div v-if="current_page > 2" class="page-item" :class="{'active': current_page === (current_page - 1)}">
                            <a class="page-link" @click="pageChange(current_page - 1)" href="javascript:void(0)" v-text="current_page - 1"></a>
                        </div>
                        <div v-if="current_page !== 1 && current_page !== buttons.length" class="page-item active">
                            <a class="page-link" @click="pageChange(current_page)" href="javascript:void(0)" v-text="current_page"></a>
                        </div>
                        <div v-if="current_page < buttons.length - 1" class="page-item" :class="{'active': current_page === (current_page + 1)}">
                            <a class="page-link" @click="pageChange(current_page + 1)" href="javascript:void(0)" v-text="current_page + 1"></a>
                        </div>
                        <div v-if="current_page === 1" class="page-item" :class="{'active': current_page === (current_page + 2)}">
                            <a class="page-link" @click="pageChange(current_page + 2)" href="javascript:void(0)" v-text="current_page + 2"></a>
                        </div>
                        <div v-if="current_page < buttons.length - 2" class="page-item">
                            <a class="page-link" @click="pageChange(current_page + 2)" href="javascript:void(0)">...</a>
                        </div>
                        <div class="page-item" :class="{'active': current_page === (current_page - buttons.length)}">
                            <a class="page-link" @click="pageChange(buttons.length)" href="javascript:void(0)" v-text="buttons.length"></a>
                        </div>
                    </div>
                    <div class="page-item" @click="NextPage">
                        <a class="page-link" href="javascript:void(0)">
                            <i class="bi bi-caret-right-fill"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- card body end -->

    <!-- manage modal start -->
    <div class="modal fade" id="manageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0">
                    <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel">
                        <span v-if="categoryParam.id === ''">
                            Create Category
                        </span>
                        <span v-if="categoryParam.id !== ''">
                            Edit Category
                        </span>
                    </h1>
                    <button type="button" class="btn-close" @click="manageModal(2,'')"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="mb-3">
                            <div class="d-flex justify-content-center align-items-center">
                                <label for="file-upload">
                                    <input type="file" class="d-none" id="file-upload" @change="attachFile($event)">
                                    <span v-if="categoryParam.avatar === null" class="modal-avatar">
                                    <div class="text-center">
                                        <div class="mb-2">
                                            <i class="bi bi-card-image"></i>
                                        </div>
                                        Upload Image
                                    </div>
                                </span>
                                    <img class="img-fluid modal-avatar" v-if="categoryParam.avatar !== null" :src="'/storage/media/image/'+categoryParam.avatar" alt="profile">
                                </label>
                            </div>
                        </div>
                        <div class="error-text" v-if="error != null && error.avatar !== undefined" v-text="error.avatar[0]"></div>
                    </div>
                    <div class="mb-3">
                        <label for="category_name" class="form-label">
                            Category Name
                        </label>
                        <input type="text" id="category_name" name="category_name" class="form-control" v-model="categoryParam.name">
                        <div class="error-text" v-if="error != null && error.name !== undefined" v-text="error.name[0]"></div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-theme cancel" @click="manageModal(2,'')">
                        Close
                    </button>
                    <button type="button" class="btn btn-theme create" @click="manageCategory">
                        <span v-if="createLoading === false">
                            <span v-if="categoryParam.id === ''"> save </span> <span v-if="categoryParam.id !== ''"> Update </span>
                        </span>
                        <span v-if="createLoading === true">
                            Loading...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- manage modal end -->

    <!-- delete modal start -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-body">
                    <div class="icon-size">
                        <i class="bi bi-archive archive"></i>
                    </div>
                    <div class="delete-text">
                        Are you sure ?
                    </div>
                </div>
                <div class="modal-footer border-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-theme cancel col-5" @click="deleteModal(2,'')">Close</button>
                    <button type="button" class="btn btn-theme delete col-5" aria-label="Confirm" @click="deleteCategory" v-if="deleteLoading === false">Delete</button>
                    <button type="button" class="btn btn-theme delete col-5" v-if="deleteLoading === true">Loading...</button>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal end -->

</template>

<script>

    import apiService from "./../../services/apiServices.js";

    import apiRoutes from "./../../services/apiRoutes.js";

    export default {

        data(){

            return{

                loading: false,

                createLoading: false,

                deleteLoading: false,

                category: [],

                categoryParam: {
                    id: '',
                    name: '',
                    avatar: '',
                },

                deleteParam: {
                    ids: []
                },

                tableData: [],

                formData: {
                    limit: 10,
                    page: 1
                },

                total_pages: 0,

                current_page: 0,

                buttons: [],

                searchTimeout: null,

                error: null,

                responseData: null,

                total_data: 0,

                selected: [],

            }

        },

        mounted() {
            this.list();
        },

        methods: {

            attachFile(event) {
                let file = event.target.files[0];
                let formData = new FormData();
                formData.append("file", file)
                formData.append("media_type", 1);
                apiService.UPLOAD(apiRoutes.media, formData, (res) => {
                    event.target.value = '';
                    if (res.status === 200) {
                        this.categoryParam.avatar = res.data.file_path
                    }
                })
            },

            toggleCheckAll(e) {
                if (e.target.checked) {
                    this.tableData.forEach((v) => {
                        this.selected.push(v.id);
                    });
                } else {
                    this.selected = [];
                }
            },

            toggleCheck(e, id) {
                if (e.target.checked) {
                    this.selected.push(id);
                } else {
                    let index = this.selected.indexOf(id);
                    this.selected.splice(index, 1);
                }
            },

            CheckIfChecked(id) {
                return this.selected.map(function (id) {
                    return id
                }).indexOf(id) > -1;
            },

            openEditModal() {
                this.getSingle();
                const myModal = new bootstrap.Modal("#manageModal", {keyboard: false});
                myModal.show();
            },

            deleteCategory() {
                this.deleteLoading = true;
                this.selected.forEach((v) => {
                    this.deleteParam.ids.push(v);
                })
                apiService.POST(apiRoutes.categoryDelete, this.deleteParam, (res) => {
                    this.deleteLoading = false;
                    if (res.status === 200) {
                        this.$toast.success(res.msg, {position: "bottom-right"});
                        this.deleteModal(2, '')
                        this.list();
                        this.selected = [];
                    } else {
                        this.error = res.errors;
                    }
                })
            },

            deleteModal(type, id) {
                if (type === 1) {
                    this.deleteParam.ids.push(id)
                    const myModal = new bootstrap.Modal("#deleteModal", {keyboard: false, backdrop: 'static'});
                    myModal.show();
                } else {
                    this.selected = [];
                    this.categoryParam = { id: '', name: '', avatar: '' };
                    this.current_page = 1;
                    let myModalEl = document.getElementById('deleteModal');
                    let modal = bootstrap.Modal.getInstance(myModalEl)
                    modal.hide();
                }
            },

            manageModal(type, data = null) {
                this.error = null;
                this.categoryParam = { id: '', name: '', avatar: null };
                if (type === 1) {
                    this.getCategory();
                    if (data !== null) {
                        this.getSingle(data);
                    }
                    const myModal = new bootstrap.Modal("#manageModal", {keyboard: false, backdrop: 'static'});
                    myModal.show();
                } else {
                    const myModal = document.querySelector("#manageModal");
                    const modal = bootstrap.Modal.getInstance(myModal);
                    modal.hide();
                }
            },

            getCategory() {
                apiService.POST(apiRoutes.categoryList, '', (res) => {
                    if (res.status === 200) {
                        this.category = res.data.data
                    }
                })
            },

            manageCategory() {
                if (this.categoryParam.id) {
                    this.edit();
                } else {
                    this.create();
                }
            },

            getSingle(id = null) {
                let param = { id: '' }
                if (id != null) { param.id = id } else { param.id = this.selected[0] }
                apiService.POST(apiRoutes.categorySingle, param, (res) => {
                    if (res.status === 200) {
                        this.categoryParam = res.data;
                    } else {
                        this.error = res.errors;
                    }
                });
            },

            create() {
                this.createLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.categoryCreate, this.categoryParam, (res) => {
                    this.createLoading = false;
                    if (res.status === 200) {
                        this.$toast.success(res.msg, {position: "bottom-right"});
                        this.manageModal(2, null);
                        this.list();
                        this.selected = [];
                    } else {
                        this.error = res.errors;
                    }
                });
            },

            edit() {
                this.createLoading = true;
                this.error = null;
                apiService.POST(apiRoutes.categoryUpdate, this.categoryParam, (res) => {
                    this.createLoading = false;
                    if (res.status === 200) {
                        this.getCategory();
                        this.$toast.success(res.msg, {position: "bottom-right"});
                        this.manageModal(2, null);
                        this.list();
                        this.selected = [];
                    } else {
                        this.error = res.errors;
                    }
                });
            },

            list() {
                this.loading = true;
                this.formData.page = this.current_page;
                apiService.POST(apiRoutes.categoryList, this.formData, (res) => {
                    this.loading = false;
                    this.selected = [];
                    if (res.status === 200) {
                        this.tableData = res.data.data;
                        this.total_data = res.data.total;
                        this.total_pages = res.data.total < res.data.per_page ? 1 : Math.ceil((res.data.total / res.data.per_page));
                        this.current_page = res.data.current_page;
                        this.buttons = [...Array(this.total_pages).keys()].map((i) => i + 1);
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
                if (this.current_page > 1) {
                    this.current_page = this.current_page - 1;
                    this.list()
                }
            },

            NextPage() {
                if (this.current_page < this.total_pages) {
                    this.current_page = this.current_page + 1;
                    this.list()
                }
            },

            pageChange(page) {
                this.current_page = page;
                this.list();
            },

        }

    }

</script>
