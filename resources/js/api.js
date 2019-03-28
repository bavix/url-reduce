/*jshint esversion: 6 */

import axios from 'axios';

export default {
  live(success, error) {
    return axios.get('/api/live')
      .then(success)
      .catch(error);
  },
  create(url, success, error) {
    return axios.post('/api/add', {url})
      .then(success)
      .catch(error);
  },
  report(hash, success, error) {
    return axios.post('/api/report', {hash})
      .then(success)
      .catch(error);
  }
};
