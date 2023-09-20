<template>

    <div class="container cart-body">

        <div class="row">

            <div class="col-md-8">

                <div class="row fw-bold border">

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">

                        Picture

                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">

                        name

                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">

                        Price * Quantity

                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">

                        SubTotal

                    </div>

                </div>

                <div class="row border align-items-center" v-for="(cartItem, index) in products" :key="index">

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">

                        <img :src="'/storage/media/image/' + cartItem.avatar" class="img-fluid cart-image" alt="">

                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">

                        {{cartItem.name}}

                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2 d-flex align-items-center">

                        {{cartItem.price}} *

                        <div class="quantity">
                            <button @click="decrementQuantity(cartItem)"> <i class="bi bi-dash-lg"></i> </button>
                            <div class="qty"> {{ cartItem.quantity }} </div>
                            <button @click="incrementQuantity(cartItem)"> <i class="bi bi-plus-lg"></i> </button>
                            <button class="ms-2" @click="removeFromCart(cartItem)"> <i class="bi bi-x-lg"></i> </button>
                        </div>

                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 p-2">

                        ${{ cartItem.price * cartItem.quantity }}

                    </div>

                </div>

            </div>

            <div class="col-md-4">



            </div>

        </div>

    </div>

</template>

<script>

import store from "../../store/index.js";

export default {

    data(){

        return{

        }

    },

    computed: {

        products: function() {
            return store.state.products
        },

        subTotal: function () {
            const total = this.products.reduce( (prev, current) => (current.price * current.quantity) + prev, 0)
            return total + 25;
        }

    },

    mounted() {



    },

    methods: {

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

    }

}

</script>
