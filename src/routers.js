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
    path: '/starry',
    name: 'starry',
    component: require('./views/starry'),
  },
]