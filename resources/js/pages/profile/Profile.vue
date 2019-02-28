<template>
    <div class="container-fluid" style="background: #ffffff">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="text-center">
                        <img src=" /img/profile/profile.png" class="img-responsive center" alt="">
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
                        <ul class="nav flex-column px-4">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">My Profile</a>
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
                                <a class="nav-link" href="#">Edit Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Logout</a>
                            </li>
                        </ul>
                        <hr class="sidebar-divider">
                        <div>
                            <h3 class="pt-2 text-center">
                                <a href="#" class="dashboard-lik"> Business Dashboard</a>
                            </h3>
                        </div>
                    </div>
                    <!-- END MENU -->
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <button type="button" id="menu-toggle" class="btn btn-warning btn-sm">
                    <span class="navbar-toggler-icon"><i style="font-size:15px" aria-hidden="true" class="fa fa-bars"></i></span>
                </button>
            <div class="container-fluid">
                <div class="profile-content">
                    <h2 class="welcome">Welcome to Bibmark</h2>
                    <h5 class="content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure tempora numquam eum quod quia.</h5>
                    <hr class="content-divider">
                </div>
            </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->
    </div>
</template>

<script src="./Profile.js">
export default {
        components : {  },
        data() {
            return {
            };
        },
        mounted(){
        }
}

</script>

<style lang="scss" scoped>

#sidebar-wrapper {
    min-height: 100vh;
    margin-left: -15rem;
    -webkit-transition: margin .25s ease-out;
    -moz-transition: margin .25s ease-out;
    -o-transition: margin .25s ease-out;
    transition: margin .25s ease-out;
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


@media (min-width: 992px) { 
    #menu-toggle{
        display: none;
    }
}

#menu-toggle{
    margin-left: 25px;
    margin-top:5px;
    }
.profile-sidebar{
    height: 100%;
    border-right: solid 2px #cccccc;
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
}

.profile-usermenu ul li a {
    font-size: 18px;
    font-weight: bold;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #444444;
}

.profile-usermenu ul li a:hover {
    background-color: #fafcfd;
    color: #ffc600;
}

.nav-item .active {
    // border-bottom: solid 2px #ffc600 !important;
}

/* Profile Content */
.profile-content {
    padding: 20px;
    background: #fff;
    min-height: 460px;
}

.welcome{
    font-size: 42px;
    font-weight: bold;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #444444;
}

.dashboard-lik{
    font-size: 18px;
    font-weight: bold;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #4a90e2;
}
hr.sidebar-divider {
    width: 70%;
    margin-top: 2rem;
    margin-bottom: 1rem;
    border-top: 1px solid #cccccc;
    border-bottom: 1px solid #cccccc;
}

hr.content-divider{
	border: 1px solid #cccccc;
}
.content{
    padding-bottom: 35px;
}

</style>
