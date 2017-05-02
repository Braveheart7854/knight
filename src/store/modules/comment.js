const COMMENT_FETCH_REQUEST = 'COMMENT_FETCH_REQUEST';
const COMMENT_FETCH_SUCCESS = 'COMMENT_FETCH_SUCCESS';
const COMMENT_FETCH_FAILURE = 'COMMENT_FETCH_FAILURE';
const COMMENT_FETCH_CHANGE = 'COMMENT_FETCH_CHANGE';
const COMMENT_DETAIL_SUCCESS = 'COMMENT_DETAIL_SUCCESS';

const state = {
  comment: {},
  message: '',
  ok: false,
};

const mutations = {
  [COMMENT_FETCH_SUCCESS](state, payload){
    const { data, message, ok }  = payload;
    state.comment = data;
    state.message = message;
    state.ok = ok;
  },
  [COMMENT_FETCH_FAILURE](state, payload){
    const { message, ok }  = payload;
    state.message = message;
    state.ok = ok;
  },
  [COMMENT_FETCH_CHANGE] (state, item) {
    state.auth = Object.assign(state.auth || {}, item);
  }
};

export default {
  state,
  mutations
}