import Vue from 'vue'
import Vuex from 'vuex'
import middleware from './middleware';
import user from './modules/user';
import post from './modules/post';
import actions from './actions';
import getters from './getters';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    user,
    post,
  },
  strict: true,
  actions,
  getters,
  debug: true,
});