<template>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100"
                     src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/1C243B7C-AE45-46C6-8843-3CEC9F217F0F.png"
                     alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                     src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/1C243B7C-AE45-46C6-8843-3CEC9F217F0F.png"
                     alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                     src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/1C243B7C-AE45-46C6-8843-3CEC9F217F0F.png"
                     alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                     src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/1C243B7C-AE45-46C6-8843-3CEC9F217F0F.png"
                     alt="Four slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                     src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/1C243B7C-AE45-46C6-8843-3CEC9F217F0F.png"
                     alt="Fifth slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                     src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/1C243B7C-AE45-46C6-8843-3CEC9F217F0F.png"
                     alt="Sixth slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                     src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/1C243B7C-AE45-46C6-8843-3CEC9F217F0F.png"
                     alt="Seventh slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                     src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/1C243B7C-AE45-46C6-8843-3CEC9F217F0F.png"
                     alt="Eighth slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"
                     src="https://cdn.zeplin.io/5c6d748d4074579a2d70d638/assets/1C243B7C-AE45-46C6-8843-3CEC9F217F0F.png"
                     alt="Ninth slide">
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Slider"
    }
</script>

<style scoped>
    /* section 1 slider */
    .slider-image-1 {
        position: relative;
        width: 100%;
        max-width: 1920px;
        height: 968px;
        object-fit: contain;
    }

    .carousel-indicators {
        top: 32.78vw;
        left: 95.5vw;
        width: 0.72vw;
        height: 12.39vw;
        display: block;
        margin: 10px;
        background: transparent;
        flex-direction: row;
        opacity: 0.9;
    }

    .carousel-indicators li {
        width: 0.72vw;
        height: 0.72vw;
        border: 0.15vw solid white;
        margin: 0 0 0.72vw 0;
        background: transparent;
        opacity: 0.5;
    }

    .carousel-indicators .active {
        background: white;
        opacity: 0.9;
    }

</style>