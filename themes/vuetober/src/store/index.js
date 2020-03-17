/* eslint-disable no-unused-vars */
import Vue from 'vue';
import Vuex from 'vuex';
import Axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    status: '',
    token: localStorage.getItem('token') || '',
    user: JSON.parse(localStorage.getItem('user')) || {},
    teachers: [],
  },
  mutations: {
    auth_request(state) {
      state.status = 'loading';
    },
    auth_success(state, { token, user }) {
      state.status = 'success';
      state.token = token;
      state.user = { ...user };
    },
    auth_error(state) {
      state.status = 'error';
    },
    logout(state) {
      localStorage.removeItem('token');
      localStorage.removeItem('user');
      delete Axios.defaults.headers.common.Authorization;
      state.status = '';
      state.token = '';
      state.user = {};
    },
    addTeachers(state, teachers) {
      state.teachers = teachers;
    },
  },
  actions: {
    register({ commit }, authUser) {
      return new Promise((resolve, reject) => {
        commit('auth_request');
        Axios({ url: '/api/signup', data: authUser, method: 'POST' })
          .then((res) => {
            const { token } = res.data;
            const { user } = res.data;
            localStorage.setItem('user', JSON.stringify(user));
            localStorage.setItem('token', token);
            Axios.defaults.headers.common.Authorization = `Bearer ${
              token
            }`;
            commit('auth_success', { token, user });
            resolve(res);
          })
          .catch((err) => {
            commit('auth_error');
            localStorage.removeItem('user');
            localStorage.removeItem('token');
            reject(err);
          });
      });
    },
    login({ commit }, authUser) {
      return new Promise((resolve, reject) => {
        commit('auth_request');
        Axios({ url: '/api/login', data: authUser, method: 'POST' })
          .then((res) => {
            const { token } = res.data;
            const { user } = res.data;
            console.log('user', user);
            console.log('token', token);
            localStorage.setItem('user', JSON.stringify(user));
            localStorage.setItem('token', token);
            // eslint-disable-next-line dot-notation
            Axios.defaults.headers.common['Authorization'] = `Bearer ${
              token
            }`;
            commit('auth_success', { token, user });
            resolve(res);
          })
          .catch((err) => {
            commit('auth_error');
            localStorage.removeItem('user');
            localStorage.removeItem('token');
            reject(err);
          });
      });
    },
    logout({ commit, state }) {
      commit('logout');
      return new Promise((resolve, reject) => {
        Axios({ url: '/api/invalidate', data: { token: state.token }, method: 'POST' })
          .then((res) => {
            resolve();
          })
          .catch((err) => {
            reject(err);
          });
      });
    },
    fetchTeachers({ commit }) {
      return new Promise((resolve, reject) => {
        Axios
          .get('/api/teacher').then(({ data }) => {
            commit('addTeachers', data);
            resolve();
          }).catch((res) => {
            reject(res);
          });
      });
    },
  },
  getters: {
    isLoggedIn: (state) => !!state.token,
    authStatus: (state) => state.status,
    getTeachers: (state) => (search) => state.teachers
      .filter((teacher) => teacher.name.toLowerCase().includes(search)),
  },
});
