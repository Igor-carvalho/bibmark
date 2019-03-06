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
                        <div class="col-lg-10 col-xs-12">
                            <h2 class="welcome">My Shopping Cart</h2>
                            <hr class="content-divider">
                            <div class="container1">
                                <div class="main-step">
                                    <!-- <div class="wizard"> -->
                                        <vue-good-wizard
                                            :steps="steps"
                                            :onNext="nextClicked"
                                            :onBack="backClicked">
                                            <div slot="page1">
                                                <!-- <h4>Step 1</h4>
                                                <p>This is the CART step</p> -->
                                                <product/>
                                            </div>
                                            <div slot="page2">
                                                <h4>Step 2</h4>
                                                <p>This is the SHIPPING step</p>
                                            </div>
                                            <div slot="page3">
                                                <h4>Step 3</h4>
                                                <p>This is the BILLING step</p>
                                            </div>
                                            <div slot="page4">
                                                <h4>Step 4</h4>
                                                <p>This is the REVIEW step</p>
                                            </div>
                                            <div slot="page5">
                                                <h4>Step 5</h4>
                                                <p>This is the CONFIRMATION step</p>
                                            </div>
                                        </vue-good-wizard>
                                </div>                                
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
import GoodWizard from './Wizard.vue';
import Product from './Product.vue';
    export default {
        components: {'vue-good-wizard': GoodWizard, Product},
        name: 'cart',
        data(){
            return {
            steps: [
                {
                label: 'CART',
                slot: 'page1',
                },
                {
                label: 'SHIPPING',
                slot: 'page2',
                },
                {
                label: 'BILLING',
                slot: 'page3',
                },
                {
                label: 'REVIEW',
                slot: 'page4',
                },
                {
                label: 'CONFIRMATION',
                slot: 'page5',
                options: {
                    nextDisabled: true, // control whether next is disabled or not
                },
                }
            ],
            };
        }
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
            padding-top: 0px !important;
            padding-right: 2px !important;
            padding-bottom: 0px !important;
            padding-left: 2px !important;
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

/* Custom css */

    .main-step{
        /* max-width: 700px; */
        margin-left: auto;
        margin-right: auto;
    }

</style>
