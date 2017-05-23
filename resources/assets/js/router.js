import Vue from 'vue';
import VueRouter from 'vue-router';

import Guide from './pages/Guide.vue';
import EditGuide from './pages/EditGuide.vue';
import Login from './pages/Login.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: Login
  }
];

const router = new VueRouter({
  routes,
  mode: 'history',
  linkActiveClass: 'active'
});

export default router;