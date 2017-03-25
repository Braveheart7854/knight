const USER_LOGIN_SUCCESS = 'USER_LOGIN_SUCCESS';
const USER_LOGIN_FAILURE = 'USER_LOGIN_FAILURE';
const USER_LOGOUT_SUCCESS = 'USER_LOGOUT_SUCCESS';
const USER_UPDATE_SUCCESS = 'USER_UPDATE_SUCCESS';
const USER_LOGIN_CHANGE = 'USER_LOGIN_CHANGE';

const state = {
  token: null,
  user: {},
};

const mutations = {
  [USER_LOGIN_SUCCESS](state, action){
    state.token = action.token;
  },
  [USER_LOGIN_FAILURE](state, action){
    state.user = null;
  },
  [USER_LOGOUT_SUCCESS](state, action){
    state.token = getCookie('token') || null;
    state.user = null;
    state.token = null;
  },
  [USER_UPDATE_SUCCESS](state, action){
    state.user = action.user;
  },
  [USER_LOGIN_CHANGE] (state, field, value) {
    console.log('this is mutations change');
    state.user[field] = value;
  }
};

export default {
  state,
  mutations
}