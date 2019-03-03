<template>
    <div class="container-fluid1" style="background: #ffffff">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="text-center">
                        <img src=" /img/profile/profile-fit.png" class="img-responsive center profile_icon" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name text-center">
                            AKSHAY KOLTE
                        </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR MENU -->
                    <hr class="sidebar-divider">
                    <div class="profile-usermenu">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="/profile">My Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">My Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">My Designs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">My Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/profile/edit-account">Edit Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Logout</a>
                            </li>
                        </ul>
                        <hr class="pt-33 sidebar-divider">
                    </div>
                    <!-- END MENU -->
                </div>
                <div class="dashboard-link">
                    <a href="#"> Business Dashboard</a>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid1">
                    <div class="profile-content">
                        <h2 class="welcome">Edit You Account</h2>
                        <h5 class="content">Use the fields below to update your name, email or reset your password.</h5>
                        <hr class="content-divider">
                        <div class="container auth-join-container">
                        <form class="auth-join-form">
                            <div class="form-group mb-5">
                                <label for="join-name" class="mb-3">Name</label>
                                <input v-model="name" type="text" class="form-control" id="join-name" name="name"
                                    v-validate="'required'"
                                    :class="{ 'is-invalid': errors.has('name') }">
                                <div class="error">
                                    <div v-if="errors.has('name')" class="invalid-feedback">{{ errors.first('name') }}</div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="join-email" class="mb-3">Email</label>
                                <input v-model="email" type="email" name="email" class="form-control" id="join-email"
                                    v-validate="'required|email'" :class="{ 'is-invalid': errors.has('email') }">
                                <div class="error">
                                    <div v-if="errors.has('email')" class="invalid-feedback">{{ errors.first('email') }}</div>
                                </div>
                            </div>
                            <p style="color: red; height: 25px;">{{ errorMSG }}</p>

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
                        </form>
                        <br>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Reset password</h5>
                                <h6 class="card-subtitle">
                                    To reset your password, simply click the button below.  We will send you an email with a reset link.
                                    <div class="col text-center">
                                        <a href="/password/email" class="btn btn-sm  ml-2 mr-2 reset-btn align-content-sm-center"><span class="search-btn-text">Send Me A Reset Link</span></a>
                                    </div>
                                </h6>
                                
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
    export default {
        name: 'EditAccount',
        components: {},
        data() {
            return {
                user: Laravel.user,
                email: Laravel.user.email,
                name: Laravel.user.firstname+' '+Laravel.user.lastname,
                errorMSG: ''
            };
        },
        methods: {
        submit() {
            const strings = this.name.split(" ");
            const data = {
                name: this.name,
                firstname: strings[0],
                lastname: strings[1] ? strings[1] : '',
                email: this.email
            }
            console.log(data)
            this.$validator.validate().then(valid => {
                if (valid) {
                    axios.patch('/profile/'+ this.user.id, data).then(response => {
                        // if (response.data.success === 0) {
                        // window.location = 'login';
                            
                        // }
                        console.log(response.data.message);
                        alert(response.data.message)
                    }).catch(error => {
                        if (error.response.status === 422) {
                            that.errorMSG = error.response.data.errors.email[0]
                        }
                        console.log(error.response)
                    });
                }
            });
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

    #sidebar-wrapper {
        min-height: 100vh;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out;
        border-right: solid 2px #cccccc;
    }

    #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
    }

    #sidebar-wrapper .list-group {
        width: 15rem;
    }

    #page-content-wrapper {
        min-width: 100vw;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0;
    }

    .profile-sidebar {
        padding-left: 119px;
        padding-right: 69px;
    }

    .profile-usertitle-name {
        font-size: 16px;
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: 2px;
        text-align: center;
        color: #000000;
        margin-top: 44px;
        margin-bottom: 58px;
        /*border-bottom: solid 1px #cccccc;*/
        height: 19px;
        opacity: 0.9;
        font-family: SFProDisplay;
    }

    .profile-usermenu ul li a {
        font-family: HelveticaNeue;
        font-size: 18px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #444444;
        margin: 14px 15px;
    }

    .profile-usermenu ul li a:hover {
        background-color: #fafcfd;
        color: #ffc600;
    }

    .profile-usermenu ul {
        margin-bottom: 33px;
    }

    .nav-link {
        padding: 0px;
    }

    .active {
        border-bottom: solid 2px #ffc600 !important;
        padding-bottom: 9px;
        margin-bottom: 3px !important;
        width: fit-content;
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

    .dashboard-link {
        margin-top: 34px;
        margin-left: 130px;
        margin-bottom: 275px;
        height: 22px;
        font-family: HelveticaNeue;
        font-size: 18px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        color: #4a90e2;
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

        // Edit form CSS
    .auth-join {
    background: white;
    padding: 94px 0;
    min-height: 1000px;
}

.auth-join-container {
    max-width: 723px;
}

.auth-join-form {
    .form-title {
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 42px;
        font-weight: bold;
        color: #444444;
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

    .join-cta-element {
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
    
}



@media (max-width: 768px) {
    .auth-join-container .card{
        margin-bottom: 20px;
    }
}
.auth-join-container .card{
    margin-top: 100px !important;
    border: 1px solid #cccccc !important;
    border-radius: 0 !important;
    }

.card-body {
    padding: 0.7rem !important;
}
.card-title{
    font-size: 20px;
    color: #444444;
}
.card-subtitle{
    font-size: 16px;
    color: #000000;
    margin-top: 10px;
}
.reset-btn {
    border-radius: 5px;
    background-color: #ffe100;
    margin-top: 20px;
    margin-bottom: 10px;
    font-size: 17px;
    color:#000000;
}
</style>
