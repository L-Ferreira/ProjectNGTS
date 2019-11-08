/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import vuetify from '../../plugins/vuetify'; // path to vuetify export

Vue.use(VueRouter);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component(
//     "welcome-component",
//     require("./components/WelcomeComponent.vue")
// );

const welcome = Vue.component(
    'welcome-component',
    require('./components/WelcomeComponent.vue').default
);

const about = Vue.component(
    'about-component',
    require('./components/AboutComponent.vue').default
);

const routes = [{ path: '/about', component: about }];
const router = new VueRouter({
    routes // short for `routes: routes`
});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    components: {
        'welcome-component': welcome,
        'about-component': about
    },
    vuetify,
    router
}).$mount('#app');
