import urls from '../config/urls';
import cookie from 'js-cookie';
export default class storage {

  constructor (tokenName = 'knight') {
    if (!window.localStorage) {
      cookie.setItem = cookie.set;
      cookie.getItem = cookie.get;
      cookie.removeItem = cookie.remove;
      this.store = cookie;
    } else {
      this.store = window.localStorage;
    }
    this.key = urls.domain + '#' + tokenName;
  }

  setItem(key, value) {
    return this.store.setItem(key, value);
  }

  getItem(key, value) {
    return this.store.getItem(key, value);
  }

  setUser (user) {
    if (!user) return false;
    if (typeof user === 'object') {
      user = JSON.stringify(user);
    }
    return this.store.setItem(this.key, user);
  }

  getUser () {
    try {
      const user = this.store.getItem(this.key);
      if (!user) return false;
      return typeof user === 'object' ? user : JSON.parse(user);
    } catch (err) {
      console.log(err);
      return false;
    }
  }

  clearUser (key) {
    key = key || this.key;
    this.store.removeItem(key);
  }
}
