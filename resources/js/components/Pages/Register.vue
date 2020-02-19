<template>
    <div class="container">
        <div class="row">
            <div class="offset-4 col-md-4" style="margin-top: 25vh;">
                <h3>Registrar-se</h3>
                <!-- Em caso de erro! -->
                <div class="alert alert-danger" v-if="has_error && !success">
                    <p v-if="error == 'registration_validation_error'">Erro de validação do registro</p>
                    <p v-else>Erro, problema ao efetuar o registro no momento, por favor tentar mais tarde e caso o problema persista entrar em contato com o administrador.</p>
                </div>

                <form autocomplete="off" @submit.prevent="register" v-if="!success" method="post">
                    <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.username }">
                        <label for="username">E-mail</label>
                        <input type="text" id="username" class="form-control" placeholder="seu usuario" v-model="username">
                        <span class="help-block" v-if="has_error && errors.username">Campo de usuário é requerido</span>
                    </div>

                    <div class="form-group" v-bind:class="{ 'has_error': has_error && errors.password }">
                        <label for="password">Senha</label>
                        <input type="password" id="password" class="form-control" v-model="password">
                        <span class="help-block" v-if="has_error && errors.password">Campo de senha é requerido!</span>
                    </div>

                    <div class="form-group" v-bind:class="{ 'has_error': has_error && errors.password }">
                        <label for="password_confirmation">Confirmar a senha</label>
                        <input type="password" id="password_confirmation" class="form-control" v-model="password_confirmation">
                    </div>

                    <button type="submit" class="btn btn-primary">Registrar-se</button>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Register",
        data() {
            return {
                name: '',
                username: '',
                password: '',
                password_confirmation: '',
                has_error: false,
                error: '',
                errors: {},
                success: false
            }
        },

        methods: {
            register() {
                var app = this
                this.$auth.register({
                    data: {
                        username: app.username,
                        password: app.password,
                        password_confirmation: app.password_confirmation
                    },
                    success: function () {
                        app.success = true
                        this.$router.push({
                            name: 'login',
                            params: {
                                successRegistrationRedirect: true
                            }
                        })
                    },
                    error: function (data) {
                        console.log(data.response.data.errors)
                        app.has_error = true
                        app.error = data.response.data.error
                        app.errors = data.response.data.errors || {}
                    }
                })
            }
        }
    }
</script>

<style scoped>

</style>