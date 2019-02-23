<template>
    <div class="Home">
        <!--navbar-->

        <div class="Rectangle">
            <div class="bibmark-logo">
                <a href="#"><img src="img/bibmark-logo.svg"></a>
            </div>
            <div class="The-Tech"><a href="#" class="black">THE TECH</a></div>
            <div class="Apparel"><a href="#" class="black">APPAREL</a></div>
            <div class="DESIGN"><a href="#" class="black">DESIGN</a></div>
            <div class="SPONSORS"><a href="#" class="black">SPONSORS</a></div>
            <div class="RACES"><a href="#" class="black">RACES</a></div>
            <div class="Charity"><a href="#" class="black">CHARITY</a></div>
            <div class="Join"><a href="#" class="black">JOIN</a></div>
            <div class="Log-In"><a href="#" class="black">LOG&nbsp;IN</a></div>
            <div class="shopping-cart-icon">
                <a href="#"><img src="img/shopping-cart-icon.svg"></a>
            </div>

        </div>

        <!--end navbar-->

        <!-- start section 1 slider -->

        <slider></slider>

        <!-- end section 1 slider -->

        <!-- section 2 placeholder -->
        <!-- png -->
        <!--<div >-->
            <div class="Technology-x-Design">Technology x Design x Sponsorship</div>
        <!--</div>-->
        <div class="place-holder-image">
            <img src="img/place-holder-image.jpg">
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
            <img src="img/bibmark-kaley.png" srcset="img/bibmark-kaley@2x.png 2x" alt="banner" >
            <div class="Design-cus"><span class="text-style-1">Let’s go:&nbsp;</span>Design custom performance gear, get sponsored & never have to wear a race bib again.</div>
        </div>

        <!-- end section 3 banner-->

        <!-- section 4 carousel-->
        <div class="Start-Designing">
            Start Designing
            <div class="Choose-your-product">
                Choose your product and start designing your very own Bibmark today!
            </div>
        </div>

        <div style="position: relative; top: 300px">
        <slick
                ref="slick"
                :options="slickOptions"
                >
            <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/2EA0180A-AD65-4917-B33D-515A98A6C317.png" alt=""></a>
            <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/4D841575-F952-4E1D-AFE1-B6DDF0B7D071.png" alt=""></a>
            <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/3D89C00B-0323-46A1-A829-6B4C03D0AC8C.png" alt=""></a>
            <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/42BC15C9-D51F-4A8A-BB26-BA6ABF12957C.png" alt=""></a>
            <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/2EA0180A-AD65-4917-B33D-515A98A6C317.png" alt=""></a>
            <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/4D841575-F952-4E1D-AFE1-B6DDF0B7D071.png" alt=""></a>
            <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/3D89C00B-0323-46A1-A829-6B4C03D0AC8C.png" alt=""></a>
            <a href="javascript:void(0)"><img src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/42BC15C9-D51F-4A8A-BB26-BA6ABF12957C.png" alt=""></a>
        </slick>
            <div class="btn prev" @click="prev()">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="btn next" @click="next()">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
        <!-- end section 4 carousel-->

        <!-- footer -->

        <div class="Rectangle-footer">

                <div class="Get-the-latest-on-ne">
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
        width: 1920px;
        height: 4465px;
    }

    /* navbar */
    .Rectangle {
        width: 1918px;
        height: 113px;
        background-color: #ffffff;
    }

    .bibmark-logo {
        position: relative;
        width: 225px;
        height: 32px;
        left: 111px;
        top: 44px;
        object-fit: contain;
    }

    .The-Tech {
        position: absolute;
        left: 444px;
        top: 51px;
        width: 122px;
        height: 19px;
        opacity: 0.9;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 16px;
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: 2px;
        color: #000000;
    }

    .Apparel {
        position: absolute;
        left: 613px;
        top: 51px;
        width: 87px;
        height: 19px;
        opacity: 0.9;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 16px;
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: 2px;
        color: #000000;
    }

    .DESIGN {
        position: absolute;
        left: 776px;
        top: 51px;
        width: 74px;
        height: 19px;
        opacity: 0.9;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 16px;
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: 2px;
        color: #000000;
    }

    .SPONSORS {
        position: absolute;
        left: 931px;
        top: 51px;
        width: 108px;
        height: 19px;
        opacity: 0.9;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 16px;
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: 2px;
        color: #000000;
    }

    .RACES {
        position: absolute;
        left: 1118px;
        top: 51px;
        width: 65px;
        height: 19px;
        opacity: 0.9;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 16px;
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: 2px;
        color: #000000;
    }

    .Charity {
        position: absolute;
        left: 1259px;
        top: 51px;
        width: 101px;
        height: 19px;
        opacity: 0.9;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 16px;
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: 2px;
        color: #000000;
    }

    .Join {
        position: absolute;
        left: 1668px;
        top: 51px;
        width: 57px;
        height: 19px;
        opacity: 0.9;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 16px;
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: 2px;
        color: #000000;
    }

    .Log-In {
        position: absolute;
        left: 1731px;
        top: 51px;
        width: 63px;
        height: 19px;
        opacity: 0.9;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 16px;
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: 2px;
        color: #000000;
    }

    .shopping-cart-icon {
        position: absolute;
        left: 1797px;
        top: 28px;
        width: 64px;
        height: 64px;
        object-fit: contain;
    }


    /* section 2 placeholder */
    .Technology-x-Design {
        position: relative;
        left: 567px;
        top: 171px;
        margin-bottom: 187px;
        width: 786px;
        height: 59px;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 42px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        text-align: center;
        color: #444444;
        /*z-index: 0;*/
    }

    .place-holder-image {
        position: relative;
        margin-bottom: 97px;
        top: 97px;
        width: 1920px;
        height: 935px;
        object-fit: contain;
    }

    .chicagofire {
        left: 283.8px;
        top: 90.9px;
        width: 576.6px;
        height: 734.5px;
    }

    .BostonMarathonBib {
        left: 433px;
        top: 323px;
        width: 193px;
        height: 173px;
    }

    /*section 3 banner*/
    .bibmark-kaley {
        position: relative;
        top: 1px;
        width: 1920px;
        height: 766px;
        object-fit: contain;
    }

    .Design-cus {
        position: absolute;
        top: 240px;
        left: 783px;
        width: 960px;
        height: 210px;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 59px;
        font-weight: 300;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #ffffff;
        z-index: 1;
    }

    .Design-cus .text-style-1 {
        font-size: 63px;
        font-weight: 900;
    }

    /*section 4*/
    .Start-Designing {
        position: relative;
        left: 559px;
        top: 111px;
        width: 786px;
        height: 59px;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 42px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        text-align: center;
        color: #444444;
    }

    .Choose-your-product {
        position: relative;
        top: 15px;
        left: 51px;
        width: 735px;
        height: 21px;
        font-family: "SFProText", "San Francisco", sans-serif;
        font-size: 18px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        text-align: center;
        color: #000000;
    }

    /*carousel*/
    .prev {
        position: absolute;
        font-size: 72px;
        font-weight: lighter;
        left: 0px;
        top: 185px;
        text-align: center;
        width: 134px;
        height: 149px;
        color: #717171;
        z-index: 9;
    }

    .next {
        position: absolute;
        top: 185px;
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
        width: 1920px;
        height: 360px;
        background-color: #000000;
    }

    .Get-the-latest-on-ne {
        position: absolute;
        left: 331px;
        top: 18px;
        width: 675px;
        height: 31px;
        padding-top: 5px;
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 23px;
        font-weight: 400;
        font-style: normal;
        font-stretch: normal;
        line-height: 0.54;
        letter-spacing: normal;
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