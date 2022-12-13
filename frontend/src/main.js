import { createApp } from 'vue'

import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'

/**
 * Bootstrap Resources
 */
import "bootstrap/scss/bootstrap.scss"
import "bootstrap/dist/js/bootstrap.js"

/**
 * Additional Resources
 */
import './assets/css/main.css'
import './assets/css/styles.css'

const app = createApp(App)

axios.defaults.baseURL = `http://localhost:8000`

app.use(router)
app.use(VueAxios, axios);

app.mount('#app')
