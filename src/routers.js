import App from './App.vue';

export default [
  // {
  //   path: '/post/:id',
  //   component: require('./views/article.vue')
  // },
  // {
  //   path: '/post',
  //   component: require('./views/post')
  // },
  // {
  //   path: '/editor',
  //   component: require('./views/editor'),
  // },
  // {
  //   path: '/list',
  //   component: require('./views/table'),
  // },
  // {
  //   path: '/',
  //   component: Starry
  // },
  // {
  //   path: '/login',
  //   component: require('./views/login')
  // },
  // {
  //   path: '/register',
  //   component: require('./views/register')
  // },
  {
    path: '/admin',
    component: require('./components/admin/index.vue'),
    meta: { auth: true },
    children: [
      {
        path: '',
        component: require('./components/admin/main.vue')
      },
    ]
  }
]