<template>
    <div class="auth-join">
        <div class="container auth-join-container">
            <form class="auth-join-form">
                <div class="form-title text-center mb-5">
                    Join Bibmark
                </div>
                <div class="form-group mb-5">
                    <label for="join-name" class="mb-3">Name</label>
                    <input v-model="name" type="text" class="form-control" id="join-name" name="name"
                           v-validate="'required'"
                           :class="{ 'is-invalid': errors.has('name') }">
                    <div class="error">
                        <div v-if="errors.has('name')" class="invalid-feedback">{{ errors.first('name') }}</div>
                    </div>
                </div>
                <div class="form-group mb-5">
                    <label for="join-email" class="mb-3">Email</label>
                    <input v-model="email" type="email" name="email" class="form-control" id="join-email"
                           v-validate="'required|email'" :class="{ 'is-invalid': errors.has('email') }">
                    <div class="error">
                        <div v-if="errors.has('email')" class="invalid-feedback">{{ errors.first('email') }}</div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="join-password" class="mb-3">Password</label>
                    <input v-model="password" type="password" class="form-control" id="join-password" name="password"
                           v-validate="{ required: true, min: 6 }"
                           :class="{ 'is-invalid':  errors.has('password') }">
                    <div class="error">
                        <div v-if="errors.has('password')" class="invalid-feedback">{{ errors.first('password') }}</div>
                    </div>
                </div>

                <p style="color: red; height: 25px;">{{ errorMSG }}</p>

                <div class="form-row d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <a href="login" class="join-cta-element d-flex">
                            <img src="img/auth/add.png" style="width: 64px; height: 64px;"/>
                            <div class="join-cta-labels d-flex flex-column ml-4">
                                <div class="join-cta-label-desc">Already have an account?</div>
                                <div class="join-cta-label">Login Now</div>
                            </div>
                        </a>
                    </div>
                    <div class="d-flex align-items-center">
                        <a class="join-cta-element d-flex justify-content-md-end" @click="submit">
                            <img src="img/auth/next.png" style="width: 64px; height: 64px;"/>
                            <div class="join-cta-labels d-flex flex-column ml-4">
                                <div class="join-cta-label-desc">Let’s go</div>
                                <div class="join-cta-label">Submit</div>
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
    name: 'AuthJoin',
    data: () => ({
        name: '',
        email: '',
        password: '',
        errorMSG: ''
    }),
    methods: {
        submit() {
            const that = this
            const data = {
                name: this.name,
                firstname: 'firstname',
                lastname: 'lastname',
                email: this.email,
                password: this.password
            }
            this.$validator.validate().then(valid => {
                if (valid) {
                    axios.post('/api/register', data).then(response => {
                        if (response.data.success === 0) {
                            window.location = 'login';
                        }
                    }).catch(error => {
                        if (error.response.status === 422) {
                            that.errorMSG = error.response.data.errors.email[0]
                        }
                    });
                }
            });
        }
    }
}
</script>

<style lang="scss" scoped>
.auth-join {
    background: white;
    padding: 94px 0;
    min-height: 1000px;
}

.auth-join-container {
    max-width: 768px;
}

.auth-join-form {
    .form-title {
        font-family: "SFProDisplay", "San Francisco", sans-serif;
        font-size: 42px;
        font-weight: bold;
        color: #444444;
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

    .join-cta-element {
        cursor: pointer;

        i {
            margin-right: 1rem;
        }

        .join-cta-labels {
            .join-cta-label-desc {
                font-family: "SFProDisplay", "San Francisco", sans-serif;
                opacity: 0.6;
                font-size: 16px;
                font-weight: 500;
                color: #000000;
            }

            .join-cta-label {
                font-family: "SFProDisplay", "San Francisco", sans-serif;
                font-size: 24px;
                font-weight: 500;
                color: #000000;
            }
        }
    }
}
</style>
