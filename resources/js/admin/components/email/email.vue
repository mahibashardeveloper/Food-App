<template>
    <div class="email-body">
        <div class="email-sidebar" :class="{active: isEmailSidebarActive}">
            <div class="email-sidebar-header">
                <div class="email-title">
                    Email
                    <a href="javascript:void(0)" class="email-close" @click="emailSidebarController">
                        <i class="bi bi-x-lg"></i>
                    </a>
                </div>
                <form class="position-relative">
                    <input type="text" name="" class="form-control ps-5" required placeholder="Search Here">
                    <div class="position-absolute start-0 top-50 translate-middle-y ps-3">
                        <i class="bi bi-search"></i>
                    </div>
                </form>
            </div>
            <div class="email-sidebar-body">
                <a href="javascript:void(0)" class="hover">
                    Index
                </a>
                <a href="javascript:void(0)" class="hover">
                    Important
                </a>
                <a href="javascript:void(0)" class="hover">
                    Promotion
                </a>
            </div>
        </div>
        <div class="email-message">
            <div class="email-message-header">
                <div class="email-name">
                    <a href="javascript:void(0)" class="icon-controller" @click="emailSidebarController">
                        <i class="bi bi-justify-left"></i>
                    </a>
                    Index
                </div>
                <div class="email-group-btn">
                    <a href="javascript:void(0)" class="icon-take">
                        <i class="bi bi-telephone"></i>
                    </a>
                    <a href="javascript:void(0)" class="icon-take">
                        <i class="bi bi-camera-video"></i>
                    </a>
                </div>
            </div>
            <div class="email-message-body">
                <div class="email-receive"></div>
                <div class="email-visibility"></div>
            </div>
            <div class="email-message-footer">
                <div class="position-relative">
                    <input type="text" name="" placeholder="Write something" class="form-control w-100" required>
                    <div class="position-absolute end-0 top-50 translate-middle-y">
                        <a href="javascript:void(0)" class="btn btn-theme create">
                            <i class="bi bi-caret-right-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {

    data(){

        return{

            isEmailSidebarActive: false,

        }

    },

    mounted() {



    },

    methods: {

        emailSidebarController(){

            this.isEmailSidebarActive = !this.isEmailSidebarActive;

        }

    }

}

</script>
