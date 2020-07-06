<template>
    <b-container>
        <b-row class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-lg-4">
                    <div class="card-header">Login</div>
                    <div class="card-body">

                        <form @submit.prevent="login">

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
                                <b-button block type="submit" variant="primary">
                                    <span v-if="!loading">Login</span>
                                    <span v-else>
                                         <b-spinner small type="grow" class="mr-2"></b-spinner> logging in...
                                    </span>
                                </b-button>
                            </div>
                            <b-alert v-model="error" variant="danger" dismissible>
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
    export default {
        data() {
            return {
                // loading: false,
                errors: false,
                secrets: [],
                formData: {
                    email: 'johnpaulgabule@gmail.com',
                    password: 'password',
                }
            }
        },
        computed: {
            loading() {
                return this.$store.getters.loading
            },
            error() {
                return this.$store.getters.error
            }
        },

        methods: {
            login() {
                this.$store.dispatch('login', this.formData).then(() => {
                    this.$router.push({path: '/'});
                });
            }
        }
    }
</script>
