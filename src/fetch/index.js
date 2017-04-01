import urls from '../config/urls';
import VueResource from 'vue-resource';
import Vue from 'vue';
import Storage from '../util/storage';

// Vue.use(VueResource);
// Vue.http.options.crossOrigin = true;
// Vue.http.options.credentials = true;
// Vue.http.interceptors.push((request, next)=> {
//   // 这里对请求体进行处理
//   request.headers = request.headers || {};
//   if (getCookie('token')) {
//     request.headers.Authorization = 'Bearer ' + getCookie('token').replace(/(^\")|(\"$)/g, '')
//   }
//   next((response) => {
//     // 这里可以对响应的结果进行处理
//   });
// });
const api = urls.api;
const storage = new Storage();
const getHeaders = () => {
  return {
    'Accept': 'application/json',
    'Content-Type': 'application/json',
    // 'Credentials': 'include',
  };
};

export default {
  async login(data) {
    try {
      console.log('this is login actions request', data);
      if (!data) return null;
      if (typeof data === 'object') {
        data = JSON.stringify(data);
      }
      const headers = getHeaders();
      const res = await fetch(api + '/login', {
        headers,
        mode: 'cors',
        method: 'POST',
        body: data,
      });
      let body = await res.json();
      body = body && typeof body === 'object' ? body : {};
      if (res.status === 200) {
        body.ok = true;
      } else if (res.status >= 500) {
        body.message = 'Server Error';
        body.ok = false;
      } else {
        body.ok = false;
      }
      return body;
    } catch (err) {
      return {
        message: 'Exception:' + err.message,
      };
    }
  },
  getUser() {
    return storage.getUser();
  }
}

