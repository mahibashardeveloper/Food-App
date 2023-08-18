<template>

    <div id="preloader">

        <img :src="'/images/loading.gif'" class="img-fluid" alt="">

    </div>

    <Header/>

    <router-view/>

    <Footer/>

</template>

<script>

import Header from "./includes/header.vue";
import Footer from "./includes/footer.vue";
export default {

    components:{

        Header,Footer

    },

    data() {

        return {  }

    },

    mounted() {

        setTimeout(() =>{

            const preloader = document.getElementById('preloader');

            setTimeout(() => {

                document.getElementById('app').removeChild(preloader)

            },1000)

        },3000);

    },

    methods: {  }

}

</script>

<style lang="scss">

    @import "resources/scss/front/style.scss";

</style>
