import Vue from 'vue'
import VueRouter from 'vue-router'
import About from '../views/about/About.vue'
import Home from '../views/home/Home.vue'
import Authentification from '../views/authentification/Authentification.vue'
import Catalogue from '../views/catalogue/Catalogue.vue'
import Dashboard from '../views/dashboard/Dashboard.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/authentification/connexion',
    name: 'Authentification',
    component: Authentification
  },
  {
    path: '/authentification/inscription',
    name: 'Authentification',
    component: Authentification
  },
  {
    path: '/catalogue',
    name: 'Catalogue',
    component: Catalogue
  },
  {
    path: '/dashboard/:id',
    name: 'Dashboard',
    component: Dashboard
  },
  {
    path: '/about',
    name: 'About',
    component: About
  }
]

const router = new VueRouter({
  routes
})

export default router
