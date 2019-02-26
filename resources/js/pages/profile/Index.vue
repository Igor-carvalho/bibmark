<template>
<div class="profile">
    <!--navbar-->
        <div>
            <navbar></navbar>
        </div>
        <!--end navbar-->
    <div class="container-fluid" style="background: #ffffff">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="text-center">
					<img src=" /img/profile/profile.png" class="img-responsive center" alt="">
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
					<ul class="nav flex-column px-4">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">My Profile</a>
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
                            <a class="nav-link" href="#">Edit Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logout</a>
                        </li>
                    </ul>
                    <hr class="sidebar-divider">
                    <div>
                        <h3 class="pt-2 text-center">
                            <a href="#" class="dashboard-lik"> Business Dashboard</a>
                        </h3>
                    </div>
				</div>
				<!-- END MENU -->
			</div>
		</div>
        <!-- <div class="vertical-divider d-none d-sm-block"></div> -->
		<div class="col-md-9">
            <div class="profile-content">
			    <h2 class="welcome">Welcome to Bibmark</h2>
                <h5 class="content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure tempora numquam eum quod quia.</h5>
                <hr class="content-divider">
            </div>
		</div>
	</div>
</div>

</div>
</template>

<script src="./Profile.js"></script>

<style lang="scss" scoped>


@media (min-width: 992px) { 
    .profile-sidebar{
    height: 100%;
    border-right: solid 2px #cccccc;
    }
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
}

.profile-usermenu ul li a {
    font-size: 18px;
    font-weight: bold;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #444444;
}

.profile-usermenu ul li a:hover {
    background-color: #fafcfd;
    color: #ffc600;
}

.nav-item .active {
    // border-bottom: solid 2px #ffc600 !important;
}

/* Profile Content */
.profile-content {
    padding: 20px;
    background: #fff;
    min-height: 460px;
}

.welcome{
    font-size: 42px;
    font-weight: bold;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #444444;
}

.dashboard-lik{
    font-size: 18px;
    font-weight: bold;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #4a90e2;
}
hr.sidebar-divider {
    width: 70%;
    margin-top: 2rem;
    margin-bottom: 1rem;
    border-top: 1px solid #cccccc;
    border-bottom: 1px solid #cccccc;
}

hr.content-divider{
	border: 1px solid #cccccc;
}
.content{
    padding-bottom: 35px;
}

</style>
