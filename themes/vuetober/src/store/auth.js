import Axios from 'axios';

export default {
  state: {
    status: '',
    token: localStorage.getItem('token') || '',
    user: JSON.parse(localStorage.getItem('user')) || {},
  },

  mutations: {
    authRequested(state) {
      state.status = 'loading';
    },
    authSucceeded(state, { token, user }) {
      localStorage.setItem('user', JSON.stringify(user));
      localStorage.setItem('token', token);
      // eslint-disable-next-line dot-notation
      Axios.defaults.headers.common['Authorization'] = `Bearer ${
        token
      }`;
      state.status = 'success';
      state.token = token;
      state.user = user;
    },
    authFailed(state) {
      state.status = 'error';
    },
    authRevoked(state) {
      localStorage.removeItem('token');
      localStorage.removeItem('user');
      delete Axios.defaults.headers.common.Authorization;
      state.status = '';
      state.token = '';
      state.user = {};
      state.teachers = [];
      state.selectedTeacher = [];
    },
  },
  actions: {
    register({ commit }, authUser) {
      commit('authRequested');
      return Axios({ url: '/api/signup', data: authUser, method: 'POST' })
        .then(({ data }) => {
          const { token, user } = data;
          commit('authSucceeded', { token, user });
        })
        .catch((err) => {
          commit('authFailed');
          commit('authRevoked');
          throw err;
        });
    },
    login({ commit }, authUser) {
      commit('authRequested');
      return Axios({ url: '/api/login', data: authUser, method: 'POST' })
        .then(({ data }) => {
          const { token, user } = data;
          commit('authSucceeded', { token, user });
        })
        .catch((err) => {
          commit('authFailed');
          commit('authRevoked');
          throw err;
        });
    },
    logout({ commit, state }) {
      return Axios({ url: '/api/invalidate', data: { token: state.token }, method: 'POST' })
        .then(() => {
          commit('authRevoked');
        })
        .catch((err) => {
          commit('authRevoked');
          console.log(err);
          throw err;
        });
    },
  },
  getters: {
    isLoggedIn: (state) => !!state.token,
    getAuthStatus: (state) => state.status,
    getUser: (state) => state.user,
  },
};
