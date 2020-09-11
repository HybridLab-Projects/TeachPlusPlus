import Vue from 'vue';

import App from './App.vue';
import router from './router';
import store from './store';

import Custom from './custom';

Custom.setup();

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: (h) => h(App),
  created() {
    Custom.created();
  },
}).$mount('#app');
