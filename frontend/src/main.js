import { createApp } from 'vue'

import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueSweetalert2 from 'vue-sweetalert2'

/**
 * Bootstrap Resources
 */
import "bootstrap/dist/js/bootstrap.min.js"

/**
 * SweetAlert resources
 */
import 'sweetalert2/dist/sweetalert2.min.css'

/**
 * Additional Resources
 */
import './assets/scss/main.scss'

const app = createApp(App)

axios.defaults.baseURL = `http://localhost:8000`

app.use(router)
app.use(VueAxios, axios)
app.use(VueSweetalert2)

app.mount('#app')
