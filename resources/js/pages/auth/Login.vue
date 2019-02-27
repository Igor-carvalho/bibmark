<template>
    <div class="auth-login">
        <div class="container auth-login-container">
            <form class="auth-login-form">
                <div class="form-title text-center mb-5">
                    Login To Bibmark
                </div>
                <div class="form-group mb-5">
                    <label for="login-email mb-3">Email</label>
                    <input type="email" class="form-control" id="login-email" aria-describedby="emailHelp" placeholder="">
                </div>
                <div class="form-group mb-5">
                    <label for="login-password mb-3">Password</label>
                    <input type="password" class="form-control" id="login-password" placeholder="">
                </div>
                <div class="form-row mb-5">
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="login-remember">
                            <label class="form-check-label" for="login-remember">Remember Password</label>
                        </div>
                    </div>
                    <div class="form-group col-md-6 text-md-right">
                        <a href="#" class="reset-password-cta">Forgot My Password</a>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <a class="login-cta-element d-flex">
                            <i class="icon fa fa-4x fa-plus-circle"></i>
                            <div class="login-cta-labels d-flex flex-column">
                                <div class="login-cta-label-desc">Don’t have an account?</div>
                                <div class="login-cta-label">Join Now</div>
                            </div>
                        </a>
                    </div>
                    <div class="form-group col-md-6">
                        <a class="login-cta-element d-flex justify-content-md-end">
                            <i class="icon fa fa-4x fa-arrow-circle-right"></i>
                            <div class="login-cta-labels d-flex flex-column">
                                <div class="login-cta-label-desc">Let’s go</div>
                                <div class="login-cta-label">Login Now</div>
                            </div>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AuthLogin',
    data: () => ({
    }),
    methods: {
    }
}
</script>

<style lang="scss">
    .auth-login {
        background: white;
        padding: 94px 0;
        min-height: 800px;
    }
    .auth-login-container {
        max-width: 768px;
    }
    .auth-login-form {
        .form-title {
            font-family: SFProDisplay;
            font-size: 42px;
            font-weight: bold;
            color: #444444;
        }
        .reset-password-cta {
            font-family: HelveticaNeue;
            font-size: 18px;
            font-weight: bold;
            color: #4a90e2;
        }
        .form-group {
            label {
                color: #444444;
                font-family: HelveticaNeue;
                font-size: 18px;
                font-weight: bold;
            }
            input[type=email], input[type=password] {
                border: 0 none;
                border-bottom: solid 2px #cccccc;
                border-radius: 0;
                font-family: HelveticaNeue;
                font-size: 18px;
                margin-top: 0.5rem;
            }
        }
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
    }
</style>