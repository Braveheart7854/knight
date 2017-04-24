export default {
  queryString(obj) {
    if(typeof obj === 'string') obj = JSON.parse(obj);
    const string = [];
    for(const key in obj) {
      console.log('__---__--__', key, obj[key]);
      string.push(key + '=' + obj[key]);
    }
    return string.join('&');
  }
}