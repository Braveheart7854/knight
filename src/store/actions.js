import fetch from '../fetch';

export default {
  login({state, commit}, data) {
    console.log('********action', state, commit, data);
    fetch.login();
  },
  register() {

  },
  posts() {

  },
}