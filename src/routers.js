import Starry from './views/starry.vue';
import Home from './views/home.vue';
export default [
  {
    path: '/post/:id',
    name: '/detail',
    component: require('./views/article.vue')
  },
  {
    path: '/post',
    name: 'post',
    component: require('./views/post')
  },
  {
    path: '/editor',
    name: 'editor',
    component: require('./views/editor'),
  },
  {
    path: '/list',
    name: 'list',
    component: require('./views/table'),
  },
  {
    path: '/',
    name: 'starry',
    component: Starry
  },
  {
    path: '/login',
    name: 'login',
    component: require('./views/login')
  },
  {
    path: '/register',
    name: 'register',
    component: require('./views/register')
  },
  {
    path: '/admin',
    component: require('./components/admin/index.vue'),
    meta: {auth: true},
    children:[
      {
        path: 'home',
        component: Home
      }
    ]
  }
]