/*jshint esversion: 6 */
import Vue from 'vue';
import Vuex from 'vuex';
import has from 'lodash/has';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        submitting: false,
        loading: false,
        error: '',
        url: '',
        total: 0,
        links: [],
        hashes: [],
    },
    mutations: {
        addLink(state, link) {
            'use strict';
            state.links.push(link);
            state.hashes.push(link.hash);
        },
        increment(state, link) {
            'use strict';
            if (state.hashes.includes(link.hash)) {
                state.total++;
            }
        },
        setTotal(state, total) {
            'use strict';
            state.total = total;
        },
        setUrl(state, url) {
            'use strict';
            state.url = url;
        },
        onSubmit(state) {
            'use strict';
            state.submitting = true;
            state.loading = true;
        },
        onSuccess(state, data) {
            'use strict';
            state.error = '';
            state.submitting = false;
            state.loading = !data.loaded;
        },
        onError(state, data) {
            'use strict';
            state.loading = false;
            state.submitting = false;
            if (has(data.response.data, 'errors.url')) {
                state.error = data.response.data.errors.url.shift();
            }
        },
    },
    getters: {
        getUrl(state) {
            'use strict';
            return state.url.length && !/^[a-z]+?:\/\//.test(state.url) ?
                'http://' + state.url :
                state.url;
        }
    },
    actions: {
        addLinks(state, links) {
            'use strict';
            for (const link of links) {
                state.commit('addLink', link);
            }
        }
    }
});
