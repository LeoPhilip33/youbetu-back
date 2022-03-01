
import { createWebHistory, createRouter } from "vue-router";
import Home from "../components/Home.vue";
import Register from "../components/Auth/Register.vue";
import Login from "../components/Auth/Login.vue";
import Dashboard from "../components/Dashboard.vue";

 const routes = [
    {
        path: '/',
        component: Home,
        name: 'Home'
    },
    {
        path: '/register',
        component: Register,
        name: 'Register'
    },
    {
        path: '/login',
        component: Login,
        name: 'Login'
    },
    {
        path:'/dashboard',
        component: Dashboard,
        name: 'Dashboard',
        beforeEnter: (to, from, next) => {
            axios.get('/api/authentificated').then(()=>{
                next()
            }).catch(()=>{
                return next({name: 'Login'})
            })
        }
    },
    
]


const router = createRouter({
    history: createWebHistory(),
    routes,
  });
  
  export default router;