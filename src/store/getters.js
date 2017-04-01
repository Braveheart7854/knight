export default {
  getUserInfo(state) {
    console.log('______+++__?', state);
    return state.user.auth;
  }
}