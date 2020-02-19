import VueRouter from  'vue-router'

// Importar paginas
import Home from './components/Pages/Home'
import Like from './components/Pages/Like'
import Register from './components/Pages/Register'
import Login from './components/Pages/Login'
import AdminPanel from './components/Pages/AdminPanel'

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: {
            auth: undefined // Rota Publica
        }
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            auth: false
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            auth: false
        }
    },
    //Rota de voto
    {
        path: '/like',
        name: 'lije',
        component: Like,
        meta: {
            auth: true
        }
    },
    //Painel de admin
    {
        path: '/admin',
        name: 'admin.panel',
        component: AdminPanel,
        meta: {
            auth: {
                roles: 2,
                redirect: {
                    name: 'login'
                }
            },
            forbiddenRedirect: '/403'
        }
    }
];

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes
})

export default router