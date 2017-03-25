import Starry from './views/starry.vue';
import WalkingDead from './components/starry/walkingdead.vue';
export default [
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
    name: 'admin',
    component: require('./components/admin'),
    meta: {auth: true},
    children:[
      {
        path: '/article',
        name: 'article',
      }
    ]
  }
]