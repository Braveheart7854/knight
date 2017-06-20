export default [
  {
    path: '/',
    component: require('./views/posts.vue'),
    meta: { auth: false },
    children: [
      {
        path: '/posts/:id',
        component: require('./views/detail.vue')
      },
      {
        path: '/posts',
        component: require('./views/posts.vue')
      },
      {
        path: '/archive',
        component: require('./views/archive.vue')
      },
    ]
  },
  {
    path: '/admin',
    component: require('./components/admin/index.vue'),
    children: [
      {
        path: 'home',
        meta: { auth: true },
        component: require('./components/admin/main.vue')
      },
      {
        path: 'create',
        meta: { auth: true },
        component: require('./components/editor/index.vue')
      },
      {
        path: 'article',
        meta: { auth: true },
        component: require('./components/admin/article.vue'),
      },
      {
        path: 'comment',
        meta: { auth: true },
        component: require('./components/admin/comment.vue'),
      },
      {
        path: 'edit/:id',
        meta: { auth: true },
        component: require('./components/admin/edit.vue'),
      }
    ]
  },
  {
    path: '/login',
    component: require('./views/login.vue')
  },
  {
    path: '/register',
    component: require('./views/register.vue')
  },
  {
    path: '*',
    component: require('./views/starry.vue')
  },
]