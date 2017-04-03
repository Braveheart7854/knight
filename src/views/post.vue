<template>
  <div>
    <div class="header">
      <ul class="nav">
        <li>home</li>
        <li>github</li>
        <li>archive</li>
      </ul>
      <div class="search">
        <input class="filter" type="text" name="search" placeholder="keyword">
        <md-icon md-src="assets/icon-menu.png">menu</md-icon>
      </div>
    </div>
    <div class="post">
      <Post v-for="(article, key) in posts"
            v-bind:article="article"
            v-bind:key="key">
      </Post>
    </div>
  </div>

</template>

<script>
  import Post from '../components/post/index.vue';
  import Jumbotron from '../components/post/jumbotron.vue';


  export default {
    data() {
      return {
        posts: null,
        ok: false,
        message: '',
      }
    },
    async beforeMount() {
      await this.$store.dispatch('posts', 'get');
      const res = this.$store.getters.getPost;
      console.log('--=-=-=-=x-x-=xx-=', res.post);
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
    }
  }
</script>
<style type="text/css">
  html, body {
    margin: 0;
    padding: 0;
  }

  .header {
    position: relative;
    margin: 0 auto;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 60%;
    height: 10em;
    background: #00aaaa;
    overflow: hidden;
  }

  .header ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
  }

  .header .nav {
    display: inline;
  }

  .header li {
    text-align: -webkit-match-parent;
    margin: 1em;
    padding: 1rem;
    display: inline;
    cursor: pointer;
  }

  .header li:hover {
    border-bottom: 2px dashed #0F769F;
  }

  .header .search {
    width: 5em;
    height: 2em;
    display: inline;
  }

  .header .filter {
    margin-left: 5em;
    border-radius: 5px;
    border: 0;
    padding-left: 5px;
    line-height: 18px;
  }

  .post {
    position: relative;
  }

</style>