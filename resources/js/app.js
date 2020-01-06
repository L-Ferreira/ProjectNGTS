/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

import VueRouter from "vue-router";
import vuetify from "../../plugins/vuetify"; // path to vuetify export
import * as VueGoogleMaps from "vue2-google-maps";
import VueGoogleCharts from "vue-google-charts";
import store from "./store/global-store";
import vueCharts from "vue-chartjs";

Vue.use(VueRouter);
Vue.use(store);

Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyDP-etwl9bYjlFssqTB2MoGx-vKfQaj_oo",
        libraries: "places"
    }
});

Vue.use(VueGoogleCharts);

const main = Vue.component(
    "main-component",
    require("./components/MainComponent.vue").default
);

const homepage = Vue.component(
    "homepage-component",
    require("./components/HomepageComponent.vue").default
);

const guest = Vue.component(
    "guest-component",
    require("./components/GuestComponent.vue").default
);

const stats = Vue.component(
    "statistics-component",
    require("./components/StatisticsComponent.vue").default
);

const about = Vue.component(
    "about-component",
    require("./components/AboutComponent.vue").default
);

const login = Vue.component("login", require("./components/Login.vue").default);

const routes = [
    { path: "/", component: guest },
    { path: "/about", component: about },
    { path: "/statistics", component: stats, meta: { requiresAuth: true } },
    {
        path: "/home",
        component: homepage,
        name: "homepage",
        meta: { requiresAuth: true }
    },
    { path: "/login", component: login, name: "login" }
];
const router = new VueRouter({
    routes
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.loggedIn) {
            next();
            return;
        }
        next("/login");
    } else {
        console.log(store.getters.loggedIn);
        next();
    }
});

const app = new Vue({
    store,
    components: {
        "main-component": main,
        "homepage-component": homepage,
        "about-component": about,
        "statistics-component": stats,
        "guest-component": guest,
        login: login
    },
    vuetify,
    vueCharts,
    router,
    created() {
        this.$store.commit("loadTokenAndUserFromSession");
    }
}).$mount("#app");
