<template>
    <div class="container-fluid1" style="background: #ffffff">
        <div class="d-flex" id="wrapper">
            <!-- /#sidebar-wrapper -->
            <SideBar></SideBar>

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid1">
                    <div class="profile-content">
                        <h2 class="welcome">My Events</h2>
                        <h5 class="content">See events you have added for and add new events from the upcoming events
                            list.</h5>
                        <hr class="content-divider">

                        <h3 class="subtitle">My Events</h3>
                        <div class="card1">
                            <div class="card-datatable table-responsive">
                                <table id="my-event-list" class="table">
                                    <tr v-for="(myEvent, key) in myEventsList" :key="key">
                                        <td class="td-date">{{ myEvent.created_at | moment("Do MMMM, YYYY") }}</td>
                                        <td class="td-name">{{myEvent.name}}</td>
                                        <td class="td-CN">{{myEvent.confirmation_number}}</td>
                                        <td class="text-right"><img src="/img/profile/menu.png"/></td>
                                    </tr>
                                </table>
                            </div>
                        </div>


                        <h3 class="subtitle">Upcoming Events</h3>
                        <div class="card1">
                            <div class="card-datatable table-responsive">
                                <table id="upcoming-event-list" class="table">
                                    <tr v-for="(upcomingEvent, key) in upcomingEventsList" :key="key">
                                        <td class="td-date">{{ upcomingEvent.created_at | moment("Do MMMM, YYYY") }}
                                        </td>
                                        <td class="td-name">{{upcomingEvent.name}}</td>
                                        <td class="td-CN">{{upcomingEvent.confirmation_number}}</td>
                                        <td class="text-right">
                                            <button @click="$modal.show('addModal'); event_id=upcomingEvent.event_id"
                                                    class="add-btn">Add
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <modal name="addModal"
                               :draggable=true
                               :width="modalWidth"
                               :height="'auto'"
                               @before-open="beforeOpen"
                               @before-close="beforeClose">
                            <div class="modal-container">
                                <a @click="$modal.hide('addModal')" class="btn-close closemodal">&times;</a>
                                <h2 class="modal-title">Add An Event</h2>
                                <h5 class="modal-detail">To add an event you have registered for, simply add your
                                    confirmation number below.
                                    We will automatically get your Bibmark # from the event organizer to print on your
                                    apparel.</h5>

                                <div class="form-group mb-5">
                                    <label class="mb-3">Confirmation Number</label>
                                    <input v-model="confirmation_number" name="confirmation_number"
                                           class="form-control">
                                </div>

                                <div class="form-row d-flex justify-content-between float-right">
                                    <div class="d-flex align-items-center">
                                        <a class="join-cta-element d-flex justify-content-md-end" @click="submit">
                                            <img src="/img/auth/next.png" style="width: 64px; height: 64px;"/>
                                            <div class="join-cta-labels d-flex flex-column ml-4">
                                                <div class="join-cta-label-desc">Let’s go</div>
                                                <div class="join-cta-label">Submit</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </modal>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

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
                event_id: '',
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
                this.event_id = '';
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
                    axios.post('/profile/my-events/' + this.user.id, {
                        'event_id': this.event_id,
                        'confirmation_number': this.confirmation_number
                    })
                        .then(response => {
                            if (response.data.success) {
                                this.$modal.hide('addModal');
                                this.getEvents();
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

    #page-content-wrapper {
        min-width: 100vw;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }

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
        margin-top: 28px;
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

    #wrapper {
        padding-top: 59px;
    }

    @media (min-width: 768px) {
        .td-date {
            width: 200px;
        }
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
        .add-btn {
            width: 80px !important;
            height: 25px !important;
        }
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
    }

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

    .addModal {
        height: 400px !important;
        width: 825px !important;
    }

    .join-cta-element {
        padding-bottom: 35px;
        cursor: pointer;

        i {
            margin-right: 1rem;
        }

        .join-cta-labels {
            .join-cta-label-desc {
                font-family: "SFProDisplay", "San Francisco", sans-serif;
                opacity: 0.6;
                font-size: 16px;
                font-weight: 500;
                color: #000000;
            }

            .join-cta-label {
                font-family: "SFProDisplay", "San Francisco", sans-serif;
                font-size: 24px;
                font-weight: 500;
                color: #000000;
            }
        }
    }

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
</style>
