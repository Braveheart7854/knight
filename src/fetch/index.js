import urls from '../config/urls';
import VueResource from 'vue-resource';
import Vue from 'vue';

Vue.use(VueResource);
Vue.http.options.crossOrigin = true;
Vue.http.options.credentials = true;
Vue.http.interceptors.push((request, next)=> {
  // 这里对请求体进行处理
  request.headers = request.headers || {};
  if (getCookie('token')) {
    request.headers.Authorization = 'Bearer ' + getCookie('token').replace(/(^\")|(\"$)/g, '')
  }
  next((response) => {
    // 这里可以对响应的结果进行处理
  });
});
const api = urls.api;
export default {
  login() {
    console.log('this is login actions request');
    Vue.resource(api + '/login');
  }
}