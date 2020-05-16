import Vue from 'vue';

import App from './App.vue';
import router from './router';
import store from './store';

import { setup, created } from './custom';

setup();

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: (h) => h(App),
  created() {
    created(router, store);
  },
}).$mount('#app');
