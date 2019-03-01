<template>
    <div class="auth-forgot-password">
        <div class="container auth-forgot-password-container">
            <form class="auth-forgot-password-form" >
                <div class="form-title text-center">
                    Forgot Password
                </div>
                <div class="form-sub-title text-center mb-5">
                    Don’t worry, we got your back!
                </div>
                <div class="form-group mb-5">
                    <label class="mb-3">Email</label>
                    <input v-model="email" type="email" name="email" class="form-control"
                           v-validate="'required|email'" :class="{ 'is-invalid': errors.has('email') }">
                    <div class="error">
                        <div v-if="errors.has('email')" class="invalid-feedback">{{ errors.first('email') }}</div>
                        <div v-show="error" class="invalid-feedback">{{error}}</div>
                        <div v-show="msg" class="invalid-feedback">{{msg}}</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="login-cta-element d-flex justify-content-md-end">
                            <a @click="submit" class="submit_btn">
                                <img src="/img/auth/next.png" style="width: 64px; height: 64px;"/>
                                <div class="login-cta-labels d-flex flex-column ml-4">
                                    <div class="login-cta-label-desc">Let’s reset it</div>
                                    <div class="login-cta-label">Submit</div>
                                </div>
                            </a>
                        </div>
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
            email: '',
            error: '',
            msg: '',
        }),
        methods: {
            submit() {
                this.$validator.validate().then(result => {
                    if (result) {
                        axios.post('forgot-password', {email: this.email}).then((res) => {
                            if (res.data.error)
                                this.error = res.data.error;
                            else {
                                this.msg = res.data.msg;
                            }
                        })
                    }
                });
            }
        }
    }
</script>

<style lang="scss">
    .submit_btn {
        border: none;
        background-color: white;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .submit_btn:focus {
        outline: none;
    }

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
</style>
