/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';

Vue.use(Vuetify);

// Root level components
Vue.component('guide', require('./pages/Guide.vue'));
Vue.component('edit-guide', require('./pages/EditGuide.vue'));

const app = new Vue({
  el: '#app'
});