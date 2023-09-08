<template>
    <div class="cart animation-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 p-3">
                    <div class="border rounded-4 overflow-hidden mb-2 fw-bold">
                        <div class="row px-3">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">
                                <input type="checkbox" class="form-check-input shadow-none me-3">
                                Product Name
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">Price</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">Quantity</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">SubTotal</div>
                        </div>
                    </div>
                    <div class="border rounded-4 overflow-hidden mb-2 px-3">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">
                                <input type="checkbox" class="form-check-input shadow-none me-3">
                                Apple
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">$100</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">1</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">$100</div>
                        </div>
                    </div>
                    <div class="border rounded-4 overflow-hidden mb-2 px-3">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">
                                <input type="checkbox" class="form-check-input shadow-none me-3">
                                Banana
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">$100</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">1</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">$100</div>
                        </div>
                    </div>
                    <div class="border rounded-4 overflow-hidden mb-2 px-3">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">
                                <input type="checkbox" class="form-check-input shadow-none me-3">
                                Banana
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">$100</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">1</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">$100</div>
                        </div>
                    </div>
                    <div class="border rounded-4 overflow-hidden mb-2 px-3">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">
                                <input type="checkbox" class="form-check-input shadow-none me-3">
                                Banana
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">$100</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">1</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">$100</div>
                        </div>
                    </div>
                    <div class="border rounded-4 overflow-hidden mb-2 px-3">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">
                                <input type="checkbox" class="form-check-input shadow-none me-3">
                                Banana
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">$100</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">1</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">$100</div>
                        </div>
                    </div>
                    <div class="border rounded-4 overflow-hidden mb-2 px-3 fw-bold">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2"></div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2"></div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">Gross SubTotal</div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">$100</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 p-3">
                    <div class="border px-3 fw-bold rounded-4 overflow-hidden mb-2">
                        <div class="row">
                            <div class="col-6 p-2">Description</div>
                            <div class="col-6 p-2">Amount</div>
                        </div>
                    </div>
                    <div class="border px-3 rounded-4 overflow-hidden mb-2">
                        <div class="row">
                            <div class="col-6 p-2">Cost Amount</div>
                            <div class="col-6 p-2">$100</div>
                        </div>
                    </div>
                    <div class="border px-3 rounded-4 overflow-hidden mb-2">
                        <div class="row align-items-center">
                            <div class="col-6 p-2">Shipping Charge</div>
                            <div class="col-6 p-2">
                                <select class="form-select" v-model="selectedShippingOption">
                                    <option value="100">City Inside - $100</option>
                                    <option value="300">City Outside - $300</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="border px-3 rounded-4 overflow-hidden mb-2">
                        <div class="row">
                            <div class="col-6 p-2">Total Payment</div>
                            <div class="col-6 p-2">{{ totalPayment }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {

        return {

            selectedShippingOption: 100,

        };

    },
    computed: {

        totalPayment() {

            const subtotal = 100;
            const shippingCharge = parseInt(this.selectedShippingOption);
            return subtotal + shippingCharge;

        },

    },

};

</script>
