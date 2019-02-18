<template>
    <div id="main">
        <header>
            <figure v-if="background_image" class="profile-banner">
                <img :src="background_image" alt="Profile banner" @click="browseExistsFileUpdate('image', accountId)"/>
                <input type="file" class="btn btn-sm btn-light" name="image" :id="'image'+accountId" ref="background_image" @change="onExistsFileChanged($event, 'background_image')" hidden>
            </figure>
            <figure v-else class="profile-banner">
                <img src="https://unsplash.it/975/300" alt="Profile banner" @click="browseExistsFileUpdate('image', accountId)" />
                <input type="file" class="btn btn-sm btn-light" name="image" :id="'image'+accountId" ref="background_image" @change="onExistsFileChanged($event, 'background_image')" hidden>
            </figure>
            <figure v-if="logo" class="profile-picture" @click="browseExistsFileUpdate('logo', accountId)"
                    :style="'background-image: url(' + logo + ')'">
                <input type="file" class="btn btn-sm btn-light" name="logo" :id="'logo'+accountId" ref="logo" @change="onExistsFileChanged($event, 'logo')" hidden>
            </figure>
            <figure v-else class="profile-picture" @click="browseExistsFileUpdate('logo', accountId)"
                    style="background-image: url('http://unsplash.it/150/150')">
                <input type="file" class="btn btn-sm btn-light" name="logo" :id="'logo'+accountId" ref="logo" @change="onExistsFileChanged($event, 'logo')" hidden>
            </figure>
            <h1><input v-model="name" disabled > </h1><span class="btn lnr lnr-pencil" @click="allowChangeName()"></span>
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

    </div>
</template>

<script src="./AccountDetailPage.js"></script>

<style scoped>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin-top: 170px;
        margin-left: 18vw;
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
        width:    975px;
    }

    figure.profile-banner {
        left:     0;
        overflow: hidden;
        position: absolute;
        top:      0;
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
        max-width: 300px;

    }

    header>span {
        bottom: -100px;
        color: #354B63;
        font-size: 20px;
        left: 350px;
        position: absolute;
        z-index: 5;
    }
</style>