import fetch from '../fetch';

export default {
  async login({commit}, data) {
    const res = await fetch('/login', 'POST', data);
    if(res.ok) {
      commit('USER_LOGIN_SUCCESS', res)
    } else {
      commit('USER_LOGIN_FAILURE', res)
    }
  },
  register() {

  },
  async posts({commit}, data) {
    const res = await fetch('/', 'get');
    if(res.ok) {
      commit('POST_FETCH_SUCCESS', res)
    } else {
      commit('POST_FETCH_FAIL', res)
    }
  },
  async post({commit}, data) {

  },
  async article({commit}, data) {
    const res = await fetch('/admin/article', 'get', data);
    if(res.ok) {
      commit('ARTICLE_FETCH_SUCCESS', res)
    } else {
      commit('ARTICLE_FETCH_FAILURE', res)
    }
  },
  async delArt({commit}, {id}) {
    const res = await fetch('/admin/article/' +id, 'delete');
    if(res.ok) {
      commit('ARTICLE_FETCH_SUCCESS', res)
    } else {
      commit('ARTICLE_FETCH_FAILURE', res)
    }
  },
  async getArt({commit}, id) {
    const res = await fetch('/admin/article/' +id, 'get');
    if(res.ok) {
      commit('ARTICLE_DETAIL_SUCCESS', res)
    } else {
      commit('ARTICLE_DETAIL_FAILURE', res)
    }
  }
}