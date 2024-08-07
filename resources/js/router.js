import { createRouter, createWebHistory } from 'vue-router'
import HomePage from './pages/HomePage.vue'
import Login from './pages/auth/Login.vue'
import Register from './pages/auth/Register.vue'
import Logout from './pages/auth/Logout.vue'
import Dashboard from './pages/Dashboard.vue'
import User from './pages/user/User.vue'
import AddUser from './pages/user/Add.vue'
import EditUser from './pages/user/Edit.vue'



export default createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage,
            meta: { layout: 'Guest' },
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: { layout: 'Guest' },
        },
        {
            path: '/logout',
            name: 'logout',
            component: Logout,
            meta: { layout: 'Guest' },
        },
        {
            path: '/register',
            name: 'register',
            component: Register,
            meta: { layout: 'Guest' },
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: { layout: 'Admin', title: 'Dashboard' },
        },
        {
            path: '/user',
            name: 'user',
            component: User,
            meta: { layout: 'Admin', title: 'Anggota' },
        },
        {
            path: '/user/add',
            name: 'adduser',
            component: AddUser,
            meta: { layout: 'Admin', title: 'Tambah Anggota' },
        },
        {
            path: '/user/edit/:id',
            name: 'edituser',
            component: EditUser,
            meta: { layout: 'Admin', title: 'Edit Anggota' },
        },
    ]
})