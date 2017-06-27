import Cellar from '../../util/storage';
const ARTICLE_FETCH_REQUEST = 'ARTICLE_FETCH_REQUEST';
const ARTICLE_FETCH_SUCCESS = 'ARTICLE_FETCH_SUCCESS';
const ARTICLE_FETCH_FAILURE = 'ARTICLE_FETCH_FAILURE';
const ARTICLE_FETCH_CHANGE = 'ARTICLE_FETCH_CHANGE';
const ARTICLE_DELETE_SUCCESS = 'ARTICLE_DELETE_SUCCESS';
const ARTICLE_DETAIL_SUCCESS = 'ARTICLE_DETAIL_SUCCESS';
const ARTICLE_DETAIL_FAILURE = 'ARTICLE_DETAIL_FAILURE';
const SURVEY_FETCH_SUCCESS = 'SURVEY_FETCH_SUCCESS';
const FETCH_FAILURE = 'FETCH_FAILURE';
const state = {
  article: [],
  message: '',
  ok: false,
};

const mutations = {
  [ARTICLE_FETCH_SUCCESS](state, payload){
    const { data, message, ok }  = payload;
    state.article = data;
    state.message = message;
    state.ok = ok;
  },
  [ARTICLE_FETCH_REQUEST](state, payload){
    const { message, ok }  = payload;
    state.message = message;
    state.ok = ok;
  },
  [ARTICLE_FETCH_FAILURE](state, payload){
    const { message, ok }  = payload;
    state.message = message;
    state.ok = ok;
  },
  [ARTICLE_FETCH_CHANGE] (state, item) {
    state.auth = Object.assign(state.auth || {}, item);
  },
  [ARTICLE_DELETE_SUCCESS] (state, payload) {
    const { message, ok }  = payload;
    state.message = message;
    state.ok = ok;
  },
  [ARTICLE_DETAIL_SUCCESS] (state, payload) {
    const { data, message, ok }  = payload;
    state.article = data;
    state.message = message;
    state.ok = ok;
  },
  [SURVEY_FETCH_SUCCESS](state, payload){
    const { data, message, ok }  = payload;
    state.survey = data;
    state.message = message;
    state.ok = ok;
  },
  [FETCH_FAILURE](state, payload){

    const { message, ok, certification }  = payload;
    state.message = message;
    state.ok = ok;
  },
};

export default {
  state,
  mutations
};
