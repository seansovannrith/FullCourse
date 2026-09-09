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
            path: "/",
            name: "auth.signin",
            component: Signin,
            meta: { guarded: false },
        },
        {
            path: "/signout",
            name: "auth.signout",
            component: Signout,
            // This route has no guarded meta because it use for both authenticated and unauthenticated users.
            // The authentication state will be handled in the Signout component.
        },
        {
            path: "/signup",
            name: "auth.signup",
            component: Signup,
            meta: { guarded: false },
        },
        {
            path: "/dashboard",
            name: "dashboard",
            component: Dashboard,
            meta: { guarded: true },
        },
        {
            path: "/:pathMatch(.*)*",
            redirect: "/dashboard",
        },
    ],
})

export default router
