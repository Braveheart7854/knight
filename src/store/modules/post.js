const POST_FETCH_REQUEST = 'POST_FETCH_REQUEST';
const POST_FETCH_SUCCESS = 'POST_FETCH_SUCCESS';
const POST_FETCH_FAILURE = 'POST_FETCH_FAILURE';
const POST_FETCH_CHANGE = 'POST_FETCH_CHANGE';
const POST_DETAIL_SUCCESS = 'POST_DETAIL_SUCCESS';
const POST_PAGE_CHANGED = 'POST_PAGE_CHANGED';
const FETCH_FAILUER = 'FETCH_FAILUER';

const state = {
  post: {},
  message: '',
  ok: false,
};

const mutations = {
  [POST_FETCH_SUCCESS](state, payload){
    const { data, message, ok }  = payload;
    state.post = data;
    state.message = message;
    state.ok = ok;
  },
  [POST_DETAIL_SUCCESS](state, payload) {
    const { data, message, ok }  = payload;
    state.post = data;
    state.message = message;
    state.ok = ok;
  },
  [POST_FETCH_REQUEST](state, payload){
    state.token = payload.token;
    state.auth = payload;
  },
  [POST_FETCH_FAILURE](state, payload){
    const { message, ok }  = payload;
    state.message = message;
    state.ok = ok;
  },
  [POST_FETCH_CHANGE] (state, item) {
    state.auth = Object.assign(state.auth || {}, item);
  },
  [POST_PAGE_CHANGED](state, page) {
    state.post.page = page;
  },
  [FETCH_FAILUER](state, payload){
    const { message, ok }  = payload;
    state.message = message;
    state.ok = ok;
  },
};

export default {
  state,
  mutations
}