import Vue from 'vue';
import VueResource from 'vue-resource';
import VueRouter from 'vue-router';
import routes from './routers';
// import store from './vuex/store';
import VueMaterial from 'vue-material';
import 'vue-material/dist/vue-material.css'
import FastClick from 'fastclick';
import mdIcon from './assets/md-icon.css'
// import { sync } from 'vuex-router-sync';

import App from './App';

window.addEventListener('load', () => {
  FastClick.attach(document.body)
});
const router = new VueRouter({
  routes // （缩写）相当于 routes: routes
});
Vue.use(VueRouter);
// sync(store, router);

Vue.use(VueResource);
// router.beforeEach((to, from, next) => {
//     console.log(to, from, next);
//     next()
// });
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
  el: '#app',
  render: h => h(App),
});





