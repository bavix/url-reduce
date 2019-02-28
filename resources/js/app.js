/*jshint esversion: 6 */
import Vue from 'vue';
import store from './store';

import ShortenForm from './components/ShortenForm.vue';
import ShortenInfo from './components/ShortenInfo.vue';
import Live from './components/Live.vue';
import Copyright from './components/Copyright.vue';
import Navbar from './components/Navbar.vue';
import './icon';

const app = new Vue({
    el: '#app',
    store,
    components: {
        ShortenForm,
        ShortenInfo,
        Live,
        Copyright,
        Navbar,
    }
});
