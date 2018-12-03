/*jshint esversion: 6 */
import Vue from 'vue';

import ShortenForm from './components/ShortenForm.vue';
import ShortenInfo from './components/ShortenInfo.vue';
import Live from './components/Live.vue';
import Copyright from './components/Copyright.vue';
import Navbar from './components/Navbar.vue';
import Icon from './components/Icon.vue';

// import { library } from '@fortawesome/fontawesome-svg-core';
// import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

// import { faLink, faBug, faPaste } from '@fortawesome/pro-light-svg-icons';
// import {
//     faDev,
//     faFacebookF,
//     faTwitter,
//     faTelegram,
//     faGithub,
// } from '@fortawesome/free-brands-svg-icons';

// library.add(faLink);
// library.add(faBug);
// library.add(faPaste);
// library.add(faDev);
// library.add(faFacebookF);
// library.add(faTwitter);
// library.add(faTelegram);
// library.add(faGithub);

// Vue.component('font-awesome-icon', FontAwesomeIcon);
Vue.component('shorten-form', ShortenForm);
Vue.component('shorten-info', ShortenInfo);
Vue.component('live', Live);
Vue.component('copyright', Copyright);
Vue.component('navbar', Navbar);
Vue.component('icon', Icon);

Vue.config.productionTip = false;

const app = new Vue({
    el: '#app'
});
