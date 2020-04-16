import Vue from 'vue';
import VueRouter from 'vue-router';
import store from '../store/index';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import(/* webpackChunkName: "about" */ '../views/Home.vue'),
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import(/* webpackChunkName: "about" */ '../views/Login.vue'),
    beforeEnter: (to, from, next) => {
      if (store.getters.isLoggedIn) { next({ name: 'Teachers' }); } else next();
    },
  },
  {
    path: '/register',
    name: 'Register',
    component: () => import(/* webpackChunkName: "about" */ '../views/Register.vue'),
    beforeEnter: (to, from, next) => {
      if (store.getters.isLoggedIn) { next({ name: 'Teachers' }); } else next();
    },
  },
  {
    path: '/teachers/:id?',
    name: 'Teachers',
    component: () => import(/* webpackChunkName: "about" */ '../views/Teachers.vue'),
    beforeEnter: (to, from, next) => {
      if (!store.getters.isLoggedIn) { next({ name: 'Login' }); } else next();
    },
    props: true,
  },
  {
    path: '/feedback',
    name: 'Feedback',
    component: () => import(/* webpackChunkName: "about" */ '../views/Feedback.vue'),
  },
];

const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router;
