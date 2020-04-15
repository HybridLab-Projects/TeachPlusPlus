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
    selectedTeacher: [],
  },
  mutations: {
    auth_request(state) {
      state.status = 'loading';
    },
    auth_success(state, { token, user }) {
      state.status = 'success';
      state.token = token;
      state.user = user;
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
      state.teachers = [];
    },
    addTeachers(state, teachers) {
      state.teachers = teachers;
    },
    selectTeacher(state, teacherId) {
      state.selectedTeacher = state.teachers.find(
        (teacher) => +teacher.id === +teacherId,
      );
    },
  },
  actions: {
    register({ commit }, authUser) {
      commit('auth_request');
      return Axios({ url: '/api/signup', data: authUser, method: 'POST' })
        .then(({ data }) => {
          const { token, user } = data;
          localStorage.setItem('user', JSON.stringify(user));
          localStorage.setItem('token', token);
          Axios.defaults.headers.common.Authorization = `Bearer ${
            token
          }`;
          commit('auth_success', { token, user });
        })
        .catch((err) => {
          commit('auth_error');
          localStorage.removeItem('user');
          localStorage.removeItem('token');
          throw err;
        });
    },
    login({ commit }, authUser) {
      commit('auth_request');
      return Axios({ url: '/api/login', data: authUser, method: 'POST' })
        .then(({ data }) => {
          const { token, user } = data;
          console.log('user', user);
          console.log('token', token);
          localStorage.setItem('user', JSON.stringify(user));
          localStorage.setItem('token', token);
          // eslint-disable-next-line dot-notation
          Axios.defaults.headers.common['Authorization'] = `Bearer ${
            token
          }`;
          commit('auth_success', { token, user });
        })
        .catch((err) => {
          commit('auth_error');
          localStorage.removeItem('user');
          localStorage.removeItem('token');
          throw err;
        });
    },
    logout({ commit, state }) {
      return Axios({ url: '/api/invalidate', data: { token: state.token }, method: 'POST' })
        .then(() => {
          commit('logout');
        })
        .catch((err) => {
          commit('logout');
          console.log(err);
          throw err;
        });
    },
    fetchTeachers({ commit, state }) {
      return Axios
        .get('/api/teacher').then(({ data }) => {
          commit('addTeachers', data);
          if (state.selectedTeacher.id) {
            commit('selectTeacher', state.selectedTeacher.id);
          }
          console.log(data);
        });
    },
    createFeedback({ state }, { feedback, teacherId, subjectId }) {
      return Axios({
        url: '/api/feedback',
        data: {
          feedback, teacher_id: teacherId, subject_id: subjectId, user_id: state.user.id,
        },
        method: 'POST',
      })
        .then(({ data }) => {
          console.log('success', data);
        }).catch((err) => {
          console.log('failed', err);
          throw err;
        });
    },
    selectTeacher({ commit }, teacherId) {
      commit('selectTeacher', teacherId);
    },
    like({ dispatch, state }, { id }) {
      return Axios(
        { url: '/api/like', data: { feedback_id: id, user_id: state.user.id }, method: 'POST' },
      )
        .then((data) => {
          console.log('liked', data);
          dispatch('fetchTeachers');
        }).catch((err) => {
          console.log(err);
          throw err;
        });
    },
  },
  getters: {
    isLoggedIn: (state) => !!state.token,
    authStatus: (state) => state.status,
    getUser: (state) => state.user,
    getTeachers: (state) => (search) => state.teachers
      .filter((teacher) => teacher.surname.toLowerCase().includes(search)
        || teacher.name.toLowerCase().includes(search)),
    getSelectedTeacher: (state) => state.selectedTeacher,
  },
});
