import { createRouter, createWebHashHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import EditUser from '../views/EditUser.vue'
import NilaiView from '../views/NilaiView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/edit/:id',
    name: 'EditUser',
    component: EditUser,
    props: true // Mengaktifkan props agar parameter dapat diakses di komponen
  },
  {
    path: '/nilai/:id',
    name: 'NilaiView',
    component: NilaiView,
    props: true // Mengaktifkan props agar parameter dapat diakses di komponen
  },
  {
    path: '/add-user',
    name: 'addUser',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AddUser.vue')
  }
]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
