require('./bootstrap');

import Vue from 'vue';
import router from './router.js';
import Vuetify from 'vuetify';
import VuePaginate from 'vue-paginate';

Vue.use(Vuetify);
Vue.use(VuePaginate);

const app = new Vue({
  el: '#app',
  router
});