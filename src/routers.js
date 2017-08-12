export default [
  {
    path: '/',
    component: require('./components/common/post.vue'),
    meta: { auth: false },
    children: [
      {
        path: '/',
        component: require('./views/posts.vue')
      },
      {
        path: '/posts/:id',
        component: require('./views/detail.vue')
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
        path: 'dashboard',
        meta: { auth: true },
        component: require('./components/admin/dashboard.vue')
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
        path: 'article/:id/edit',
        meta: { auth: true },
        component: require('./components/admin/edit.vue'),
      },
      {
        path: 'comment',
        meta: { auth: true },
        component: require('./components/admin/comment.vue'),
      },
      {
        path: 'upload',
        // meta: { auth: true },
        component: require('./components/admin/upload.vue'),
      },

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