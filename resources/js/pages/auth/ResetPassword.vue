<template>
    <div class="auth-reset-password">
        <div class="container auth-reset-password-container">
            <form class="auth-reset-password-form" @submit.prevent="submit()">
                <div class="form-title text-center">
                    Reset Your Password
                </div>
                <div class="form-sub-title text-center mb-5">
                    Enter a new password and confirm it!
                </div>
                <div class="form-group mb-5">
                    <label>New Password</label>
                    <input v-model="password" type="password" class="form-control" name="password"
                           v-validate="{ required: true, min: 6 }"
                           :class="{ 'is-invalid':  errors.has('password') }" ref="password">
                    <div class="error">
                        <div v-if="errors.has('password')" class="invalid-feedback">{{ errors.first('password') }}</div>
                    </div>
                </div>
                <div class="form-group mb-5">
                    <label>Confirm Password</label>
                    <input v-model="confirmPassword" type="password" class="form-control" name="confirmPassword"
                           v-validate="'required|confirmed:password'"
                           :class="{ 'is-invalid':  errors.has('confirmPassword') }">
                    <div class="error">
                        <div v-if="errors.has('confirmPassword')" class="invalid-feedback">{{ errors.first('confirmPassword') }}</div>
                    </div>
                </div>
                <div class="error">
                    <div v-show="msg" class="invalid-feedback">{{msg}}</div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <a class="login-cta-element d-flex justify-content-md-end">
                            <button type="submit" class="submit_btn">
                                <img src="/img/auth/next.png" style="width: 64px; height: 64px;"/>
                                <div class="login-cta-labels d-flex flex-column ml-4">
                                    <div class="login-cta-label-desc">Let’s get you back in</div>
                                    <div class="login-cta-label">Submit New Password</div>
                                </div>
                            </button>
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
            password: '',
            confirmPassword: '',
            msg: ''
        }),

        props: ['token', 'email'],
        methods: {
            submit() {
                this.$validator.validate().then(result => {
                    if (result) {
                        axios.post('/reset-password', {
                            token: this.token,
                            email: this.email,
                            password: this.password
                        }).then((res) => {
                            // this.msg = res.data.msg;
                            if (res.data.success == true) {
                                window.location.href = '/login';
                            }
                        })
                    }
                });
            }
        }
    }
</script>

<style lang="scss">
    .validate_error {
        color:#d9534f;
        font-size: 14px;
        height: 25px;
        margin-top: 0.25rem;
    }
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

    .auth-reset-password {
        background: white;
        padding: 94px 0;
        min-height: 1000px;
    }

    .auth-reset-password-container {
        max-width: 768px;
    }

    .auth-reset-password-form {
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
</style>
