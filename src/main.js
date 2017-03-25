import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routers';
import store from './store';
import VueMaterial from 'vue-material';
import 'vue-material/dist/vue-material.css'
import FastClick from 'fastclick';
import { sync } from 'vuex-router-sync'
import mdIcon from './assets/md-icon.css'

import App from './App';
window.addEventListener('load', () => {
  FastClick.attach(document.body)
});
const router = new VueRouter({
  routes // （缩写）相当于 routes: routes
});
// router.beforeEach((to, from, next) => {
//   console.log(to, from, next);
//   next()
// });
Vue.use(VueRouter);
// Vue.use(VueResource);
sync(store, router);
Vue.use(VueMaterial);
Vue.material.theme.registerAll({
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
  el: '#app',
  render: h => h(App),
});





