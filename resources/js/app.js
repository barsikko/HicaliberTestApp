require("./bootstrap");

import VueRouter from "vue-router";
import store from "./store/index.js";
import router from "./routes";
import index from "./Index";
import "./plugins/element.js";

window.Vue = require("vue").default;

//Vue.component('search-page', require('./components/SearchPageComponent.vue').default);

Vue.use(VueRouter);


const app = new Vue({
    el: "#app",
    render: h => h(index),
    router,
    store,
    components: {
        index,
    },
});
