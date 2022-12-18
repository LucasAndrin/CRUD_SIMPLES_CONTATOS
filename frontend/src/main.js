import { createApp } from 'vue'

import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'

/**
 * Bootstrap Resources
 */
import "bootstrap/dist/js/bootstrap.js"

/**
 * Additional Resources
 */
import './assets/scss/main.scss'

const app = createApp(App)

axios.defaults.baseURL = `http://localhost:8000`

app.use(router)
app.use(VueAxios, axios);

app.mount('#app')
