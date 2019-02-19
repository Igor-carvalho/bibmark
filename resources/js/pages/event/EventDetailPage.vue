<template>
    <div id="main">
        <header v-if="isLoaded">
            <figure class="profile-banner" style="background-image: url('https://unsplash.it/975/300')">
            </figure>
            <figure class="profile-picture" style="background-image: url('http://unsplash.it/150/150')">
            </figure>
            <h1><input v-model="name" disabled > </h1><span class="btn lnr lnr-pencil" data-toggle="modal" data-target="#exampleModalCenter"></span>
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
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Change name</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input v-model="name" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button id="closeBtn" type="button" class="btn btn-secondary" data-dismiss="modal" @click="getEventDetails(eventId)">Close</button>
                        <button type="button" class="btn btn-primary" @click="allowChangeName()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end modal-->
    </div>
</template>

<script src="./EventDetailPage.js"></script>

<style scoped>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin:   150px 25px 50px;
        width: 100%;
    }

    h1 {
        display: block;
        font-size: 50px;
        margin: 25px auto 0;
        width: 975px;
    }

    h1>small {
        color: #aaaaaa;
        font-size: .5em;
    }

    header {
        box-shadow: 1px 1px 4px rgba(0,0,0,0.5);
        margin:   25px auto 50px;
        height:   300px;
        position: relative;
        /*width:    975px;*/
    }

    figure.profile-banner {
        background-position: center center;
        background-size: cover;
        top:      0;
        height: 300px;
        /*overflow: hidden;*/
        left:     0;
        position: absolute;
        width: 100%;
        z-index:  1;
    }

    figure.profile-picture {
        background-position: center center;
        background-size: cover;
        border: 5px #efefef solid;
        border-radius: 50%;
        bottom: -75px;
        box-shadow: inset 1px 1px 3px rgba(0,0,0,0.2), 1px 1px 4px rgba(0,0,0,0.3);
        height: 148px;
        left: 50px;
        position: absolute;
        width: 148px;
        z-index: 3;
    }

    header>h1 {
        bottom: -120px;
        color: #354B63;
        font-size: 40px;
        left: 50px;
        position: absolute;
        z-index: 5;
    }

    header>h1>input {
        text-decoration: none;
        border: hidden;
        background-color:transparent;
        /*max-width: 300px;*/

    }

    header>span {
        bottom: -100px;
        color: #354B63;
        font-size: 20px;
        right: 50px;
        position: absolute;
        z-index: 5;
    }
</style>