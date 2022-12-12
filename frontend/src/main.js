import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'

import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
import './assets/css/main.css'

const app = createApp(App)

axios.defaults.baseURL = `http://localhost:8000`

app.use(createPinia())
app.use(router)
app.use(VueAxios, axios);

app.mount('#app')
