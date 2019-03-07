<template>
    <div id="container-fluid1" style="background: #ffffff">
        <div class="d-flex" id="wrapper">
            <!-- /#sidebar -->
            <SideBar></SideBar>

            <!-- Page Content -->
            <div id="my-event-page-content-wrapper">
                <div class="container-fluid1">
                    <div class="profile-content">
                        <h2 class="welcome text-left">My Events</h2>
                        <h5 class="content text-left">See events you have added for and add new events from the upcoming events
                            list.</h5>
                        <hr class="content-divider">

                        <h3 class="subtitle text-left">My Events</h3>
                        <div class="card-events">
                            <div v-if="myEventsList.length > 0" class="card-datatable table-responsive p-0">
                                <table id="my-event-list" class="table mb-0">
                                    <tr v-for="(myEvent, key) in myEventsList" :key="key">
                                        <td class="td-date px-0 text-left">{{ myEvent.event_date | moment("Do MMMM, YYYY") }}</td>
                                        <td class="td-name">{{myEvent.name}}</td>
                                        <td class="td-CN">{{myEvent.confirmation_number}}</td>
                                        <td class="td-btn text-right"><img src="/img/profile/menu.png"/></td>
                                    </tr>
                                </table>
                            </div>
                            <div v-else class="my-lg-3 no-results text-left">There are no events you have registered to yet.</div>
                        </div>

                        <h3 class="subtitle text-left">Upcoming Events</h3>
                        <div class="card-events">
                            <div v-if="upcomingEventsList.length > 0" class="card-datatable table-responsive p-0">
                                <table id="upcoming-event-list" class="table">
                                    <tr v-for="(upcomingEvent, key) in upcomingEventsList" :key="key">
                                        <td class="td-date px-0 text-left">{{ upcomingEvent.event_date | moment("Do MMMM, YYYY") }}
                                        </td>
                                        <td class="td-name">{{upcomingEvent.name}}</td>
                                        <td class="td-CN">{{upcomingEvent.confirmation_number}}</td>
                                        <td class="td-btn text-right">
                                            <button v-if="!upcomingEvent.confirmation_number" class="add-btn"
                                                    @click="$modal.show('addModal'); seleted_id=upcomingEvent.id">
                                                Register
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div v-else class="my-lg-3 no-results text-left">There are no upcoming events at the moment.</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#my-event-page-content-wrapper -->

            <!--modal-->
            <modal name="addModal" id="my-events-modal"
                   :draggable=true
                   :width="modalWidth"
                   :height="'auto'"
                   @before-open="beforeOpen"
                   @before-close="beforeClose">
                <div class="modal-container">
                    <a @click="$modal.hide('addModal')" class="btn-close closemodal">&times;</a>
                    <h2 class="modal-title">Register An Event</h2>
                    <h5 class="modal-detail">To add an event you have registered for, simply add your
                        confirmation number below.
                        We will automatically get your Bibmark # from the event organizer to print on your
                        apparel.</h5>

                    <div class="form-group mb-5">
                        <label class="mb-3">Confirmation Number</label>
                        <input v-model="confirmation_number" type="number" name="confirmation_number" min="1"
                               class="form-control">
                    </div>

                    <div class="form-row d-flex justify-content-between float-right">
                        <div class="d-flex align-items-center">
                            <a class="my-events-cta-element d-flex justify-content-md-end" @click="submit">
                                <img src="/img/auth/next.png" style="width: 64px; height: 64px;"/>
                                <div class="my-events-cta-labels d-flex flex-column ml-4">
                                    <div class="my-events-cta-label-desc">Let’s go</div>
                                    <div class="my-events-cta-label">Submit</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </modal>

        </div>
        <!-- /#wrapper -->
    </div>
</template>

