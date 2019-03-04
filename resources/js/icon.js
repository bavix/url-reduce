/*jshint esversion: 6 */

import Vue from 'vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { faGithub, faFacebookF, faTelegram, faTwitter } from '@fortawesome/free-brands-svg-icons'
import { faPaste, faBug, faLink, faGlobe } from '@fortawesome/pro-light-svg-icons'

library.add(faGithub);
library.add(faFacebookF);
library.add(faTelegram);
library.add(faTwitter);
library.add(faPaste);
library.add(faBug);
library.add(faLink);
library.add(faGlobe);

Vue.component('font-awesome-icon', FontAwesomeIcon);

Vue.config.productionTip = false;
