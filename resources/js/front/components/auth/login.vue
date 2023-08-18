<template>

    <div class="authentication">

        <div class="container">

            <div class="vh-100 row justify-content-center align-items-center p-3">

                <form action="" method="post" class="border col-12 col-sm-8 col-md-6 col-lg-7 p-3 rounded-4 bg-white shadow">

                    <div class="form-group fw-bold h4">

                        Welcome to your account

                    </div>

                    <div class="form-group">

                        <label for="" class="form-label">Email</label>

                        <input type="text" name="" class="form-control" required>

                    </div>

                    <div class="form-group">

                        <label for="" class="form-label">Password</label>

                        <input type="password" name="" class="form-control" required>

                    </div>

                    <div class="form-group">

                        <div class="row align-items-center">

                            <div class="col-sm-6">

                                <button type="submit" name="" class="btn btn-theme">

                                    Login

                                </button>

                            </div>

                            <div class="col-sm-6 text-sm-end py-3">

                                <router-link :to="{name:'forget'}" class="text-decoration-none text-danger">Forget password?</router-link>

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        Don't have an account

                        <router-link :to="{name:'registration'}" class="text-decoration-none text-info">

                            Registration

                        </router-link>

                    </div>

                </form>

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
