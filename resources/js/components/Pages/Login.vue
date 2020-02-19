<template>
    <div class="container">
        <div class="row">
            <div class="offset-4 col-md-4" style="margin-top: 25vh;">

                <h3>Login</h3>

                <div class="alert alert-danger" v-if="has_error">
                    <p>Error ao efetuar o login por favor verificar seus dados de login!</p>
                </div>

                <form autocomplete="off" @submit.prevent="login" action="post">

                    <div class="form-group">
                        <input type="text" id="username" class="form-control" placeholder="seu usuario" v-model="username" required>
                    </div>

                    <div class="form-group">
                        <input type="password" id="password" class="form-control" v-model="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Logar-se</button>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                username: null,
                password: null,
                has_error: false
            }
        },
        mounted() {
            //
        },
        methods: {
            login() {
                var redirect = this.$auth.redirect()
                var app = this
                this.$auth.login({
                    params: {
                        username: app.username,
                        password: app.password
                    },
                    success: function() {
                        const redirectTo = redirect ? redirect.from.name : this.$auth.user().role === 2 ? 'admin.panel' : 'like'
                        this.$router.push({
                            name: redirectTo
                        })
                    },
                    error: function() {
                        app.has_error = true
                    },
                    rememberMe: true,
                    fetchUser: true
                })
            }
        }
    }
</script>

<style scoped>

</style>