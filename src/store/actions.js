import fetch from '../fetch';

export default {
  async login({commit}, data) {
    const res = await fetch.login(data);
    if(res.ok) {
      commit('USER_LOGIN_SUCCESS', res)
    } else {
      commit('USER_LOGIN_FAILURE', res)
    }
  },
  register() {

  },
  posts() {

  },
}