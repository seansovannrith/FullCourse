import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Signin from '@/components/auth/Signin.vue'
import Dashboard from '@/components/pages/Dashboard.vue'
import Signup from '@/components/auth/Signup.vue'
import Signout from '@/components/auth/Signout.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'auth.signin',
      component: Signin,
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: Dashboard,
    },
    {
      path:'/signup',
      name:'auth.signup',
      component: Signup,
    },
    {
      path: '/signout',
      name: 'auth.signout',
      component: Signout,
    },
    {
      path:'/pathMatch(.*)*',
      redirect: {name:'dashboard'},
    }
  ],
})

export default router
