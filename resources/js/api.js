/*jshint esversion: 6 */

import axios from 'axios';

const api = {
    live(success, error) {
        'use strict';
        return axios.get('/api/live')
            .then(success)
            .catch(error);
    },
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
