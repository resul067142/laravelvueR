import './bootstrap';

import {createApp} from 'vue'
import App from './layouts/App.vue'
import {createRouter, createWebHistory} from "vue-router";

import HomePage from './pages/Home.vue';

import PostIndex from './pages/posts/Index.vue'
import PostEdit from './pages/posts/Edit.vue'
import Proje from './pages/posts/proje.vue'

import Products from './pages/products/Products.vue'   // Students.vue   ///index.vue
import ProductCreate from './pages/products/Create.vue'
import ProductEdit from './pages/products/Edit.vue'

import Students from './pages/students/Students.vue'   //
import StudentCreate from './pages/students/Create.vue'
import StudentEdit from './pages/students/Edit.vue'


const routes = [
    {path: '/', component: HomePage},
    {path: '/yazilar', component: PostIndex},
    {path: '/yazilar/:id', component: PostEdit},

    {path: '/proje', component: PostIndex},
    {path: '/proje/:id', component: Proje},

    {path: '/urunler', component: Products},
    {path: '/urunler/ekle', component: ProductCreate},
    {path: '/urunler/:id', component: ProductEdit},

    {path: '/students', component: Students},
    {path: '/students/ekle', component: StudentCreate},
    {path: '/students/:id', component: StudentEdit},


]

const router = createRouter({
    history: createWebHistory(),
    routes
})

createApp(App).use(router).mount('#app')
