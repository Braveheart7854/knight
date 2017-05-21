const CATEGORY_FETCH_REQUEST = 'CATEGORY_FETCH_REQUEST';
const CATEGORY_FETCH_SUCCESS = 'CATEGORY_FETCH_SUCCESS';
const CATEGORY_FETCH_FAILURE = 'CATEGORY_FETCH_FAILURE';
const CATEGORY_FETCH_CHANGE = 'CATEGORY_FETCH_CHANGE';
const CATEGORY_DETAIL_SUCCESS = 'CATEGORY_DETAIL_SUCCESS';

const state = {
  category: {},
  message: '',
  ok: false,
};

const mutations = {
  [CATEGORY_FETCH_SUCCESS](state, payload){
    const { data, message, ok }  = payload;
    state.category = data;
    state.message = message;
    state.ok = ok;
  },
  [CATEGORY_FETCH_FAILURE](state, payload){
    const { message, ok }  = payload;
    state.message = message;
    state.ok = ok;
  },
  [CATEGORY_FETCH_CHANGE] (state, item) {
    state.auth = Object.assign(state.auth || {}, item);
  }
};

export default {
  state,
  mutations
}