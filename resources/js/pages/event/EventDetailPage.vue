<template>
    <div id="main">
        <img :src="'https://unsplash.it/975/300'" id="dummy" style="display:none;" alt=""/>
        <header>
            <figure class="profile-banner" style="background-image: url('https://unsplash.it/975/300')">
            </figure>
            <figure class="profile-picture" style="background-image: url('http://unsplash.it/150/150')">
            </figure>
            <h1><input v-model="name" disabled></h1>
            <span class="btn lnr lnr-pencil" data-toggle="modal" data-target="#changeNameEventModal"></span>
        </header>
        <body>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Manage Assets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Manage Team</a>
            </li>
        </ul>
        </body>

        <!-- Modal -->
        <div class="modal fade" id="changeNameEventModal" tabindex="-1" role="dialog"
             aria-labelledby="changeNameEventModalTitle" aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changeNameEventModalTitle">Change name</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input v-model="name" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button id="closeBtn" type="button" class="btn btn-secondary" data-dismiss="modal"
                                @click="getEventDetails(eventId)"
                        >Close
                        </button>
                        <button type="button" class="btn btn-primary" @click="allowChangeName()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal-->
    </div>
</template>

<script src="./EventDetailPage.js"></script>

<style lang="scss" scoped>
    body {
        width: 100%;
        margin: 150px 0 50px;
        font-family: Arial, Helvetica, sans-serif;
    }

    h1 {
        width: 975px;
        display: block;
        font-size: 50px;
        margin: 25px auto 0;

        & > small {
            color: #aaaaaa;
            font-size: .5em;
        }
    }

    header {
        height: 300px;
        position: relative;
        margin: 0 auto 50px;

        & > span {
            z-index: 5;
            right: 1vw;
            bottom: -100px;
            color: #354B63;
            font-size: 20px;
            padding-right: 0;
            position: absolute;
        }

        & > h1 {
            left: 50px;
            z-index: 5;
            bottom: -120px;
            color: #354B63;
            font-size: 40px;
            position: absolute;

            & > input {
                border: hidden;
                text-decoration: none;
                background-color: transparent;
            }
        }
    }

    .profile-banner {
        top: 0;
        left: 0;
        z-index: 1;
        width: 100%;
        height: 300px;
        position: absolute;
        background-size: cover;
        background-position: center center;
    }

    .profile-picture {
        left: 50px;
        z-index: 3;
        width: 148px;
        bottom: -75px;
        height: 148px;
        position: absolute;
        border-radius: 50%;
        background-size: cover;
        border: 5px #efefef solid;
        background-position: center center;
        box-shadow: inset 1px 1px 3px rgba(0, 0, 0, 0.2), 1px 1px 4px rgba(0, 0, 0, 0.3);
    }

</style>