window._ = require('lodash');
import Vue from 'vue';

//components
try {
    require('bootstrap');
} catch (e) {}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

//register components
Vue.component('AdminPage', require('./components/Views/AdminPage').default);
Vue.component('HomePage', require('./components/views/HomePage').default);

