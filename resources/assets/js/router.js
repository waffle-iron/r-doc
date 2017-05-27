import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './pages/Home.vue';
import Login from './pages/Login.vue';
import Dashboard from './pages/Dashboard.vue';
import Guide from './pages/Guide.vue';
import GuideEdit from './pages/GuideEdit.vue';
import GuideStepEdit from './components/GuideStepEdit.vue';
import GuideHistory from './pages/GuideHistory.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: Home,
    name: 'home'
  },
  {
    path: '/guide/:id',
    component: Guide,
    name: 'guide'
  },
  {
    path: '/guide/:id/history',
    component: GuideHistory,
    name: 'guide-history'
  },
  {
    path: '/guide/:id/edit',
    component: GuideEdit,
    name: 'guide-edit'
  },
  {
    path: '/guide/:id/edit/:stepid',
    component: GuideStepEdit,
    name: 'edit-guide-step'
  },
  {
    path: '/login',
    component: Login,
    name: 'login'
  },
  {
    path: '/dashboard',
    component: Dashboard,
    name: 'dashboard',
    meta: {requiresAuth: true}
  }
];

const router = new VueRouter({
  routes,
  mode: 'history',
  linkActiveClass: 'active'
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(m => m.meta.requiresAuth)) {
    const authUser = window.localStorage.getItem('authUser');
    if (!authUser) {
      return next({path: '/login'})
    }
  }
  return next();
});

export default router;