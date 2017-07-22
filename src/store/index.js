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
    console.log('-------', mutation, state, store);
    if (
      mutation.type === 'FETCH_FAILURE' &&
      mutation.payload.certification === false
    ) {
      $storage.clear();
      state.user.auth = null;
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