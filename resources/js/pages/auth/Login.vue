<template>
    <b-container>
        <b-row class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-lg-4">
                    <div class="card-header">Login</div>
                    <div class="card-body">


                        <form @submit.prevent="handleLogin">

                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" v-model="formData.email" class="form-control form-control-sm"
                                       name="email" required id="inputEmail">
                            </div>

                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" v-model="formData.password" class="form-control form-control-sm"
                                       name="email" required id="inputPassword">
                            </div>

                            <div class="form-group">
<!--                                <v-button type="submit" name="login"  block variant="info" size="md">Log In</v-button>-->
                                <b-button block type="submit" variant="primary">
                                    <span v-if="!loading">Login</span>
                                    <span v-else>
                                         <b-spinner small type="grow" class="mr-2"></b-spinner> logging in...
                                    </span>
                                </b-button>
                            </div>
                            <b-alert v-model="errors" variant="danger" dismissible>
                                Invalid Credentials
                            </b-alert>
                        </form><!-- end of form -->
                    </div><!-- end of card body -->
                </div><!-- end of card -->
            </div><!-- end of col-md-4 -->
        </b-row><!-- row -->
    </b-container><!-- end of container -->
</template>

<script>
    import axios from "axios";
    import Token from "../../Helpers/Token";
    import AppStorage from "../../Helpers/AppStorage";

    export default {
        data() {
            return {
                loading: false,
                errors: false,
                secrets: [],
                formData: {
                    email: 'adas@gmail.com',
                    password: 'pasad',
                }
            }
        },
        created() {
            if (User.loggedIn()) {
                this.$router.push('/');
            }
        },
        methods: {
            handleLogin() {
                this.loading = true;
                this.errors = false;
                // send axios request to login route
                axios.post('http://127.0.0.1:8000/api/login', this.formData)
                    .then(({data}) => {
                    if (Token.isValid(data.token)) {
                        AppStorage.store(data.user, data.token)
                    }
                    EventBus.$emit('login')
                    this.$router.push('/');
                }).catch(err => {
                    this.loading = false;
                    this.errors = true;
                    console.log(err);
                })
            },
        }
    }
</script>
