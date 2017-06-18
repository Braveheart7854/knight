import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routers';
import store from './store';
import VueMaterial from 'vue-material';
import 'vue-material/dist/vue-material.css';
import FastClick from 'fastclick';
import { sync } from 'vuex-router-sync';
import mdIcon from './assets/md-icon.css';
import Cellar from './util/storage';
import App from './App.vue';

const storage = new Cellar();
window.addEventListener('load', () => {
  FastClick.attach(document.body)
});
Vue.use(VueRouter);
const router = new VueRouter({
  mode: 'hash',
  routes,
});
window.$router = router;
sync(store, router);
router.beforeEach((to, from, next, ...rest) => {
  const meta = to.meta || {};
  const user = storage.getUser();
  const path = to.path;
  if (meta.auth && !user && path !== '/login') {
    return next({ path: '/login' });
  }
  if(user && path === '/login' ){
    return next({ path: '/admin/home' });
  }
  next();
});
Vue.use(VueMaterial);
Vue.material.registerTheme({
  default: {
    primary: 'cyan',
    accent: 'pink'
  },
  indigo: {
    primary: 'indigo',
    accent: 'pink'
  }
});
new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app');





