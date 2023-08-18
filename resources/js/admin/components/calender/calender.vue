<template>

    <div class="row justify-content-between">

        <div class="col-12 col-sm-12 col-md-6 col-lg-6">

            <!-- search from start -->

            <form class="my-2">

                <div class="position-relative">

                    <input type="search" name="" class="form-control ps-5" placeholder="Search here" required>

                    <div class="position-absolute start-0 top-50 translate-middle-y ps-3">

                        <i class="bi bi-search"></i>

                    </div>

                </div>

            </form>

            <!-- search from end -->

        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-end">

            <!-- add modal controller start -->

            <a href="javascript:void(0)" class="btn btn-theme create my-2" @click="openManageModal">

                <i class="bi bi-plus-lg me-2"></i> Add

            </a>

            <!-- add modal controller end -->

        </div>

    </div>

    <!-- card body start -->

    <div class="card-body">

        <div class="card-header">

            Calender Schedule

        </div>

        <div class="card-list">

            <div class="row header-section">

                <div class="col-12 col-md-4 py-2">

                    <div class="d-flex">

                        Date

                    </div>

                </div>

                <div class="col-12 col-md-4 py-2">

                    Topic

                </div>

                <div class="col-12 col-md-4 py-2">

                    Action

                </div>

            </div>

            <div class="row body-section align-items-center">

                <div class="col-12 col-md-4 py-2">

                    <div class="marge"> Calender Date. </div>

                    Saturday, January 1, 2023 { 12:30 AM }

                </div>

                <div class="col-12 col-md-4 py-2">

                    <div class="marge"> Topic. </div>

                    visit online course

                </div>

                <div class="col-12 col-md-4 py-2">

                    <div class="marge"> Action. </div>

                    <a href="javascript:void(0)" class="text-decoration-none text-secondary me-3" @click="openManageModal">

                        <i class="bi bi-pencil-square"></i>

                    </a>

                    <a href="javascript:void(0)" class="text-decoration-none text-danger" @click="openDeleteModal">

                        <i class="bi bi-trash2"></i>

                    </a>

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

                        Create Calender

                    </h1>

                    <button type="button" class="btn-close" @click="closeManageModal"></button>

                </div>

                <div class="modal-body">

                    <div class="mb-3">

                        <label for="date" class="form-label">

                            Date

                        </label>

                        <input type="text" name="date" placeholder="day, month, year" id="date" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label for="time" class="form-label">

                            Time

                        </label>

                        <div class="row">

                            <div class="col-6">

                                <input type="text" name="time" placeholder="00:00" id="time" class="form-control">

                            </div>

                            <div class="col-6">

                                <select name="moment" id="time" class="form-select">

                                    <option value="0">AM</option>

                                    <option value="1">PM</option>

                                </select>

                            </div>

                        </div>

                    </div>

                    <div class="mb-3">

                        <label for="" class="form-label">

                            Topic

                        </label>

                        <input type="text" name="topic" id="topic" class="form-control">

                    </div>

                </div>

                <div class="modal-footer border-0">

                    <button type="button" class="btn btn-theme cancel" @click="closeManageModal">

                        Close

                    </button>

                    <button type="button" class="btn btn-theme create">

                        Save

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

                <div class="modal-header border-0">

                    <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel">

                        Delete Calender Info.

                    </h1>

                    <button type="button" class="btn-close" @click="closeDeleteModal"></button>

                </div>

                <div class="modal-body">

                    <div class="icon-size">

                        <i class="bi bi-archive archive"></i>

                    </div>

                    <div class="delete-text">

                        Are you sure ?

                    </div>

                </div>

                <div class="modal-footer border-0 d-flex justify-content-between">

                    <button type="button" class="btn btn-theme cancel col-5" @click="closeDeleteModal">

                        Close

                    </button>


                    <button type="button" class="btn btn-theme delete col-5">

                        Delete

                    </button>

                </div>

            </div>

        </div>

    </div>

    <!-- delete modal end -->

</template>

<script>

    export default {

        data() {

            return {

                isCalenderMenu: false,

            }

        },

        mounted() {


        },

        methods: {

            openManageModal() {

                const myModal = new bootstrap.Modal("#manageModal", {keyboard: false, backdrop: 'static'});

                myModal.show();

            },

            closeManageModal() {

                const myModal = document.querySelector("#manageModal");

                const modal = bootstrap.Modal.getInstance(myModal);

                modal.hide();

            },

            openDeleteModal() {

                const myModal = new bootstrap.Modal("#deleteModal", {keyboard: false, backdrop: 'static'});

                myModal.show();

            },

            closeDeleteModal() {

                const myModal = document.querySelector("#deleteModal");

                const modal = bootstrap.Modal.getInstance(myModal);

                modal.hide();

            },

        }

    }

</script>
