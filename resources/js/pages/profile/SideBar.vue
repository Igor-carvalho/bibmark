<template>
    <div id="sidebar-wrapper">
        <div class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="avatar">
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input @change="editPhoto" type='file' id="imageUpload" accept=".png, .jpg, .jpeg"/>
                        <label for="imageUpload"><i class="fa fa-pen" aria-hidden="true"></i></label>
                    </div>
                    <img v-if="photo == '' || photo == null" src=" /img/profile/profile-fit.png"
                         class="img-responsive center profile_icon"
                         alt="">
                    <div v-else class="avatar-preview">
                        <div id="imagePreview" :style="'background-image: url(' + photo + ');'">
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- USER TITLE -->
            <div class="profile-usertitle">
                <div class="profile-usertitle-name text-center">
                    {{user.firstname + ' ' + user.lastname}}
                </div>
            </div>
            <!-- END SIDEBAR USER TITLE -->
            <!-- SIDEBAR MENU -->
            <hr class="sidebar-divider">
            <div class="profile-usermenu">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" :class="{ active: isActive('/profile') }" href="/profile">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :class="{ active: isActive('/profile/my-events') }"
                           href="/profile/my-events">My Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Designs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" :class="{ active: isActive('/profile/edit-account') }"
                           href="/profile/edit-account">Edit Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/doLogout">Logout</a>
                    </li>
                </ul>
                <hr v-if="canRead" class="pt-33 sidebar-divider">
            </div>
            <!-- END MENU -->
        </div>
        <div class="dashboard-link">
            <a v-if="canRead" href="/dashboard"> Business Dashboard</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SideBar",
        data() {
            return {
                canRead: false,
                photo: null,
                user: Laravel.user,
            };
        },
        mounted() {
            this.getPermission();
            this.getPhoto();
        },
        methods: {
            getPermission() {
                axios.get('/profile/permission').then((res) => {
                    if (res.data.success) {
                        this.canRead = true;
                    } else {
                        this.canRead = false;
                    }
                });
            },
            isActive(url) {
                if (location.pathname == url) {
                    return true;
                }
                return false;
            },
            editPhoto(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                if (files && files[0]) {
                    let formData = new FormData();
                    formData.append('image', files[0]);
                    formData.append('type', 'profile');

                    axios.post('/profile/editPhoto', formData, {headers: {'Content-Type': 'multipart/form-data'}})
                        .then((res) => {
                            if (res.data.success) {
                                this.photo = res.data.url;
                            }
                        })
                        .catch((err) => {
                            console.log('FAILURE!!', err);
                        });
                }
            },
            getPhoto() {
                axios.get('/profile/getPhoto').then((res) => {
                    this.photo = res.data.url;
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
        padding-top: 58px;
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

    .avatar {
        display: flex;
        justify-content: center;
    }

    .avatar-upload {
        position: relative;
        max-width: 205px;
        .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
            input {
                display: none;
                + label {
                    font-family: 'FontAwesome';
                    color: #757575;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    width: 34px;
                    height: 34px;
                    margin-bottom: 0;
                    border-radius: 100%;
                    background: #FFFFFF;
                    border: 1px solid transparent;
                    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                    cursor: pointer;
                    font-weight: normal;
                    transition: all .2s ease-in-out;
                    &:hover {
                        background: #f1f1f1;
                        border-color: #d6d6d6;
                    }
                }
            }
        }
        .avatar-preview {
            width: 150px;
            height: 150px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
            > div {
                width: 100%;
                height: 100%;
                border-radius: 100%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
        }
    }
</style>
