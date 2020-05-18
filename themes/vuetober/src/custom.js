import Vue from 'vue';

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import './custom.scss';

import { ValidationProvider, extend } from 'vee-validate';
import * as rules from 'vee-validate/dist/rules';
import { messages } from 'vee-validate/dist/locale/sk.json';

import Axios from 'axios';

export function setup() {
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
}

export function created(router, store) {
  const token = localStorage.getItem('token');
  if (token) {
    // eslint-disable-next-line dot-notation
    Axios.defaults.headers.common['Authorization'] = `Bearer ${
      token
    }`;
  }

  Axios.interceptors.response.use(
    (response) => response,
    (error) => {
      if ((error.response.status === 401 && error.response.data.error === 'token_expired')
      || (error.response.status === 400 && error.response.data.error === 'token_invalid')) {
        store.dispatch('logout').finally(() => router.push('/'));
      }
      return Promise.reject(error);
    },
  );
}
