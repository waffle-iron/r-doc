/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');
// window.GuideData = require('./data.js');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('guide', require('./components/Guide.vue'));
Vue.component('guide-header-navigation', require('./components/Guides/GuideHeaderNavigation.vue'));
Vue.component('guide-image', require('./components/Guides/GuideImage.vue'));
Vue.component('guide-introduction', require('./components/Guides/GuideIntroduction.vue'));
Vue.component('guide-step', require('./components/Guides/GuideStep.vue'));
Vue.component('guide-completed', require('./components/Guides/GuideCompleted.vue'));
Vue.component('edit-guide', require('./components/EditGuide.vue'));
Vue.component('steps-guide-index', require('./components/Guides/StepsGuideIndex.vue'));
Vue.component('guide-edit-introduction', require('./components/Guides/GuideEditIntroduction.vue'));
Vue.component('edit-navbar', require('./components/Guides/EditNavbar.vue'));

const app = new Vue({
  el: '#app'
});