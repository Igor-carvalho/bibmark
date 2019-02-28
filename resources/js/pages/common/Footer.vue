<template>
    <div>
        <footer class="page-footer font-small" style="background-color: black">
            <div class="container pl-3 pr-3">
                <div class="row pt-1">
                    <div class="col-md-6 mb-2  m-0 mt-1 text-sm-center text-md-left text-lg-right pt-3 text-white subscribe-text">
                        Get&nbsp;the&nbsp;latest&nbsp;on&nbsp;news,&nbsp;events&nbsp;and&nbsp;races&nbsp;from&nbsp;Bibmark.
                    </div>
                    <div class="col-md-6 pl-1 pl-sm-2 pr-sm-2">
                        <div class="row p-sm-0 email-form m-0 mt-1">
                            <input class="form-control col-md-7 col-sm-auto input-email align-content-sm-center" type="search" placeholder="E-mail" aria-label="Search">
                            <button class="btn btn-sm  ml-2 mr-2 search-btn align-content-sm-center" type="submit"><span class="search-btn-text">Search</span></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- yellow line-->
            <div class="yellow-line mt-2"></div>
            <!-- Footer Links -->
            <div class="container text-center text-md-left mt-4">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-3 mx-auto">

                        <!-- Links -->
                        <div class="pt-lg-4">
                            <img src="img/bibmark-footer-logo.svg">
                        </div>
                        <ul class="list-unstyled list-inline pt-4">
                            <li class="list-inline-item pr-1 pt-1">
                                <a href="javascript:void(0)">
                                    <img src="img/instagram-icon.svg">
                                </a>
                            </li>
                            <li class="list-inline-item pr-1 pt-1">
                                <a href="javascript:void(0)">
                                    <img src="img/fb-icon.svg">
                                </a>
                            </li>
                            <li class="list-inline-item pr-1 pt-1">
                                <a href="javascript:void(0)">
                                    <img src="img/twitter-icon.svg">
                                </a>
                            </li>
                            <li class="list-inline-item pr-1 pt-1">
                                <a href="javascript:void(0)">
                                    <img src="img/youtube-icon.svg">
                                </a>
                            </li>
                            <li class="list-inline-item pr-1 pt-1">
                                <a href="javascript:void(0)">
                                    <img src="img/snapchat-icon.svg">
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-3 mx-auto pt-3">

                        <!-- Links -->
                        <h5 class="font-weight-bold mt-3 mb-4 text-white">Company</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="javascript:void(0)" class="grey">
                                    Story
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="grey">
                                    Contact
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="grey">
                                    Press
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="grey">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="grey">
                                    Terms and Privacy
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-3 mx-auto pt-3">

                        <!-- Links -->
                        <h5 class="font-weight-bold mt-3 mb-4 text-white">Help</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="javascript:void(0)" class="grey">
                                    Sizing
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="grey">
                                    Group Orders
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="grey">
                                    Shipping & Delivery
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="grey">
                                    Contact
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none">

                    <!-- Grid column -->
                    <div class="col-md-3 mx-auto pt-3">

                        <!-- Links -->
                        <h5 class="font-weight-bold mt-3 mb-4 text-white">Collaborate</h5>

                        <ul class="list-unstyled">
                            <li>
                                <a href="javascript:void(0)" class="grey">
                                    Sponsors
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="grey">
                                    Partnerships
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="grey">
                                    Charity
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="grey">
                                    Social Responsibility
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright text-lg-left text-sm-center py-3">
                <div class="text-white font-columns-style Bibmark-Inc">©&nbsp;2019&nbsp;Bibmark,&nbsp;Inc.&nbsp;All&nbsp;Rights&nbsp;Reserved</div>
            </div>
            <!-- Copyright -->

        </footer>
    </div>
</template>

<script>
    export default {
        name: "Footer"
    }
</script>

<style scoped>
    /*footer*/

    .subscribe-text {
        font-size: calc(8px + 0.78vw);
        font-weight: 400;
        line-height: 0.54;
        color: #ffffff;
        z-index: 1;
    }

    .input-email {
        width: 446px;
        border-radius: 3px;
        margin-left: 6vw;
        background-color: #ffffff;
    }

    .search-btn {
        border-radius: 5px;
        background-color: #ffe100;
    }

    .email-form {
        width: 115%;
    }

    .search-btn-text {
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: calc(10px + 0.46vw);
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #000000;
    }

    .yellow-line {
        width: 100%;
        height: 3px;
        background-color: #fff300;
        z-index: 9;
    }

    .font-columns-style {
        font-family: "SFProDisplay", "San Francisco", sans-serif;;
        font-size: 14px;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #ffffff;
    }

    .Bibmark-Inc {
        padding-left: 15vw;
    }

    a.grey {
        color: grey;
    }

    a:hover {
        color: lightblue;
    }

    @media only screen and (min-width: 1200px) {
        .subscribe-text {
            padding-left: 150px;
        }
        .input-email {
            margin-left: 6vw;
            width: 446px;
        }

        .email-form {
            width: 120%;
        }

        .search-btn {
            width: 127px;
            display: block;
            border-radius: 5px;
            background-color: #ffe100;
        }
    }

    @media only screen and (max-width: 1119px) {
        .subscribe-text {
            padding-left: 150px;
        }
        .input-email {
            margin-left: 4vw;
            width: 446px;
        }

        .email-form {
            width: 100%;
        }

        .search-btn {
            width: 90px;
            display: block;
            border-radius: 5px;
            background-color: #ffe100;
        }
    }

    @media only screen and  (max-width: 767px) {
        .subscribe-text {
            padding-left: 0px;
        }
        .input-email {
            width: 350px;
            border-radius: 3px;
            background-color: #ffffff;
        }

        .search-btn {
            width: 127px;
            border-radius: 5px;
            background-color: #ffe100;
        }

        .email-form {
            padding-left: 5vw;
            width: 110%;
        }
    }

    @media only screen and  (max-width: 576px) {

        .subscribe-text {
            padding-bottom: 2%;
            font-size: calc(8px + 0.78vw);
            text-align: center;
            font-weight: 400;
            line-height: 0.54;
            color: #ffffff;
            z-index: 1;
        }

        .input-email {
            width: 100%;
            margin-left: 0px;
        }

        .email-form {
            width: 100%;
        }

        .search-btn {
            width: 100%;
            border-radius: 5px;
            background-color: #ffe100;
        }

        .subscribe-text {
            font-size: 12px;
            font-weight: 400;
            line-height: 0.54;
            color: #ffffff;
            z-index: 1;
        }
    }
</style>
