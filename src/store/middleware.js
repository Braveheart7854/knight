import createLogger from 'vuex/dist/logger'
import storage from '../util/storage';
const checkAuth = store => {
  store.subscribe((mutation, state) =>  {
    const user = storage.getUser();
    if (!user) {
      this.$router.push('/login');
    }
  });
}

export default process.env.NODE_ENV !== 'production' ? [createLogger(), checkAuth] : [checkAuth];