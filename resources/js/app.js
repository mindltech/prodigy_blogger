require('./bootstrap');

window.Vue = require('vue');

import axios from 'axios';
import Vue from 'vue'
import VueAxios from 'vue-axios'


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('like', require('./components/Like').default);
// Vue.component('comment', require('./components/Comment.vue').default);
Vue.component('comment', require('./components/Comment').default);
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);




const app = new Vue({
    el: '#app',  
});
