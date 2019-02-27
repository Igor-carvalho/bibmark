<template>
    <div class="main-field">

        <!-- start section 1 slider -->
        <div style="width: 100vw">
            <home-slider></home-slider>
        </div>
        <!-- end section 1 slider -->

        <!-- section 2 placeholder -->
        <div class="placeholder-text default-text-style">Technology x Design x Sponsorship</div>
        <div>
            <img src="img/place-holder-image.jpg" class="w-100">
            <!--<div class="chicagofire">-->
            <!--&lt;!&ndash; place to background image &ndash;&gt;-->
            <!--</div>-->
            <!--<div class="boston-marathon-bib">-->
            <!--&lt;!&ndash; place to label image &ndash;&gt;-->
            <!--</div>-->
        </div>
        <!--end section 2 placeholder -->

        <!-- section 3 banner-->
        <div class="bibmark-banner">
            <!-- png -->
            <div class="image-banner" ></div>
            <div class="banner-text default-text-style">
                <span class="banner-text-bold">Let’s go:&nbsp;</span>
                Design custom performance gear, get sponsored & never have to wear a race bib again.
            </div>
        </div>
        <!-- end section 3 banner-->

        <!-- section 4 carousel-->
        <div class="default-text-style py-xl-5">
            <div class="section-carousel-main-text pt-2">
                Start Designing
                <div class="section-carousel-subtext pt-xl-4 pt-2">
                Choose your product and start designing your very own Bibmark today!
            </div>
            </div>
            <div class="gradient-carousel" style="position: relative; padding-top: 5%; width: 100vw">
                <slick
                        ref="slick"
                        :options="slickOptions"
                >
                    <a href="javascript:void(0)">
                        <img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/2EA0180A-AD65-4917-B33D-515A98A6C317.png" class="w-100" alt="">
                    </a>
                    <a href="javascript:void(0)">
                        <img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/4D841575-F952-4E1D-AFE1-B6DDF0B7D071.png" class="w-100" alt="">
                    </a>
                    <a href="javascript:void(0)">
                        <img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/3D89C00B-0323-46A1-A829-6B4C03D0AC8C.png" class="w-100" alt="">
                    </a>
                    <a href="javascript:void(0)">
                        <img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/42BC15C9-D51F-4A8A-BB26-BA6ABF12957C.png" class="w-100" alt="">
                    </a>
                    <a href="javascript:void(0)">
                        <img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/2EA0180A-AD65-4917-B33D-515A98A6C317.png" class="w-100" alt="">
                    </a>
                    <a href="javascript:void(0)">
                        <img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/4D841575-F952-4E1D-AFE1-B6DDF0B7D071.png" class="w-100" alt="">
                    </a>
                    <a href="javascript:void(0)">
                        <img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/3D89C00B-0323-46A1-A829-6B4C03D0AC8C.png" class="w-100" alt="">
                    </a>
                    <a href="javascript:void(0)">
                        <img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/42BC15C9-D51F-4A8A-BB26-BA6ABF12957C.png" class="w-100" alt="">
                    </a>
                </slick>
                <div class="btn carousel-buttons prev-slide" @click="prev()">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="btn carousel-buttons next-slide" @click="next()">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>
        <!-- end section 4 carousel-->
    </div>
</template>

<script>
    import Slick from 'vue-slick';
    export default {
        name: "Home",
        components: { Slick },

        data() {
            return {
                slickOptions: {
                    infinite: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerPadding   : '20%',
                    arrows: false,
                    centerMode: true,
                    focusOnSelect: true,
                    // Any other options that can be got from plugin documentation
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 2,
                                centerPadding   : '160px',
                                slidesToScroll: 1
                            }
                        },

                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 639,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        },
                    ],
                },
            };
        },

        // All slick methods can be used too, example here
        methods: {
            next() {
                this.$refs.slick.next();
            },

            prev() {
                this.$refs.slick.prev();
            },

            reInit() {
                // Helpful if you have to deal with v-for to update dynamic lists
                this.$nextTick(() => {
                    this.$refs.slick.reSlick();
                });
            },

            // Events listeners
            handleAfterChange(event, slick, currentSlide) {
                console.log('handleAfterChange', event, slick, currentSlide);
            },

            handleBeforeChange(event, slick, currentSlide, nextSlide) {
                console.log('handleBeforeChange', event, slick, currentSlide, nextSlide);
            },

            handleBreakpoint(event, slick, breakpoint) {
                console.log('handleBreakpoint', event, slick, breakpoint);
            },

            handleDestroy(event, slick) {
                console.log('handleDestroy', event, slick);
            },

            handleEdge(event, slick, direction) {
                console.log('handleEdge', event, slick, direction);
            },

            handleInit(event, slick) {
                console.log('handleInit', event, slick);
            },

            handleReInit(event, slick) {
                console.log('handleReInit', event, slick);
            },

            handleSetPosition(event, slick) {
                console.log('handleSetPosition', event, slick);
            },

            handleSwipe(event, slick, direction) {
                console.log('handleSwipe', event, slick, direction);
            },

            handleLazyLoaded(event, slick, image, imageSource) {
                console.log('handleLazyLoaded', event, slick, image, imageSource);
            },

            handleLazeLoadError(event, slick, image, imageSource) {
                console.log('handleLazeLoadError', event, slick, image, imageSource);
            },
        },

    }
