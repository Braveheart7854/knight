import Vue from 'vue'
import Vuex from 'vuex'
import user from './modules/user';
import post from './modules/post';
import article from './modules/article';
import admin from './modules/admin';
import actions from './actions';
import getters from './getters';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    user,
    post,
    article,
    admin,
  },
  strict: true,
  actions,
  getters,
  debug: true,
});