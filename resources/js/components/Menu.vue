<template>
    <nav id="nav">
        <ul>
            <li v-if="!$auth.check()" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                <router-link :to="{ name: route.path }" :key="key">
                    {{route.name}}
                </router-link>
            </li>

            <li v-if="$auth.check(1)" v-for="(route, key) in routes.user" v-bind:key="route.path">
                <router-link :to="{ name: route.path }" :key="key">
                    {{route.name}}
                </router-link>
            </li>

            <li v-if="$auth.check(2)" v-for="(route, key) in routes.user" v-bind:key="route.path">
                <router-link :to="{ name: route.path }" :key="key">
                    {{route.name}}
                </router-link>
            </li>

            <li v-if="$auth.check()">
                <a href="#" @click.prevent="$auth.logout()">Sair</a>
            </li>
        </ul>
    </nav>
</template>

<script>
    export default {
        name: "Menu",
        data() {
            return {
                routes: {
                    // UNLOGGED
                    unlogged: [
                        {
                            name: 'Registrar-se',
                            path: 'register'
                        },
                        {
                            name: 'Logar-se',
                            path: 'login'
                        }
                    ],          // LOGGED USER
                    user: [
                        {
                            name: 'Curtidas',
                            path: 'like'
                        }
                    ],
                    // LOGGED ADMIN
                    admin: [
                        {
                            name: 'Painel',
                            path: 'admin.panel'
                        }
                    ]
                }
            }
        },
    }
</script>

<style scoped>

</style>