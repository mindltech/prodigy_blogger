require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';
import Vue from 'vue';
import VueAxios from 'vue-axios';
// import truncate from 'vue-truncate-collapsed';
import VueMomentLib from 'vue-moment-lib';
import VueMoment from 'vue-moment';
import moment from 'moment'

Vue.use(VueMomentLib);
Vue.use(VueMoment, {
    moment,
});


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('like', require('./components/Like').default);
// Vue.component('comment', require('./components/Comment.vue').default);
Vue.component('comment', require('./components/Comment').default);

Vue.component('posts', require('./components/Posts').default);

Vue.component('search', require('./components/Search').default);
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('tags', require('./components/Tags').default);



const app = new Vue({
    el: '#app',
    filters: {
        moment(date) {
            return moment(date).fromNow();
        }
    }
});
