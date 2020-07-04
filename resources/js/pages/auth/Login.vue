<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">

                    <div class="card-body" v-if="!secrets.length">
                        <div class="card-header">Login</div>

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
                                <input type="submit" name="submit" value="Log In" class="btn btn-primary btn-sm">
                            </div>
                        </form><!-- end of form -->
                    </div><!-- end of card body -->
                </div><!-- end of card -->
            </div><!-- end of col-md-4 -->
        </div><!-- row -->
    </div><!-- end of container -->
</template>

<script>
    import Cookies from 'js-cookie';
    import Token from "../../helpers/Token";
    import AppStorage from "../../helpers/AppStorage";

    export default {
        data() {
            return {
                secrets: [],
                formData: {
                    email: 'ufisher@example.org',
                    password: 'password',
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
                // send axios request to login route
                axios.post('http://127.0.0.1:8000/api/login', this.formData)
                    .then(({data}) => {
                        console.log(data)
                    if (Token.isValid(data.token)) {
                        AppStorage.store(data.user, data.token)
                    }
                });
            },
        }
    }
</script>
