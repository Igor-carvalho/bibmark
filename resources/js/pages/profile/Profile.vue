<template>
    <div class="container-fluid1" style="background: #ffffff">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="text-center">
                        <img src=" /img/profile/profile-fit.png" class="img-responsive center profile_icon" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name text-center">
                            AKSHAY KOLTE
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR MENU -->
                    <hr class="sidebar-divider">
                    <div class="profile-usermenu">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="/profile">My Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">My Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">My Designs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">My Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/profile/edit-account">Edit Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Logout</a>
                            </li>
                        </ul>
                        <hr v-if="canRead" class="pt-33 sidebar-divider">
                    </div>
                    <!-- END MENU -->
                </div>
                <div class="dashboard-link">
                    <a v-if="canRead" href="#"> Business Dashboard</a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid1">
                    <div class="profile-content">
                        <h2 class="welcome">Welcome to Bibmark</h2>
                        <h5 class="content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure tempora
                            numquam eum quod quia.</h5>
                        <hr class="content-divider">
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->
    </div>
</template>

<script>
    export default {
        components: {},
        data() {
            return {
                canRead: false
            };
        },
        mounted() {
            this.getPermission();
        },
        methods: {
            getPermission() {
                axios.get('/profile/permission').then((res) => {
                    if (res.data.success) {
                        this.canRead = true;
                    } else {
                        this.canRead = false;
                    }
                });
            }
        }
    }

</script>

<style lang="scss" scoped>

    @font-face {
        font-family: "HelveticaNeue";
        src: url("/fonts/HelveticaNeueCyr-Bold.eot");
        src: url("/fonts/HelveticaNeueCyr-Bold.woff") format("woff");
    }

    @font-face {
        font-family: "SFUIDisplay-Regular";
        src: url("/fonts/SFUIDisplay-Regular.ttf") format('truetype');
    }

    @font-face {
        font-family: "SFProText";
        src: url("/fonts/SFUIText-Bold.ttf") format('truetype');
    }

    @font-face {
        font-family: "SFProDisplay";
        src: url("/fonts/SourceSansPro-Bold.ttf") format('truetype');
    }

    @font-face {
        font-family: "SourceSansPro-Regular";
        src: url("/fonts/SourceSansPro-Regular.ttf") format('truetype');
    }

    #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        border-right: solid 2px #cccccc;
    }

    #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
    }

    #sidebar-wrapper .list-group {
        width: 15rem;
    }

    #page-content-wrapper {
        min-width: 100vw;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }

    .profile-sidebar {
        padding-left: 119px;
        padding-right: 69px;
    }

    .profile-usertitle-name {
        font-size: 16px;
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: 2px;
        text-align: center;
        color: #000000;
        margin-top: 44px;
        margin-bottom: 58px;
        /*border-bottom: solid 1px #cccccc;*/
        height: 19px;
        opacity: 0.9;
        font-family: SFProDisplay;
    }

    .profile-usermenu ul li a {
        font-family: HelveticaNeue;
        font-size: 18px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #444444;
        margin: 14px 15px;
    }

    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #ffc600;
    }

    .profile-usermenu ul {
        margin-bottom: 33px;
    }

    .nav-link {
        padding: 0px;
    }

    .active {
        border-bottom: solid 2px #ffc600 !important;
        padding-bottom: 9px;
        margin-bottom: 3px !important;
        width: fit-content;
    }

    /* Profile Content */
    .profile-content {
        padding-right: 80px;
        padding-left: 70px;
        background: #fff;
        min-height: 460px;
    }

    .welcome {
        font-family: SFProDisplay;
        font-size: 42px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #444444;
        margin-bottom: 16px;
    }

    .dashboard-link {
        margin-top: 34px;
        margin-left: 130px;
        margin-bottom: 275px;
        height: 22px;
        font-family: HelveticaNeue;
        font-size: 18px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #4a90e2;
    }

    hr.sidebar-divider {
        width: 100%;
        border-color: #cccccc;
        border-width: 2px;
        /*margin-top: 2rem;*/
        /*margin-bottom: 1rem;*/
        /*border-top: 1px solid #cccccc;*/
        /*border-bottom: 1px solid #cccccc;*/
    }

    hr.content-divider {
        border-top: 1px solid #cccccc;
    }

    .content {
        margin-bottom: 58px;
        font-family: SFProText;
        font-size: 18px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #000000;
    }

    #wrapper {
        padding-top: 59px;
    }

    @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
        }
    }

    @media (max-width: 768px) {
        .profile-content {
            padding: 0px 20px !important;
            text-align: center;
        }
        #wrapper {
            display: block !important;
        }
        #sidebar-wrapper {
            border: none;
            margin: 0px;
            min-height: unset;
        }
        .dashboard-link {
            margin-bottom: 100px !important;
            text-align: center;
            margin-left: 0px;
            margin-right: 0px;
        }


        .profile-usermenu ul li {
            display: flex;
            justify-content: center;
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

        #wrapper.toggled #sidebar-wrapper {

        }
        .profile-sidebar {
            padding: 0px !important;
        }
    }

    @media (max-width: 900px) {
        .profile-content {
            padding: 0px 20px;
        }
    }
</style>
