import {createApp} from 'vue'

require('./bootstrap')
import App from './App.vue'
import axios from 'axios'
import store from './store'
import router from './router'


const app = createApp(App)
app.config.globalProperties.$axios = axios;
app.use(router)
app.use(store)
app.mount('#app')
