<template>

    <div class="authentication">

        <div class="container">

            <div class="vh-100 row justify-content-center align-items-center p-3">

                <form action="" method="post" class="border col-12 col-sm-8 col-md-6 col-lg-7 p-3 rounded-4 bg-white shadow">

                    <div class="form-group fw-bold h4">

                        Create New account

                    </div>

                    <div class="form-group">

                        <label for="" class="form-label">Full Name</label>

                        <input type="text" name="" class="form-control" required>


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

                        <label for="" class="form-label">Password Confirmation</label>

                        <input type="password" name="" class="form-control" required>

                    </div>

                    <div class="form-group">

                        <label for="" class="form-label">Phone Number</label>

                        <input type="text" name="" class="form-control" required>

                    </div>

                    <div class="form-group">

                        <label for="" class="form-label">Address</label>

                        <input type="text" name="" class="form-control" required>

                    </div>

                    <div class="form-group">

                        <button type="submit" name="" class="btn btn-theme">

                            Registration

                        </button>

                    </div>

                    <div class="form-group">

                        Have an account

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

        return{}

    },

    mounted() {



    },

    methods: {



    }

}

</script>
