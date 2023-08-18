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
    </div>

    <!-- card body start -->
    <div class="card-body">
        <div class="card-header">
            Orders
        </div>
        <div class="card-list">
            <div class="row header-section">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 py-2">
                    Customer Name
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 py-2">
                    Product Name
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 py-2">
                    Price
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 py-2">
                    Quantity
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 py-2">
                    Total
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 py-2">
                    Status
                </div>
            </div>
            <div class="row border-bottom body-section">
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 py-2">
                    <div class="marge">Customer Name</div>
                    Customer Name
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 py-2">
                    <div class="marge">Product Name</div>
                    Product Name
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 py-2">
                    <div class="marge">Price</div>
                    Price
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 py-2">
                    <div class="marge">Quantity</div>
                    Quantity
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 py-2">
                    <div class="marge">Total</div>
                    Total
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-2 py-2">
                    <div class="marge">Status</div>
                    <a href="javascript:void(0)" class="text-decoration-none text-success bg-success-subtle py-2 px-4 rounded"> Delivered </a>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <nav>
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
                            <i class="bi bi-caret-right-fill"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- card body end -->

</template>

<script>

export default {

    data() {

        return {}

    },

    mounted() {


    },

    methods: {

    }

}

</script>
