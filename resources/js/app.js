/*jshint esversion: 6 */
import Vue from 'vue';
import store from './store';

import ShortenForm from './components/ShortenForm.vue';
import ShortenInfo from './components/ShortenInfo.vue';
import Live from './components/Live.vue';
import Copyright from './components/Copyright.vue';
import Navbar from './components/Navbar.vue';
import Icon from './components/Icon.vue';

Vue.component('shorten-form', ShortenForm);
Vue.component('shorten-info', ShortenInfo);
Vue.component('live', Live);
Vue.component('copyright', Copyright);
Vue.component('navbar', Navbar);
Vue.component('icon', Icon);

Vue.config.productionTip = false;

const app = new Vue({
    el: '#app',
    store,
});
