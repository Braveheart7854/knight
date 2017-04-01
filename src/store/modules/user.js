const USER_LOGIN_SUCCESS = 'USER_LOGIN_SUCCESS';
const USER_LOGIN_FAILURE = 'USER_LOGIN_FAILURE';
const USER_LOGOUT_SUCCESS = 'USER_LOGOUT_SUCCESS';
const USER_UPDATE_SUCCESS = 'USER_UPDATE_SUCCESS';
const USER_LOGIN_CHANGE = 'USER_LOGIN_CHANGE';

const state = {
  token: null,
  user: {},
  auth: {},
};

const mutations = {
  [USER_LOGIN_SUCCESS](state, payload){
    state.token = payload.token;
    state.auth = payload;
  },
  [USER_LOGIN_FAILURE](state, payload){
    console.log('ffffail', payload);
    state.auth = payload;
  },
  [USER_LOGOUT_SUCCESS](state, action){
    state.token = getCookie('token') || null;
    state.user = null;
    state.token = null;
  },
  [USER_UPDATE_SUCCESS](state, action){
    state.user = action.user;
  },
  [USER_LOGIN_CHANGE] (state, item) {
    state.auth = Object.assign(state.auth || {}, item);
  }
};

export default {
  state,
  mutations
}