import Vue from 'vue';
import ArgonTheme from './argon/plugins/dashboard-plugin';
import store from './store'
import router from './router/router';
import App from './App.vue';
import {Select, Option} from 'element-ui'

window._ = require('lodash');
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Vue.use(ArgonTheme);
Vue.use(Select);
Vue.use(Option);

/* eslint-disable no-new */
new Vue({
    el: '#app',
    store,
    router,
    render: (h) => h(App),
});
