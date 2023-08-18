<template>
    <div class="chat-body">
        <div class="chat-sidebar" :class="{active: isChatSidebarActive}">
            <div class="chat-sidebar-header">
                <div class="chat-title">
                    Chat
                    <a href="javascript:void(0)" class="chat-close" @click="chatSidebarController">
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
            <div class="chat-sidebar-body">
                <div class="avatar-info">
                    <div class="d-flex align-items-center">
                        <div class="status">
                            <img :src="'/images/avatar.png'" class="avatar" alt="avatar">
                            <div class="online"></div>
                        </div>
                        <div class="name">User info name 1</div>
                    </div>
                </div>
                <div class="avatar-info">
                    <div class="d-flex align-items-center">
                        <div class="status">
                            <img :src="'/images/avatar.png'" class="avatar" alt="avatar">
                            <div class="offline"></div>
                        </div>
                        <div class="name">User info name 2</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-message">
            <div class="chat-message-header">
                <div class="chat-name">
                    <a href="javascript:void(0)" class="icon-controller" @click="chatSidebarController">
                        <i class="bi bi-justify-left"></i>
                    </a>
                    User Info
                </div>
                <div class="chat-group-btn">
                    <a href="javascript:void(0)" class="icon-take">
                        <i class="bi bi-telephone"></i>
                    </a>
                    <a href="javascript:void(0)" class="icon-take">
                        <i class="bi bi-camera-video"></i>
                    </a>
                </div>
            </div>
            <div class="chat-message-body">

            </div>
            <div class="chat-message-footer">
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

            isChatSidebarActive: false,

        }

    },

    mounted() {



    },

    methods: {

        chatSidebarController(){

            this.isChatSidebarActive = !this.isChatSidebarActive;

        }

    }

}

</script>
