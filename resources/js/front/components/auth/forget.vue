<template>

    <div class="authentication">

        <div class="container">

            <div class="vh-100 row justify-content-center align-items-center p-3">

                <form action="" method="post" class="border col-12 col-sm-8 col-md-6 col-lg-7 p-3 rounded-4 bg-white shadow" v-if="authentication === false">

                    <div class="form-group fw-bold h4">

                        Forget Password

                    </div>

                    <div class="form-group">

                        <label for="" class="form-label">Email</label>

                        <input type="text" name="" class="form-control" required>

                    </div>

                    <div class="form-group">

                        <button type="submit" name="" class="btn btn-theme">

                            Send Code

                        </button>

                    </div>

                    <div class="form-group">

                        Are you remember Password

                        <router-link :to="{name:'login'}" class="text-decoration-none text-info">

                            Login

                        </router-link>

                    </div>

                </form>

                <form action="" method="post" class="border col-12 col-sm-8 col-md-6 col-lg-7 p-3 rounded-4 bg-white shadow" v-if="authentication === true">

                    <div class="form-group fw-bold h4">

                        Reset your account

                    </div>

                    <div class="form-group">

                        <label for="" class="form-label">Email</label>

                        <input type="text" name="" class="form-control" required>

                    </div>

                    <div class="form-group">

                        <label for="" class="form-label">Code</label>

                        <input type="text" name="" class="form-control" required>

                    </div>

                    <div class="form-group">

                        <label for="" class="form-label">New Password</label>

                        <input type="password" name="" class="form-control" required>

                    </div>

                    <div class="form-group">

                        <label for="" class="form-label">Password Confirmation</label>

                        <input type="password" name="" class="form-control" required>

                    </div>

                    <div class="form-group">

                        <button type="submit" name="" class="btn btn-theme">

                            Reset

                        </button>

                    </div>

                    <div class="form-group">

                        Are you remember Password

                        <router-link :to="{name:'login'}" class="text-decoration-none text-info">

                            Login

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

        return{

            authentication: false,

        }

    },

    mounted() {



    },

    methods: {



    }

}

</script>
