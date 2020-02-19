import 'es6-promise/auto'
import axios from 'axios'
import './bootstrap'
import Vue from 'vue'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import Index from './components/Index'
import auth from './auth'
import router from './router'

window.Vue = Vue

// Configurando roteador do VUE
Vue.router = router
Vue.use(VueRouter)

// Configurando autenticação do VUE
Vue.use(VueAxios, axios)
axios.defaults.baseURL = "api"
Vue.use(VueAuth, auth)

// Carregando Index
Vue.component('index', Index)

const app = new Vue({
    el: '#app',
    router
})