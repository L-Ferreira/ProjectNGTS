/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import vuetify from '../../plugins/vuetify'; // path to vuetify export
import * as VueGoogleMaps from 'vue2-google-maps';
import VueGoogleCharts from 'vue-google-charts';
import store from './store/global-store';

Vue.use(VueRouter);

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyDP-etwl9bYjlFssqTB2MoGx-vKfQaj_oo',
        libraries: 'places'
    }
});

Vue.use(VueGoogleCharts);

const main = Vue.component(
    'main-component',
    require('./components/MainComponent.vue').default
);

const homepage = Vue.component(
    'homepage-component',
    require('./components/HomepageComponent.vue').default
);

const stats = Vue.component(
    'statistics-component',
    require('./components/StatisticsComponent.vue').default
);

const about = Vue.component(
    'about-component',
    require('./components/AboutComponent.vue').default
);

const login = Vue.component(
    'login',
    require('./components/Login.vue').default
);

const routes = [
    { path: '/about', component: about },
    { path: '/statistics', component: stats },
    { path: '/', component: homepage, name: 'homepage' },
    { path: '/login', component: login, name: 'login' }
];
const router = new VueRouter({
    routes
});

const app = new Vue({
    components: {
        'main-component': main,
        'homepage-component': homepage,
        'about-component': about,
        'statistics-component': stats,
        'login': login
    },
    vuetify,
    router,
    store,
    created() {
        this.$store.commit('loadTokenAndUserFromSession');
    },
}).$mount('#app');
