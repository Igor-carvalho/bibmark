<template>
    <div class="Home">
        <!--navbar-->
        <div style="width: 100vw">
            <navbar></navbar>
        </div>
        <!--end navbar-->

        <!-- start section 1 slider -->
        <div style="width: 100vw">
            <slider></slider>
        </div>


        <!-- end section 1 slider -->

        <!-- section 2 placeholder -->
        <!-- png -->
        <!--<div >-->
        <div class="Technology-x-Design textStyle">Technology x Design x Sponsorship</div>
        <!--</div>-->
        <div class="place-holder-image">
            <img src="img/place-holder-image.jpg" class="w-100">
            <!--<div class="chicagofire">-->
            <!--&lt;!&ndash; place to background image &ndash;&gt;-->
            <!--</div>-->
            <!--<div class="BostonMarathonBib">-->
            <!--&lt;!&ndash; place to label image &ndash;&gt;-->
            <!--</div>-->
        </div>

        <!--end section 2 placeholder -->

        <!-- section 3 banner-->
        <div class="bibmark-kaley">
            <!-- png -->
            <div class="image-banner" ></div>
            <div class="Design-cus textStyle"><span class="text-style-1">Let’s go:&nbsp;</span>Design custom performance gear, get sponsored & never have to wear a race bib again.</div>
        </div>

        <!-- end section 3 banner-->

        <!-- section 4 carousel-->
        <div class="textStyle" style="padding-top: 5%">
            <div class="Start-Designing pt-1">
                Start Designing
                <div class="Choose-your-product">
                Choose your product and start designing your very own Bibmark today!
            </div>
            </div>
            <div style="position: relative; padding-top: 5%; width: 100vw">
                <slick
                        ref="slick"
                        :options="slickOptions"
                >
                    <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/2EA0180A-AD65-4917-B33D-515A98A6C317.png" class="w-100" alt=""></a>
                    <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/4D841575-F952-4E1D-AFE1-B6DDF0B7D071.png" class="w-100" alt=""></a>
                    <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/3D89C00B-0323-46A1-A829-6B4C03D0AC8C.png" class="w-100" alt=""></a>
                    <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/42BC15C9-D51F-4A8A-BB26-BA6ABF12957C.png" class="w-100" alt=""></a>
                    <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/2EA0180A-AD65-4917-B33D-515A98A6C317.png" class="w-100" alt=""></a>
                    <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/4D841575-F952-4E1D-AFE1-B6DDF0B7D071.png" class="w-100" alt=""></a>
                    <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/3D89C00B-0323-46A1-A829-6B4C03D0AC8C.png" class="w-100" alt=""></a>
                    <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/42BC15C9-D51F-4A8A-BB26-BA6ABF12957C.png" class="w-100" alt=""></a>
                </slick>
                <div class="btn prev" @click="prev()">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="btn next" @click="next()">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>


        <!-- end section 4 carousel-->

        <!-- footer -->

        <div class="Rectangle-footer">

            <div class="Get-the-latest-on-ne textStyle">
                Get&nbsp;the&nbsp;latest&nbsp;on&nbsp;news,&nbsp;events&nbsp;and&nbsp;races&nbsp;from&nbsp;Bibmark.
            </div>
            <input class="Rectangle-4 form-control" type="search" placeholder="E-mail" aria-label="Search">
            <button class="btn Rectangle-3-Copy" type="submit"><span class="Search">Search</span></button>

            <div class="Rectangle-35"></div>
            <div class="bibmark-footer-logo">
                <img src="img/bibmark-footer-logo.svg">
            </div>

            <div class="instagram-icon">
                <a href="javascript:void(0)">
                    <img src="img/instagram-icon.svg">
                </a>
            </div>
            <div  class="fb-icon">
                <a href="javascript:void(0)">
                    <img src="img/fb-icon.svg">
                </a>
            </div>
            <div class="twitter-icon">
                <a href="javascript:void(0)">
                    <img src="img/twitter-icon.svg">
                </a>
            </div>
            <div class="youtube-icon">
                <a href="javascript:void(0)">
                    <img src="img/youtube-icon.svg">
                </a>
            </div>
            <div class="snapchat-icon">
                <a href="javascript:void(0)">
                    <img src="img/snapchat-icon.svg">
                </a>
            </div>

            <div class="Company"><a href="javascript:void(0)" class="white">Company</a></div>
            <div class="Story-Contact-Press">
                <ul style="list-style-type:none; padding-inline-start: 0px;">
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
            <div class="Help"><a href="javascript:void(0)" class="white">Help</a></div>
            <div class="Sizing-Group-Orders">
                <ul style="list-style-type:none; padding-inline-start: 0px;">
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

            <div class="Collaborate"><a href="javascript:void(0)" class="white">Collaborate</a></div>
            <div class="Sponsors-Partnership">
                <ul style="list-style-type:none; padding-inline-start: 0px;">
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

            <div class="Bibmark-Inc">©&nbsp;2019&nbsp;Bibmark,&nbsp;Inc.&nbsp;All&nbsp;Rights&nbsp;Reserved</div>

        </div>

        <!-- end footer -->

    </div>
