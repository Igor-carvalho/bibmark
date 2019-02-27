<template>
    <div class="container-fluid" style="background: #ffffff">
        <div class="d-flex justify-content-sm-center" id="wrapper">
            <form class="join-form">
                <h2 class="text-sm-center">Join Bibmark</h2>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input v-model="name" type="text" class="form-control inputElement" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input v-model="email" type="email" class="form-control inputElement" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input v-model="password" type="password" class="form-control inputElement" id="password">
                </div>

                <div class="d-flex justify-content-between">
                    <div class="button d-flex align-items-center" @click="login">
                        <i class="icon fa fa-4x fa-plus-circle"></i>
                        <div class="button-title">
                            <span>Already have an account?</span>
                            <p>Login Now</p>
                        </div>
                    </div>


                    <div class="button d-flex align-items-center" @click="submit">
                        <i class="icon fa fa-4x fa-arrow-circle-right"></i>
                        <div class="button-title">
                            <span>Let's go?</span>
                            <p>Submit</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
</template>

<script>
export default {
    name: 'AuthJoin',
    data: () => ({
        name: '',
        email: '',
        password: ''
    }),
    methods: {
        login () {
            console.log('login')
        },
        submit () {
            console.log('submit')
        }
    }
}
</script>

<style lang="scss" scoped>
.join-form {
    width: 768px;
    color: #444444;
    padding: 3.5rem 0;

    .form-group {
        margin-bottom: 3rem;
    }

    .inputElement {
        border: 0;
        border-bottom: 1px solid rgba(24, 28, 33, 0.1);
        border-radius: 0;

        &:focus {
            border-color: #26B4FF !important;
        }
    }

    .button {
        cursor: pointer;

        .icon {
            margin-right: 24px;
        }

        .button-title {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            overflow: hidden;
            line-height: 1.2;
            white-space: nowrap;
            color: #000000;
            font-weight: 500;

            span {
                font-size: 16px;
                opacity: 0.6;
            }

            p {
                font-size: 24px;
                margin: 4px 0 0 0;
            }
        }
    }
}
</style>
