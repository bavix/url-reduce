/*jshint esversion: 6 */
import Vue from 'vue';
import Vuex from 'vuex';
import has from 'lodash/has';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    handle: null,
    attempts: 0,
    submitting: false,
    loading: false,
    link: null,
    error: '',
    url: '',
    total: 0,
    links: [],
    hashes: [],
  },
  mutations: {
    addLink(state, link) {
      state.links.push(link);
      state.hashes.push(link.hash);
    },
    live(state, link) {
      if (!state.hashes.includes(link.hash)) {
        state.total++;
        state.hashes.push(link.hash);
        if (state.links.length) {
          state.links.pop();
        }
        state.links.unshift(link);
      }
    },
    setTotal(state, total) {
      state.total = total;
    },
    setHandle(state, id) {
      state.handle = id;
    },
    setUrl(state, url) {
      state.url = url;
      state.attempts = 0;
      if (state.handle) {
        clearInterval(state.handle);
        state.handle = null;
      }
    },
    onSubmit(state) {
      state.attempts++;
      state.submitting = true;
      state.loading = true;
    },
    onSuccess(state, res) {
      state.error = '';
      state.submitting = false;
      state.link = res.data;
      state.loading = !res.data.loaded;
    },
    onError(state, data) {
      state.loading = false;
      state.submitting = false;
      if (data.response && has(data.response.data, 'errors.url')) {
        state.error = data.response.data.errors.url.shift();
        state.link = null;
      }
    },
  },
  getters: {
    getUrl(state) {
      return state.url.length && !/^[a-z]+?:\/\//.test(state.url) ?
        'http://' + state.url :
        state.url;
    },
    getAttempts(state) {
      return state.attempts;
    },
  },
  actions: {
    addLinks(state, links) {
      for (const link of links) {
        state.commit('addLink', link);
      }
    }
  }
});
