<template>
  <div>
    <SideBar></SideBar>
    <div class="header">
      <ul class="nav">
        <li>home</li>
        <li>github</li>
        <li>archive</li>
      </ul>
      <div class="search">
        <input class="filter" type="text" name="search" placeholder="keyword">
      </div>
    </div>
    <div class="post">
      <Detail v-bind:article="article"></Detail>
    </div>
  </div>
</template>

<script>
  import Detail from '../components/post/post.vue';
  import Jumbotron from '../components/post/jumbotron.vue';
  import SideBar from '../components/nav/sideBar.vue';


  export default {
    data() {
      return {
        article: {},
        ok: false,
        message: '',
      }
    },
    methods: {},
    async beforeMount() {
      await this.$store.dispatch('posts', 'get');
      const res = this.$store.getters.getPost;
      this.article = res.post.pop();
      this.ok = res.ok;
      this.message = res.message;
      console.log(this.posts);
    },
    mounted () {
      console.log('mmmmmmmmount')

    },
    components: {
      Detail,
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