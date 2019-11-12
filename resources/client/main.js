import Vue from 'vue';
import ArgonTheme from './argon/plugins/dashboard-plugin';
import router from './router/router';
import App from './App.vue';

window._ = require('lodash');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Vue.use(ArgonTheme);

/* eslint-disable no-new */
new Vue({
    el: '#app',
    render: (h) => h(App),
    router,
});