</script>

<style scoped>

    .main-field {
        width: 100vw;
        margin: 0 auto;
        background-color: white;
    }

    /* section 2 placeholder */
    .placeholder-text {
        color: #444444;
        margin-top: 5.7%;
        text-align: center;
        font-size: calc(12px + 1.55vw);/*42px*/
    }

    .chicagofire {
        top: 8.03%;
        height: auto;
        left: 14.78vw;
        width: 30.03vw;
        position: absolute;
    }

    .boston-marathon-bib {
        top: 32%;
        height: auto;
        left: 22.55vw;
        width: 10.05vw;
        position: absolute;
    }

    /*section 3 banner*/
    .bibmark-banner {
        width: 100vw;
        position: relative;
    }

    .bibmark-banner .image-banner {
        z-index: 3;
        height: 50vw;
        background-size: cover;
        background-position: center center;
        background-image: url('https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/DCBBCBC8-6341-4DB8-861B-45A66241117D.png');
    }

    .bibmark-banner .banner-text {
        top: 27%;
        z-index: 1;
        width: 50vw;
        height: 4.7%;
        left: 40.78vw;
        color: #ffffff;
        font-weight: 300;
        position: absolute;
        font-size: calc(8px + 2.44vw);
    }

    .banner-text .banner-text-bold {
        font-weight: 900;
        font-size: calc(10px + 2.65vw);
    }

    /*fontstyle*/
    .default-text-style {
        font-style: normal;
        line-height: normal;
        font-stretch: normal;
        letter-spacing: normal;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
    }
    /*section 4*/
    .section-carousel-main-text {
        color: #444444;
        font-weight: bold;
        text-align: center;
        font-size: calc(12px + 1.56vw);
    }

    .section-carousel-subtext {
        color: #000000;
        text-align: center;
        font-weight: normal;
        background-color: white;
        font-size: calc(8px + 0.52vw);
        font-family: "SFProText", "San Francisco", sans-serif;
    }

    /*carousel*/
    .carousel-buttons {
        top: 25%;
        z-index: 9;
        width: 134px;
        height: 149px;
        color: #717171;
        font-size: 72px;
        position: absolute;
        font-weight: lighter;
        text-align: center;
    }

    .carousel-buttons + .prev-slide {
        left: 0px;
    }

    .carousel-buttons + .next-slide {
        right: 0px;
    }

    .gradient-carousel {
        position: relative;
        display: inline-block;
    }

    .gradient-carousel:before {
        z-index: 3;
        height: 85%;
        width: 100%;
        content: "";
        position: absolute;
        background: linear-gradient(to right, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 20%, rgba(255, 255, 255, 0) 80%, rgba(255, 255, 255, 1) 100%);
        /* W3C */
        background: -moz-linear-gradient(left, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 20%, rgba(255, 255, 255, 0) 80%, rgba(255, 255, 255, 1) 100%);
        /* FF3.6+ */
        background: -webkit-linear-gradient(left, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 20%, rgba(255, 255, 255, 0) 80%, rgba(255, 255, 255, 1) 100%);
        /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(left, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 20%, rgba(255, 255, 255, 0) 80%, rgba(255, 255, 255, 1) 100%);
        /* Opera 11.10+ */
        background: -ms-linear-gradient(left, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0) 20%, rgba(255, 255, 255, 0) 80%, rgba(255, 255, 255, 1) 100%);
        /* IE10+ */
        background: -webkit-gradient(linear, left top, right top, color-stop(0%, rgba(255, 255, 255, 1)), color-stop(20%, rgba(255, 255, 255, 0)), color-stop(80%, rgba(255, 255, 255, 0)), color-stop(100%, rgba(255, 255, 255, 1)));
        /* Chrome,Safari4+ */
    }

</style>