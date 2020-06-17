import Vue from 'vue'
import VueRouter from 'vue-router'
import About from '../views/about/About.vue'
import Home from '../views/home/Home.vue'
import Login from '../views/authentification/Login.vue'
import Register from '../views/authentification/Register.vue'
import Catalogue from '../views/catalogue/Catalogue.vue'
import Dashboard from '../views/dashboard/Dashboard.vue'
import Detail from '../views/detail/Detail.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/authentification/connexion',
    name: 'Login',
    component: Login
  },
  {
    path: '/authentification/inscription',
    name: 'Register',
    component: Register
  },
  {
    path: '/catalogue',
    name: 'Catalogue',
    component: Catalogue
  },
  {
    path: '/plante/detail/:id(\\d+)',
    name: 'Detail',
    component: Detail
  },
  {
    path: '/dashboard/:id(\\d+)',
    name: 'Dashboard',
    component: Dashboard
  },
  
  {
    path: '/about',
    name: 'About',
    component: About
  },
  {
    path: '/page404',
    name: 'Page404',
    // route level code-splitting
    // this generates a separate chunk (page404.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "page404" */ '../views/Page404.vue')
  }
]

const router = new VueRouter({
  routes
})

export default router
