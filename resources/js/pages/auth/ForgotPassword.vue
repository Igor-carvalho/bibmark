<template>
    <div class="auth-forgot-password">
        <div class="container auth-forgot-password-container">
            <form class="auth-forgot-password-form">
                <div class="form-title text-center">
                    Forgot Password
                </div>
                <div class="form-sub-title text-center mb-5">
                    Don’t worry, we got your back!
                </div>
                <div class="form-group mb-5">
                    <label for="login-email mb-3">Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <a class="login-cta-element d-flex justify-content-md-end">
                            <img src="img/auth/next.png" style="width: 64px; height: 64px;" />
                            <div class="login-cta-labels d-flex flex-column ml-4">
                                <div class="login-cta-label-desc">Let’s reset it</div>
                                <div class="login-cta-label">Submit</div>
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
    .auth-forgot-password {
        background: white;
        padding: 94px 0;
        min-height: 1000px;
    }
    .auth-forgot-password-container {
        max-width: 768px;
    }
    .auth-forgot-password-form {
        .form-title {
            font-family: SFProDisplay;
            font-size: 42px;
            font-weight: bold;
            color: #444444;
        }
        .form-sub-title {
            font-family: SFProText;
            font-size: 18px;
            color: black;
        }
        .form-group {
            label {
                color: #444444;
                font-family: HelveticaNeue;
                font-size: 18px;
                font-weight: bold;
            }
            input[type=email] {
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