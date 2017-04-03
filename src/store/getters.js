export default {
  getAuthorization(state) {
    return state.user.auth;
  },
  getUser({ user }) {
    return user;
  },
  getPost({post}) {
    return post;
  }
}