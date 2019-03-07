<template>
    <nav class="navbar navbar-expand-md Rectangle w-100" style="">
        <a class="navbar-brand" href="#"><img src="/img/bibmark-logo.svg"  class="logo" ></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"><i class="fa fa-bars" style="font-size:24px; margin-top: -5px; margin-left: -3px;" aria-hidden="true"></i></span>
        </button>
        <div class="collapse navbar-collapse align-self-center" id="collapsibleNavbar">
            <div class="d-flex justify-content-between w-100">
                <ul class="navbar-nav">
                    <li class="nav-item default-space">
                        <a class="nav-link black" href="#">THE&nbsp;TECH</a>
                    </li>
                    <li class="nav-item default-space">
                        <a class="nav-link black" href="#">APPAREL</a>
                    </li>
                    <li class="nav-item default-space">
                        <a class="nav-link black" href="#">DESIGN</a>
                    </li>
                    <li class="nav-item default-space">
                        <a class="nav-link black" href="#">SPONSORS</a>
                    </li>
                    <li class="nav-item default-space">
                        <a class="nav-link black" href="#">RACES</a>
                    </li>
                    <li class="nav-item default-space">
                        <a class="nav-link black" href="#">CHARITY</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-2">
                    <li class="nav-item" v-if="!authenticated">
                        <a class="nav-link black" href="/join">JOIN</a>
                    </li>
                    <li class="nav-item" v-if="!authenticated">
                        <a class="nav-link black" href="/login">LOG&nbsp;IN</a>
                    </li>
                    <li class="nav-item" v-if="authenticated">
                        <a class="nav-link black" href="/doLogout">LOGOUT</a>
                    </li>
                    <li class="nav-item">
                        <a href="/cart" class="nav-link shopping-cart-icon pt-2"><img src="/img/shopping-cart-icon.svg" ></a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</template>

<script>
    export default {
        name: "Header",
        data() {
            return {
                authenticated: Laravel.user.authenticated
            };
        },
        mounted() {

        }
    }
</script>

<style scoped>
    /* font */

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

    /* navbar */
    .Rectangle {
        max-width: 100%;
        min-height: 113px;
        background-color: #ffffff;
        padding: 0 4vw;
        align-items: center;
        display: flex;
        /*box-shadow: 0 2px 5px 0 rgba(0,0,0,0.1);*/
    }

    .nav-link {
        /*padding: 1.625rem 0.5vw;*/
        position: relative;
        opacity: 0.9;
        font-family: SFProText;
        font-size: calc(8px + 0.41vw);
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: calc(1px + 0.05vw);
        color: #000000;
    }
    .navbar-nav {
        margin-left: 110px;
    }

    .nav-item {
        display: flex;
        align-items: center;
    }

    .default-space {
        padding-right: 3rem !important;
    }

    .logo {
        width: 15vw;
    }

    .navbar-brand {
        margin-left: 1rem !important;
        margin-right: 0rem !important;
    }

    @media (max-width: 767px) {
        .logo {
            width: 97%;
        }
        .Rectangle {
            min-height: auto;
        }
    }

    @media (max-width: 1150px) {
        .default-space {
            padding-left: 0;
        }
        .shopping-cart-icon>img {
            width: 5vw;
            margin-left: -16px;
        }
        .navbar-expand-md .navbar-nav .nav-link {
            padding-right: 0.5rem !important;
            padding-left: 0.5rem !important;
        }
        .Rectangle {
            padding: 0px;
        }
        .default-space[data-v-7abe1f90] {
            padding-right: 1rem !important;
        }
        .navbar-nav[data-v-7abe1f90] {
            margin-left: 2rem !important;
        }
    }

</style>
