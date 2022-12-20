import { createRouter, createWebHistory } from 'vue-router'
import Contacts from '../views/Contacts.vue'
import CreateContact from '../views/CreateContact.vue'
import Cities from '../views/Cities.vue'

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
      component: Cities
    }
  ]
})

export default router
