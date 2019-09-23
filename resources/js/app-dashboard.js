/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VueRouter from 'vue-router';
require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.$http = axios;

import DashboardIndex from './components/dashboard-index.vue';
import DashboardCheckin from './components/dashboard-check-in.vue';
import DashboardReport from './components/dashboard-report.vue';
import Datatable from 'vue2-datatable-component';

Vue.use(Datatable)
Vue.use(VueRouter);
const router = new VueRouter({
    base:'/',
    mode:"hash",
    routes:[
        {path:'/', component:DashboardIndex},
        {path:'/check-in', component:DashboardCheckin},
        {path:'/report', component:DashboardReport},
    ]
})
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
import Dashboard from './pages/dashboard.vue'
Vue.component('dashboard',Dashboard);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    el:'#app-dashboard'
});
