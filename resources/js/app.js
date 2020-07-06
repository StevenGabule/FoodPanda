import Vuex from 'vuex';
import router from "./router";
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

require('./bootstrap');

window.Vue = require('vue');
import storeData from './store/index';

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(Vuex);

const store = new Vuex.Store(
    storeData
)

import User from './Helpers/User'
window.User = User;

import Exception from './Helpers/Exception'
window.Exception = Exception;

window.EventBus = new Vue();

Vue.component('app', require('./pages').default);

new Vue({
    el: '#app',
    router,
    store,
});
