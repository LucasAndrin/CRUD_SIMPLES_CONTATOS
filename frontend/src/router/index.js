import { createRouter, createWebHistory } from 'vue-router'
import UsersView from '../views/UsersView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Contacts',
      component: UsersView
    },
    {
      path: '/cities',
      name: 'Cities',
      // component: UsersView
    }
  ]
})

export default router
