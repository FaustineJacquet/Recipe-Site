import Vue from 'vue';
import VueRouter from 'vue-router';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(VueRouter)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

import profile from './components/profile.vue';
import home from './components/home.vue';
const routes = [
    {
        path: '/profile',
        component: profile
    },
    {
        path: '/home',
        component: home
    }
]

export default new VueRouter({ mode: 'history', routes: routes })