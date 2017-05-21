const ARTICLE_FETCH_REQUEST = 'ARTICLE_FETCH_REQUEST';
const ARTICLE_FETCH_SUCCESS = 'ARTICLE_FETCH_SUCCESS';
const ARTICLE_FETCH_FAILURE = 'ARTICLE_FETCH_FAILURE';
const ARTICLE_FETCH_CHANGE = 'ARTICLE_FETCH_CHANGE';
const ARTICLE_ADD_SUCCESS = 'ARTICLE_ADD_SUCCESS';
const ARTICLE_ADD_FAILURE = 'ARTICLE_ADD_FAILURE';

const state = {
  article: {},
  message: '',
  ok: false,
};

const mutations = {
  [ARTICLE_FETCH_SUCCESS](state, payload){
    const {data, message, ok }  = payload;
    console.log('=====>', data, message, ok);
    state.article = data;
    state.message = message;
    state.ok = ok;
  },
  [ARTICLE_FETCH_REQUEST](state, payload){
    const {message, ok }  = payload;
    state.message = message;
    state.ok = ok;
  },
  [ARTICLE_FETCH_FAILURE](state, payload){
    const {message, ok }  = payload;
    state.message = message;
    state.ok = ok;
  },
  [ARTICLE_FETCH_CHANGE] (state, item) {
    state.auth = Object.assign(state.auth || {}, item);
  },
  [ARTICLE_ADD_SUCCESS] (state, payload) {
    const {message, ok }  = payload;
    state.message = message;
    state.ok = ok;
  },
  [ARTICLE_ADD_FAILURE] (state, payload) {
    const {message, ok }  = payload;
    state.message = message;
    state.ok = ok;
  }
};

export default {
  state,
  mutations
};
