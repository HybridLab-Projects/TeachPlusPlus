/* eslint-disable no-unused-vars */
import Vue from 'vue';
import Vuex from 'vuex';
import Axios from 'axios';
import auth from './auth';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    auth,
  },
  state: {
    teachers: [],
    selectedTeacher: {},
  },
  mutations: {
    teachersAdded(state, teachers) {
      state.teachers = teachers;
    },
    teacherSelected(state, teacherId) {
      state.selectedTeacher = state.teachers.find(
        (teacher) => teacher.id === teacherId,
      ) || [];
    },
  },
  actions: {
    fetchTeachers({ commit, state }) {
      return Axios
        .get('/api/teacher').then(({ data }) => {
          commit('teachersAdded', data);
          if (state.selectedTeacher.id) {
            commit('teacherSelected', state.selectedTeacher.id);
          }
          console.log(data);
        });
    },
    createFeedback({ state }, { feedback, teacherId, subjectId }) {
      return Axios({
        url: '/api/feedback',
        data: {
          feedback, teacher_id: teacherId, subject_id: subjectId, token: state.token,
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
      commit('teacherSelected', teacherId);
    },
    like({ dispatch, state }, { id }) {
      return Axios(
        { url: '/api/like', data: { feedback_id: id, token: state.token }, method: 'POST' },
      )
        .then((data) => {
          console.log('liked', data);
          dispatch('fetchTeachers');
        }).catch((err) => {
          console.log(err);
          throw err;
        });
    },
    report({ dispatch, state }, { id }) {
      return Axios(
        { url: '/api/report', data: { feedback_id: id, token: state.token }, method: 'POST' },
      )
        .then((data) => {
          console.log('reported', data);
          dispatch('fetchTeachers');
        }).catch((err) => {
          console.log(err);
          throw err;
        });
    },
  },
  getters: {
    getTeachers: (state) => (search) => state.teachers
      .filter((teacher) => teacher.surname.toLowerCase().includes(search)
        || teacher.name.toLowerCase().includes(search)),
    getTeacherById: (state) => (id) => state.teachers.find((teacher) => teacher.id === id),
    getSelectedTeacher: (state) => state.selectedTeacher,
  },
});
