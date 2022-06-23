import { createApp } from 'vue'
import App from './App.vue'
import axios from 'axios'

import { createWebHistory, createRouter } from 'vue-router'
import Tambah from './components/Tambah.vue'
import Articles from './components/Articles'
import Edit from './components/Edit'


const router = createRouter({
    history: createWebHistory(),
    routes : [
      
        {path: '/tambah', name: "Tambah", component:Tambah},
        {path: '/articles', name: "Articles", component:Articles},
        {path: '/edit/:id', name: "Edit", component:Edit},
    ],
    base: '/'
})
const app = createApp(App)
app.use(router)
app.config.globalProperties.axios =axios
app.mount('#app')
