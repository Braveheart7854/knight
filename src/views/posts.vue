<template>
  <div class="post">
    <Post v-for="(article, key) in posts"
          v-bind:article="article"
          v-bind:key="key">
    </Post>
  </div>
  </template>

<script>
  import Post from '../components/post/index.vue';
  import Jumbotron from '../components/post/jumbotron.vue';
  import SideBar from '../components/nav/sideBar.vue';

  export default {
    data() {
      return {
        posts: {},
        ok: false,
        message: '',
      }
    },
    methods: {},
    async beforeMount() {
      await this.$store.dispatch('posts', 'get');
      const res = this.$store.getters.getPost;
      this.posts = res.post;
      this.ok = res.ok;
      this.message = res.message;
      console.log(this.posts);
    },
    mounted () {
      console.log('mmmmmmmmount')
    },
    components: {
      Post,
      Jumbotron,
      SideBar,
    }
  }
</script>
<style type="text/css">
  html, body {
    margin: 0;
    padding: 0;
  }


</style>