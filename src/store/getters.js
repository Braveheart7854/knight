export default {
  getAuthorization(state) {
    return state.user.auth;
  },
  getUser({ user }) {
    return user;
  },
  getPost({post}) {
    console.log('00000000', post);
    return post;
  }
}