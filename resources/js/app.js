import router from "./router";
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

require('./bootstrap');

window.Vue = require('vue');

Vue.component('app', require('./pages').default);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

import User from './Helpers/User'
window.User = User;

window.EventBus = new Vue();

const app = new Vue({
    el: '#app',
    router
});
