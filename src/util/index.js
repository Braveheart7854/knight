export default {
  queryString(obj) {
    if(typeof obj === 'string') obj = JSON.parse(obj);
    const string = [];
    for(const key in obj) {
      string.push(key + '=' + obj[key]);
    }
    return string.join('&');
  }
}