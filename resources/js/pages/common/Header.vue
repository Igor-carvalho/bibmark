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
                        <a href="#" class="nav-link shopping-cart-icon pt-2"><img src="/img/shopping-cart-icon.svg" ></a>
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
    /* navbar */
    .Rectangle {
        max-width: 100%;
        min-height: 113px;
        background-color: #ffffff;
        padding: 0 4vw;
        align-items: center;
        display: flex;
        box-shadow: 0 2px 5px 0 rgba(0,0,0,0.1);
    }

    .nav-link {
        /*padding: 1.625rem 0.5vw;*/
        position: relative;
        opacity: 0.9;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: calc(8px + 0.41vw);
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: calc(1px + 0.05vw);
        color: #000000;
    }

    .nav-item {
        display: flex;
        align-items: center;
    }

    .default-space {
        padding-left: 4%;
    }

    .logo {
        width: 15vw;
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
    }

</style>
