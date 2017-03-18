<template>
  <div>
      <Post v-for="(article,key) in posts"
            v-bind:article="article"
            v-bind:key="key"
      >
      </Post>
  </div>
</template>

<script>
  import Post from '../components/post/index.vue';
  export default {
    data() {
      return {
        posts: [
          {
            title: 'this is title 1',
            content: 'content 1'
          },
          {
            title: 'vvvvvvvv',
            content: 'aaffff2'
          },
          {
            title: '3',
            content: 'xxxx'
          },
        ]
      }
    },
    components: {
      Post
    }
  }
</script>