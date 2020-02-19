<template>
    <div class="container">
        <div class="card card-default">
            <div class="card-header">Login</div>

            <div class="card-body">
                <div class="alert alert-danger" v-if="has_error">
                    <p>Error ao efetuar o login por favor verificar seus dados de login!</p>
                </div>

                <form autocomplete="off" @submit.prevent="login" action="post">

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="seu@email.com.br" v-model="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" id="password" class="form-control" v-model="password" required>
                    </div>

                    <button type="submit" class="btn btn-default">Logar-se</button>

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
                email: null,
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
                        email: app.email,
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