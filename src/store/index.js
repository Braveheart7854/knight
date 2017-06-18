import Vue from 'vue'
import Vuex from 'vuex'
import user from './modules/user';
import post from './modules/post';
import article from './modules/article';
import admin from './modules/admin';
import actions from './actions';
import getters from './getters';
import comment from './modules/comment';
import category from './modules/category';
import Cellar from '../util/storage';

Vue.use(Vuex);
const $storage = new Cellar();
const auth = store => {
  // 当 store 初始化后调用
  store.subscribe((mutation, state) => {
    store.path = '/login';
    if (
      mutation.type === 'FETCH_FAILURE' &&
      mutation.payload.certification === false
    ) {
      $storage.clear();
      // window.location = '/#/login';
    }
  });
};
export default new Vuex.Store({
  modules: {
    user,
    post,
    article,
    admin,
    comment,
    category
  },
  strict: true,
  actions,
  getters,
  debug: true,
  plugins: [auth],
});