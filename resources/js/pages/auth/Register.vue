<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">

                    <div class="card-body">
                        <div class="card-header">Register</div>

                        <form @submit.prevent="handleLogin">

                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" v-model="formData.name" class="form-control form-control-sm"
                                       name="name" required id="inputName">
                            </div>

                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" v-model="formData.email" class="form-control form-control-sm"
                                       name="email" required id="inputEmail">
                            </div>

                            <div class="form-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" v-model="formData.password" class="form-control form-control-sm"
                                       name="password" required id="inputPassword">
                            </div>

                            <div class="form-group">
                                <label for="inputPasswordConfirmation">Password</label>
                                <input type="password" v-model="formData.password_confirmation" class="form-control form-control-sm"
                                       name="password_confirmation" required id="inputPasswordConfirmation">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" value="Create" class="btn btn-primary btn-sm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                secrets: [],
                formData: {
                    name: 'john paul l. gabule',
                    email: 'ufisher@example.org',
                    password: 'password',
                    password_confirmation: 'password',
                }
            }
        },
        methods: {
            handleLogin() {
                // send axios request to login route
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/register', this.formData).then(response => {
                       this.getSecret();
                    });
                })
            },
            getSecret() {
                axios.get('/api/secrets').then(response => {
                    console.log(response)
                    this.secrets = response.data;
                })
            }
        }
    }
</script>
