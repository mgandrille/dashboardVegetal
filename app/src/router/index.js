import Vue from 'vue'
import VueRouter from 'vue-router'
import About from '../views/about/About.vue'
import Home from '../views/home/Home.vue'
import Authentification from '../views/authentification/Authentification.vue'
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
    path: '/plante/detail/:id',
    name: 'Detail',
    component: Detail
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
