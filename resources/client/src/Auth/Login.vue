<template>
    <div>
        <!-- Header -->
        <div class="header bg-gradient-success py-7 py-lg-8 pt-lg-9">
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                     xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="text-center text-muted mb-4">
                                <small>Sign In</small>
                            </div>
                            <form role="form">
                                <base-input alternative
                                            class="mb-3"
                                            prepend-icon="ni ni-email-83"
                                            placeholder="Email"
                                            v-model="email">
                                </base-input>

                                <base-input alternative
                                            class="mb-3"
                                            prepend-icon="ni ni-lock-circle-open"
                                            type="password"
                                            placeholder="Password"
                                            v-model="password">
                                </base-input>

                                <div class="text-center">
                                    <base-button type="primary"
                                                 class="my-4"
                                                 @click="login">
                                        Sign in
                                    </base-button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <router-link to="/auth/forgot-password" class="text-light"><small>Forgot password?</small>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import AuthAPI from "@services/api/AuthAPI";
    import AuthService from "@services/auth/AuthService";

    export default {
        name: "Login",
        data() {
            return {
                email: '',
                password: '',
            };
        },
        methods: {
            login() {
                AuthAPI
                  .login(this.email, this.password)
                  .then((data) => {
                      AuthService.logIn(data.access_token, data.expires_in);
                      this.$router.push('/dashboard/overview');
                  })
                  .catch((err) => {
                      console.log(err);
                  })
            }
        }
    };
</script>
