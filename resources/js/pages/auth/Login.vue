<template>
    <div class="auth-login">
        <div class="container auth-login-container">
            <form class="auth-login-form">
                <div class="form-title text-center mb-5">
                    Login To Bibmark
                </div>
                <div class="form-group mb-5">
                    <label for="login-email" class="mb-3">Email</label>
                    <input v-model="email" type="email" name="email" class="form-control" id="login-email"
                           v-validate="'required|email'" :class="{ 'is-invalid': errors.has('email') }">
                    <div class="error">
                        <div v-if="errors.has('email')" class="invalid-feedback">{{ errors.first('email') }}</div>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="login-password" class="mb-3">Password</label>
                    <input v-model="password" type="password" class="form-control" id="login-password" name="password"
                           v-validate="{ required: true, min: 6 }"
                           :class="{ 'is-invalid':  errors.has('password') }">
                    <div class="error">
                        <div v-if="errors.has('password')" class="invalid-feedback">{{ errors.first('password') }}</div>
                    </div>
                </div>

                <p style="color: red; height: 25px;">{{ errorMSG }}</p>

                <div class="form-row mb-5">
                    <div class="form-group col-md-6">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="login-remember">
                            <label class="form-check-label" for="login-remember">Remember Password</label>
                        </div>
                    </div>
                    <div class="form-group col-md-6 text-md-right">
                        <a href="forgot-password" class="reset-password-cta">Forgot My Password</a>
                    </div>
                </div>

                <div class="form-row d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <a href="join" class="login-cta-element d-flex">
                            <img src="img/auth/add.png" style="width: 64px; height: 64px;"/>
                            <div class="login-cta-labels d-flex flex-column ml-4">
                                <div class="login-cta-label-desc">Don’t have an account??</div>
                                <div class="login-cta-label">Join Now</div>
                            </div>
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <a class="login-cta-element d-flex justify-content-md-end" @click="submit">
                            <img src="img/auth/next.png" style="width: 64px; height: 64px;"/>
                            <div class="login-cta-labels d-flex flex-column ml-4">
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
        email: '',
        password: '',
        errorMSG: ''
    }),
    methods: {
        submit() {
            const that = this
            const data = {
                email: this.email,
                password: this.password
            }
            this.$validator.validate().then(valid => {
                if (valid) {
                    axios.post('/api/login', data).then(response => {
                        if (response.data.status === 1) {
                            window.location = '/';
                        }
                    }).catch(error => {
                        if (error.response.status === 500) {
                            that.errorMSG = error.response.data.error
                        }
                    });
                }
            });
        }
    }
}
</script>

<style lang="scss" scoped>
.auth-login {
    background: white;
    padding: 94px 0;
    min-height: 1000px;
}

.auth-login-container {
    max-width: 768px;
}

.auth-login-form {
    .form-title {
        font-family: "SFProDisplay", "San Francisco", sans-serif;
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

        input[type=checkbox] {
            font-size: 24px;
            margin-top: 6px;
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
        cursor: pointer;

        i {
            margin-right: 1rem;
        }

        .login-cta-labels {
            .login-cta-label-desc {
                font-family: "SFProDisplay", "San Francisco", sans-serif;
                opacity: 0.6;
                font-size: 16px;
                font-weight: 500;
                color: #000000;
            }

            .login-cta-label {
                font-family: "SFProDisplay", "San Francisco", sans-serif;
                font-size: 24px;
                font-weight: 500;
                color: #000000;
            }
        }
    }
}
</style>
