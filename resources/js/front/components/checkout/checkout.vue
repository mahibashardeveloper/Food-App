<template>

    <div class="container cart px-3">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 p-3">
                <div class="border px-2 mb-4 border-dark-subtle overflow-hidden">
                    <div class="row border-bottom fw-bold">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-3"> Name </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-3"> Price </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-3"> Quantity </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-3"> SubTotal </div>
                    </div>
                    <div class="row border-bottom" v-for="(cartItem, index) in products" :key="index">
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-3"> {{cartItem.name}} </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-3"> {{cartItem.price}} </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-3"> {{cartItem.quantity}} </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-3"> ${{ cartItem.price * cartItem.quantity }} </div>
                    </div>
                    <div class="row fw-bold" v-if="products.length >= 1">
                        <div class="col-md-9 p-3">
                            Gross SubTotal:
                        </div>
                        <div class="col-md-3 p-3">
                            ${{subTotal}}
                        </div>
                    </div>
                    <div class="empty" v-if="products.length === 0">
                        No Cart Item Added
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-4 p-3">
                <div class="border px-2 overflow-hidden border-dark-subtle mb-4">
                    <div class="row border-bottom fw-bold border-dark-subtle">
                        <div class="col-6 p-3">Description</div>
                        <div class="col-6 p-3 text-end">Amount</div>
                    </div>
                    <div class="row border-bottom border-dark-subtle">
                        <div class="col-6 p-3">Gross SubTotal</div>
                        <div class="col-6 p-3 text-end">${{subTotal}}</div>
                    </div>
                    <div class="row border-bottom border-dark-subtle">
                        <div class="col-6 p-3">Shipping Charge</div>
                        <div class="col-6 p-3 text-end">
                            {{deliveryCharge}}
                        </div>
                    </div>
                    <div class="row fw-bold">
                        <div class="col-6 p-3">Total Amount</div>
                        <div class="col-6 p-3 text-end">${{totalAmount}}</div>
                    </div>
                </div>
                <span v-if="profile_data !== null">
                    <div class="border border-dark-subtle">
                        <div class="p-3 border-bottom border-dark-subtle">
                            Name: {{profile_data.full_name}}
                        </div>
                        <div class="p-3 border-bottom border-dark-subtle">
                            Phone Number: {{profile_data.phone_number}}
                        </div>
                        <div class="p-3 text-end fw-bold">
                            <router-link :to="{name:'home'}" class="d-inline-block text-decoration-none text-secondary" v-if="products.length === 0">
                                Shopping Continue
                            </router-link>
                            <a href="javascript:void(0)" class="d-inline-block text-decoration-none text-success" v-if="products.length >= 1 && submitLoading === false" @click="checkout">
                                <i class="bi bi-arrow-right me-2"></i> Confirm Order
                            </a>
                            <a href="javascript:void(0)" class="d-inline-block text-decoration-none text-success" v-if="submitLoading === true">
                                Order Submitted SuccessFully
                            </a>
                        </div>
                    </div>
                </span>
                <span v-if="profile_data === null" class="d-block p-3 border">
                    <router-link :to="{name: 'login'}" class="d-inline-block text-decoration-none text-success">
                        <i class="bi bi-box-arrow-right me-2"></i> Sign In First
                    </router-link>
                </span>
            </div>
        </div>
    </div>

    <div class="modal fade" id="manageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" v-if="!core.UserInfo">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="btn-close shadow-none" @click="closeCheckoutModal"></button>
                </div>
                <div class="modal-body">
                    <div class="py-5 text-center fw-bold">
                        <div class="mb-4">
                            Please login first. <br>
                            After you can checkout your product. <br>
                            Into your customer portal
                        </div>
                        <router-link :to="{name: 'login'}" class="btn btn-theme" @click="closeCheckoutModal">
                            Sign In
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    import store from "../../store/index.js";

    import apiService from "../../services/apiServices.js";

    import apiRoutes from "../../services/apiRoutes.js";

    export default {

        computed: {

            products: function() { return store.state.products },

            subTotal: function () {
                const total = this.products.reduce( (prev, current) => (current.price * current.quantity) + prev, 0)
                return total;
            },

            totalAmount() {
                const subtotal = this.products.reduce((prev, current) => (current.price * current.quantity) + prev, 0);
                return subtotal + parseInt(this.deliveryCharge);
            },

        },

        data(){
            return{
                deliveryCharge: '75',
                profile_data: null,
                submitLoading: false,
                core:window.core
            }
        },

        mounted() {

            this.getCartItems();

            if(this.core.UserInfo != null){
                this.getProfile();
            }

        },

        methods: {

            openCheckoutModal(){
                const myModal = new bootstrap.Modal("#manageModal", {keyboard: false});
                myModal.show();
            },

            closeCheckoutModal(){
                const myModal = document.querySelector("#manageModal");
                const modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();
            },

            checkout() {
                if (this.core.UserInfo != null) {
                    const orderItems = [];
                    this.products.forEach(cartItem => {
                        const orderItem = {
                            name: cartItem.name,
                            price: cartItem.price,
                            quantity: cartItem.quantity,
                        };
                        orderItems.push(orderItem);
                    });
                    const formData = new FormData();
                    orderItems.forEach((orderItem, index) => {
                        for (const key in orderItem) {
                            formData.append(`orderItems[${index}][${key}]`, orderItem[key]);
                        }
                    });
                    this.submitLoading = true;
                    apiService.POST(apiRoutes.OrderCreate, { orderItems }, (res) => {
                        if (res.status === 200) {
                            this.submitLoading = false;
                            store.dispatch('clearCart');
                        } else {
                            const errorMessageElement = document.getElementById('error-message');
                            errorMessageElement.innerHTML = 'Error: Failed to create the order.';
                        }
                    });
                } else {
                    this.openCheckoutModal();
                }
            },

            getCartItems(){
                store.dispatch('getCartItems')
            },

            decrementQuantity(cartItem) {
                if (cartItem.quantity > 1) {
                    cartItem.quantity--;
                }
                this.subTotal -= cartItem.price
                store.dispatch('decrementCartItem', cartItem)
            },

            incrementQuantity(cartItem) {
                cartItem.quantity++;
                this.subTotal += cartItem.price
                store.dispatch('addToCart', cartItem)
            },

            removeFromCart(cartItem) {
                store.dispatch('removeFromCart', cartItem)
            },

            cartInfo(){
                this.isCartInfoActive = !this.isCartInfoActive;
                this.isRightSidebar = false;
            },

            getProfile() {
                this.profileDataLoading = true;
                apiService.GET(apiRoutes.profile_details, (res) => {
                    this.profileDataLoading = false;
                    if (res.status === 200) {
                        this.profile_data = res.data;
                    }
                })
            },

            logout() {
                this.logoutLoading = true;
                apiService.GET(apiRoutes.logout, (res) => {
                    this.logoutLoading = false;
                    if (res.status === 200) {
                        window.location.reload();
                    }
                })
            },

        }

    }

</script>