</template>

<script>
    import Slick from 'vue-slick';
    export default {
        name: "HomePage",
        components: { Slick },

        data() {
            return {
                slickOptions: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    arrows: false,
                    centerMode: true,
                    focusOnSelect: true,
                    // Any other options that can be got from plugin documentation
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
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

    .Home {
        margin: 0 auto;
        background-color: white;
        width: 100vw;
        height: 232.55vw;
    }

    /* section 2 placeholder */
    .Technology-x-Design {
        position: relative;
        left: 29.53vw;
        top: 1.7%;
        margin-bottom: 1.8%;
        width: 42.93vw;
        height: auto;
        font-size: calc(12px + 1.55vw);/*42px*/
        text-align: center;
        color: #444444;
        /*z-index: 0;*/
    }

    .place-holder-image {
        position: relative;
        margin-bottom: 2.17%;
        top: 1.17%;
        width: 100vw;
        height: auto;
        object-fit: contain;
    }

    .chicagofire {
        position: absolute;
        left: 14.78vw;
        top: 8.03%;
        width: 30.03vw;
        height: auto;
    }

    .BostonMarathonBib {
        position: absolute;
        left: 22.55vw;
        top: 32%;
        width: 10.05vw;
        height: auto;
    }

    /*section 3 banner*/
    .bibmark-kaley {
        position: relative;
        padding-top: 1px;
        width: 100vw;
        height: auto;
        object-fit: contain;
    }

    .image-banner {
        background-image: url('https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/DCBBCBC8-6341-4DB8-861B-45A66241117D.png');
        background-position: center center;
        background-size: cover;
        z-index: 3;
        height: 50vw;
    }
    .Design-cus {
        position: absolute;
        top: 27%;
        left: 40.78vw;
        width: 50vw;
        height: 4.7%;
        font-size: calc(8px + 2.44vw);
        font-weight: 300;
        color: #ffffff;
        z-index: 1;
    }

    .Design-cus .text-style-1 {
        font-size: calc(10px + 2.65vw);
        font-weight: 900;
    }

    /*fontstyle*/
    .textStyle {
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
    }
    /*section 4*/
    .Start-Designing {
        margin-left: 29.11vw;
        padding-top: 2.1%;
        width: 40.93vw;
        font-size: calc(12px + 1.56vw);
        font-weight: bold;
        text-align: center;
        color: #444444;
    }

    .Choose-your-product {
        position: relative;
        background-color: white;
        padding-top: 2%;
        padding-left: 2.65vw;
        width: 38.28vw;
        height: auto;
        font-family: "SFProText", "San Francisco", sans-serif;
        font-size: calc(8px + 0.52vw);
        font-weight: normal;
        text-align: center;
        color: #000000;
    }

    /*carousel*/
    .prev {
        position: absolute;
        font-size: 72px;
        font-weight: lighter;
        left: 0px;
        top: 25%;
        text-align: center;
        width: 134px;
        height: 149px;
        color: #717171;
        z-index: 9;
    }

    .next {
        position: absolute;
        top: 25%;
        font-size: 72px;
        font-weight: unset;
        text-align: center;
        right: 0px;
        width: 134px;
        height: 149px;
        color: #717171;
        z-index: 9;
    }



    /*footer*/
    .Rectangle-footer {
        position: relative;
        top: 377px;
        width: 100vw;
        height: 12%;
        background-color: #000000;
    }

    .Get-the-latest-on-ne {
        position: absolute;
        left: 331px;
        top: 18px;
        width: 675px;
        height: 31px;
        padding-top: 5px;
        font-size: 23px;
        font-weight: 400;
        line-height: 0.54;
        color: #ffffff;
        z-index: 1;
    }

    .Rectangle-4 {
        padding-left: 20px;
        position: absolute;
        left: 994px;
        top: 8px;
        width: 446.6px;
        height: 40px;
        border-radius: 3px;
        /*box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.07);*/
        background-color: #ffffff;
    }

    .Rectangle-3-Copy {
        position: absolute;;
        left: 1455.6px;
        top: 8px;
        width: 127px;
        height: 40px;
        border-radius: 5px;
        background-color: #ffe100;
    }

    .Search {
        width: 60.5px;
        height: 20px;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 17px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #000000;
    }

    .Rectangle-35 {
        position: absolute;;
        top: 59px;
        width: 1920px;
        height: 3px;
        background-color: #fff300;
        z-index: 1;
    }

    .bibmark-footer-logo {
        position: absolute;
        left: 335px;
        top: 110px;
        width: 149px;
        height: 21px;
        object-fit: contain;
    }

    .instagram-icon {
        position: absolute;
        left: 335px;
        top: 148px;
        width: 25px;
        height: 25px;
        object-fit: contain;
    }

    .fb-icon {
        position: absolute;
        left: 366px;
        top: 148px;
        width: 24px;
        height: 25px;
        object-fit: contain;
    }

    .twitter-icon {
        position: absolute;
        left: 398px;
        top: 148px;
        width: 24px;
        height: 25px;
        object-fit: contain;
    }

    .youtube-icon {
        position: absolute;
        left: 429px;
        top: 148px;
        width: 24px;
        height: 25px;
        object-fit: contain;
    }

    .snapchat-icon {
        position: absolute;
        left: 459px;
        top: 148px;
        width: 25px;
        height: 25px;
        object-fit: contain;
    }

    .Company {
        position: absolute;
        left: 653px;
        top: 115px;
        width: 92px;
        height: 16px;
        /*background-color: #ffffff;*/
        font-family: "SFProDisplay", "San Francisco", sans-serif;;
        font-size: 14px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #ffffff;
    }

    .Story-Contact-Press {
        position: absolute;
        left: 653px;
        top: 144px;
        width: 153px;
        height: 156px;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 14px;
        font-weight: 300;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.86;
        letter-spacing: normal;
        color: #999999;
    }

    .Help {
        position: absolute;
        left: 883px;
        top: 115px;
        width: 92px;
        height: 16px;
        /*background-color: #ffffff;*/
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 14px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #ffffff;
    }

    .Sizing-Group-Orders {
        position: absolute;
        left: 883px;
        top: 144px;
        width: 153px;
        height: 104px;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 14px;
        font-weight: 300;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.86;
        letter-spacing: normal;
        color: #999999;
    }

    .Collaborate {
        position: absolute;
        left: 1113px;
        top: 115px;
        width: 92px;
        height: 16px;
        /*background-color: #ffffff;*/
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 14px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #ffffff;
    }

    .Sponsors-Partnership {
        position: absolute;
        left: 1113px;
        top: 144px;
        width: 153px;
        height: 104px;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 14px;
        font-weight: 300;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.86;
        letter-spacing: normal;
        color: #999999;
    }

    .Bibmark-Inc {
        position: absolute;
        left: 331px;
        top: 331px;
        width: 271px;
        height: 16px;
        /*background-color: #ffffff;*/
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 14px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #ffffff;
    }
    a.white {
        color: white;
    }

    a.black {
        color: black;
    }

    a.grey {
        color: grey;
    }

    a:hover {
        color: lightblue;
    }

</style>