export default [
  {
    path: '/',
    component: require('./components/post/common'),
    meta: { auth: false },
    children: [
      {
        path: '/post/:id',
        component: require('./views/article.vue')
      },
      {
        path: '/posts',
        component: require('./views/posts')
      },
      {
        path: '/archive',
        component: require('./views/archive')
      },
      {
        path: '/editor',
        component: require('./views/editor'),
      },
      {
        path: '/list',
        component: require('./views/table'),
      },
      {
        path: '/',
        component: require('./views/starry.vue')
      },
      {
        path: '/login',
        component: require('./views/login')
      },
      {
        path: '/register',
        component: require('./views/register')
      },
    ]
  },
  {
    path: '/admin',
    component: require('./components/admin/index.vue'),
    meta: { auth: true },
    children: [
      {
        path: 'home',
        component: require('./components/admin/main.vue')
      },
      {
        path: 'create',
        component: require('./components/editor/index.vue')
      },
      {
        path: 'article',
        component: require('./components/admin/article.vue'),
      },
      {
        path: 'edit/:id',
        component: require('./components/admin/edit.vue'),
      }
    ]
  }
]