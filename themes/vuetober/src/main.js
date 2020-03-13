import Vue from 'vue';

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import './custom.scss';

import { ValidationProvider, extend } from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';
import { messages } from 'vee-validate/dist/locale/sk.json';

import Axios from 'axios';

import App from './App.vue';
import router from './router';
import store from './store';

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

Object.keys(rules).forEach((rule) => {
  extend(rule, {
    ...rules[rule], // copies rule configuration
    message: messages[rule], // assign message
  });
});

extend('upperCase', {
  validate: (value) => value !== value.toLowerCase(),
  message: '{_field_} musí obsahovať veľké písmeno',
});
extend('containsNumber', {
  validate: (value) => /\d/.test(value),
  message: '{_field_} musí obsahovať číslicu',
});
Vue.component('ValidationProvider', ValidationProvider);


Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: (h) => h(App),
  created() {
    const token = localStorage.getItem('token');
    if (token) {
      // eslint-disable-next-line dot-notation
      Axios.defaults.headers.common['Authorization'] = `Bearer ${
        token
      }`;
    }
    console.log('token');

    Axios.interceptors.response.use(
      (response) => response,
      (error) => {
        if (error.response.status === 401) {
          this.$store.dispatch('logout');
        }
        return Promise.reject(error);
      },
    );
  },
}).$mount('#app');
