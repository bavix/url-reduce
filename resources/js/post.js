/*jshint esversion: 6 */

import _ from 'lodash';

class Post {
    constructor(data) {
        this.title = _.get(data, 'parameters.title');
        this.content = _.get(data, 'parameters.description');
        this.hash = _.get(data, 'hash');
        this.tags = _.get(data, 'parameters.tags');
    }
}

export default Post;