<script>
    import SideBar from "./SideBar";

    export default {
        name: 'My-Events',
        components: {SideBar},
        data() {
            return {
                user: Laravel.user,
                myEventsList: [],
                upcomingEventsList: [],
                confirmation_number: '',
                seleted_id: '',
                modalWidth: 825
            };
        },
        created() {
            this.getEvents();

            if (window.innerWidth < 825) {
                this.modalWidth = window.innerWidth - 40;
            }

        },
        methods: {
            beforeOpen(event) {
                this.confirmation_number = '';
            },
            beforeClose(event) {
                this.confirmation_number = '';
                this.seleted_id = '';
            },
            getEvents() {
                axios.get('/profile/my-events/' + this.user.id).then(response => {
                    if (response.data) {
                        this.myEventsList = response.data.my_events;
                        this.upcomingEventsList = response.data.upcoming_events
                    }
                }).catch(error => {
                    console.log('Error', error);
                });
            },
            submit() {
                if (this.confirmation_number) {
                    axios.post('/profile/my-events', {
                        'user_id': this.user.id,
                        'event_instance_id': this.seleted_id,
                        'confirmation_number': this.confirmation_number
                    })
                        .then(response => {
                            if (response.data.success) {
                                this.getEvents();
                                this.$modal.hide('addModal');
                            }
                        }).catch(error => {
                        console.log('Error', error);
                    });
                }
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

    #wrapper {
        padding-top: 58px;
    }

    #my-event-page-content-wrapper {
        min-width: 100vw;

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

        .subtitle {
            font-family: SFProDisplay;
            font-size: 24px;
            font-weight: bold;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            color: #444444;
            margin-top: 38px;
            margin-bottom: 30px;
        }

        .no-results {
            font-family: SFProText;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
        }

        hr.sidebar-divider {
            width: 100%;
            border-color: #cccccc;
            border-width: 2px;
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
        }
        .card-events {
            padding-bottom: 148px;

            .table td {
                vertical-align: bottom !important;
                border-top: none !important;
                border-bottom: 1px solid #f1f1f2 !important;
                font-family: SFProText;
                font-size: 18px;
                font-weight: normal;
                font-style: normal;
                font-stretch: normal;
                line-height: normal;
                letter-spacing: normal;
                color: #000000;
            }

            .add-btn {
                width: 110px;
                height: 30px;
                border-radius: 5px;
                background-color: #ffe100 !important;
                font-family: SFProText;
                font-size: 14px;
                font-weight: bold;
                font-style: normal;
                font-stretch: normal;
                line-height: normal;
                letter-spacing: normal;
                text-align: center;
                color: #000000;
                border: none;
                cursor: pointer;
            }
        }
    }

    #my-events-modal {
        .btn-close {
            font-size: 26px;
            text-decoration: none;
            position: absolute;
            right: 10px;
            top: 0;
            color: #626469;
            cursor: pointer;
        }

        .modal-container {
            padding: 35px 28px;

            .login-cta-element {
                i {
                    margin-right: 1rem;
                }
                .login-cta-labels {
                    .login-cta-label-desc {
                        font-family: SFProDisplay;
                        opacity: 0.6;
                        font-size: 16px;
                        font-weight: 500;
                        color: #000000;
                    }
                    .login-cta-label {
                        font-family: SFProDisplay;
                        font-size: 24px;
                        font-weight: 500;
                        color: #000000;
                    }
                }
            }

            .form-group {
                label {
                    color: #444444;
                    font-family: HelveticaNeue;
                    font-size: 18px;
                    font-weight: bold;
                }

                input {
                    border: 0 none;
                    border-bottom: solid 2px #cccccc;
                    border-radius: 0;
                    font-family: HelveticaNeue;
                    font-size: 18px;
                    margin-top: 0.5rem;

                    &:focus {
                        border-color: #26B4FF !important;
                        box-shadow: none !important;
                    }

                    &.is-invalid {
                        border-color: #d9534f !important;
                    }
                }

                input::-webkit-outer-spin-button,
                input::-webkit-inner-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                }

                input[type=number] {
                    -moz-appearance: textfield;
                }

                .error {
                    height: 25px;
                    margin-top: 0.25rem;

                    .invalid-feedback {
                        display: block;
                        margin: 0;
                    }
                }
            }
        }

        .modal-title {
            font-family: SFProDisplay;
            font-size: 24px;
            font-weight: bold;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            color: #444444;
            height: 40px;
        }

        .modal-detail {
            font-family: SFProText;
            font-size: 18px;
            font-weight: normal;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            color: #000000;
            margin-bottom: 30px;
        }

        .modal-subtitle {
            font-family: HelveticaNeue;
            font-size: 18px;
            font-weight: bold;
            font-style: normal;
            font-stretch: normal;
            line-height: normal;
            letter-spacing: normal;
            color: #444444;
        }
    }
    .my-events-cta-element {
        padding-bottom: 35px;
        cursor: pointer;

        i {
            margin-right: 1rem;
        }

        .my-events-cta-labels {
            .my-events-cta-label-desc {
                font-family: "SFProDisplay", "San Francisco", sans-serif;
                opacity: 0.6;
                font-size: 16px;
                font-weight: 500;
                color: #000000;
            }

            .my-events-cta-label {
                font-family: "SFProDisplay", "San Francisco", sans-serif;
                font-size: 24px;
                font-weight: 500;
                color: #000000;
            }
        }
    }


    @media (min-width: 768px) {
        .td-date {
            width: 200px;
        }
        .td-CN, .td-btn {
            width: 150px;
        }

        #my-event-page-content-wrapper {
            min-width: 0;
            width: 100%;
        }

    }

    @media (max-width: 768px) {
        #wrapper {
            display: block !important;
        }

        #my-event-page-content-wrapper {
            min-width: 0;
            width: 100%;

            .add-btn {
                width: 80px !important;
                height: 25px !important;
            }

            .profile-content {
                padding: 0px 20px !important;
                text-align: center;
            }

            .profile-usermenu ul li {
                display: flex;
                justify-content: center;
            }
        }
    }

    @media (max-width: 900px) {
        .profile-content {
            padding: 0px 20px;
        }
    }
</style>
