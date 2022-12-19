import { createRouter, createWebHistory } from 'vue-router'
import Contacts from '../views/Contacts.vue'
import CreateContact from '../views/CreateContact.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Contacts',
      component: Contacts
    },
    {
      path: '/contacts/store',
      name: 'Add Contact',
      component: CreateContact
    },
    {
      path: '/cities',
      name: 'Cities',
      // component: UsersView
    }
  ]
})

export default router
