export default [
  {
    path: '/',
    component: require('./components/common/post.vue'),
    meta: { auth: false },
    children: [
      {
        path: '/posts/:id',
        component: require('./views/detail.vue')
      },
      {
        path: '/posts',
        component: require('./views/posts')
      },
      {
        path: '/archive',
        component: require('./views/archive')
      },
      // {
      //   path: '/',
      //   component: require('./views/starry.vue')
      // },
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