import { createStore } from 'vuex';
export default createStore({
    state: {
        cart: []
    },
    mutations: {
        addToCart(state, product) {
            state.cart.push(product);
        }
    },
    actions: {
        addProductToCart({ commit }, product) {
            commit('addToCart', product);
        }
    },
    getters: {
        cartItemCount: state => state.cart.length,
        cartItems: state => state.cart
    }
});
