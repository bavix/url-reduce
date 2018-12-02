/*jshint esversion: 6 */

import axios from 'axios';

const api = {
    create(url, success, error) {
        'use strict';
        return axios.post('/api/add', {url})
            .then(success)
            .catch(error);
    },
    report(hash, success, error) {
        'use strict';
        return axios.post('/api/report', {hash})
            .then(success)
            .catch(error);
    }
};

export default api;
