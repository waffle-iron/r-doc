import './bootstrap'
import Vue from 'vue'
import router from './router.js'
import Vuetify from 'vuetify'
import VuePaginate from 'vue-paginate'
import store from './store.js'

Vue.use(Vuetify)
Vue.use(VuePaginate)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store
})
