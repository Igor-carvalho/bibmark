<template>
    <div class="container-fluid1" style="background: #ffffff">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <!-- <SideBar></SideBar> -->
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid1">
                    <div class="profile-content">
                        <div class="col-10">
                            <h2 class="welcome">My Shopping Cart</h2>
                            <hr class="content-divider">
                            <div class="container">
                                <!-- <ul class="progressbar">
                                    <li >Step 1</li>
                                    <li>Step 2</li>
                                    <li>Step 3</li>
                                    <li>Step 4</li>
                                    <li>Step 5</li>
                                </ul> -->
                                <ol class="step-indicator">
                                    <li class="active">
                                        <div class="step"></div>
                                        <div class="caption hidden-xs hidden-sm">CART </div>
                                    </li>
                                    <li class="">
                                        <div class="step"></div>
                                        <div class="caption hidden-xs hidden-sm">SHIPPING </div>
                                    </li>
                                    <li class="">
                                        <div class="step"></div>
                                        <div class="caption hidden-xs hidden-sm">BILLING </div>
                                    </li>
                                    <li class="">
                                        <div class="step"></div>
                                        <div class="caption hidden-xs hidden-sm">REVIEW</div>
                                    </li>
                                    <li class="">
                                        <div class="step"></div>
                                        <div class="caption hidden-xs hidden-sm">CONFIRMATION</div>
                                    </li>
                                </ol>
                            </div>
                        </div>
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
    }

</script>

<style scoped>

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


    /* Profile Content */
    .profile-content {
        /* padding-right: 80px; */
        padding: 0 4vw;
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


    .col-10 {
        padding-right: 0;
        padding-left: 0;
    }
    /* .container{
        position: absolute;
        z-index: 1;
        margin-left: auto;
        margin-right: auto;
    }
    .progressbar li{
        float: left;
        width: 20%;
        position: relative;
        text-align: center;
    }
    .container ul > li{
        text-decoration: none;
    } */
    .step-wrapper {
    padding: 20px 0;
    display: none;
    }
    .step-wrapper.active {
    display: block;
    }

    .step-indicator {
    border-collapse: separate;
    display: table;
    margin-left: 0px;
    position: relative;
    table-layout: fixed;
    text-align: center;
    vertical-align: middle;
    padding-left: 0;
    padding-top: 20px;
    }
    .step-indicator li {
    display: table-cell;
    position: relative;
    float: none;
    padding: 0;
    width: 1%;
    }
    .step-indicator li:after {
    background-color: #ccc;
    content: "";
    display: block;
    height: 1px;
    position: absolute;
    width: 100%;
    top: 32px;
    }
    .step-indicator li:after {
    left: 50%;
    }
    .step-indicator li:last-child:after {
    display: none;
    }
    .step-indicator li.active .step {
    border-color: #4183D7;
    color: #4183D7;
    }
    .step-indicator li.active .caption {
    color: #4183D7;
    }
    .step-indicator li.complete:after {
    background-color: #87D37C;
    }
    .step-indicator li.complete .step {
    border-color: #87D37C;
    color: #87D37C;
    }
    .step-indicator li.complete .caption {
    color: #87D37C;
    }
    .step-indicator .step {
    background-color: #fff;
    border-radius: 50%;
    border: 1px solid #ccc;
    color: #ccc;
    font-size: 24px;
    line-height: 64px;
    margin: 0 auto;
    position: relative;
    width: 27px;
    height: 27px;
    z-index: 1;
    }
    .step-indicator .step:hover {
    cursor: pointer;
    }
    .step-indicator .caption {
    color: #ccc;
    padding: 11px 16px;
    }

</style>
