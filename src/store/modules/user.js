const USER_LOGIN_REQUEST = 'USER_LOGIN_REQUEST';
const USER_LOGIN_SUCCESS = 'USER_LOGIN_SUCCESS';
const USER_LOGIN_FAILURE = 'USER_LOGIN_FAILURE';
const USER_LOGOUT_SUCCESS = 'USER_LOGOUT_SUCCESS';
const USER_UPDATE_SUCCESS = 'USER_UPDATE_SUCCESS';
const USER_LOGIN_CHANGE = 'USER_LOGIN_CHANGE';

import storage from '../../util/storage';

const $storage = new storage();
const state = {
  token: null,
  user: {},
  auth: {},
};

const mutations = {
  [USER_LOGIN_SUCCESS](state, payload){
    const {data, message, ok }  = payload;
    $storage.setItem('token', data.token);
    $storage.setUser(data.user);
    state.token = data.token;
    state.auth = data.user;
    state.message = message;
    state.ok = ok;
  },
  [USER_LOGIN_REQUEST](state, payload){
    state.token = payload.token;
    state.auth = payload;
  },
  [USER_LOGIN_FAILURE](state, payload){
    const {message, ok }  = payload;
    state.message = message;
    state.ok = ok;
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