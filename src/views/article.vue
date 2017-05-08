<template>
  <div class="post">
    <Detail v-bind:article="post" v-bind:comments="comments"></Detail>
  </div>
</template>
<script>
  import Detail from '../components/post/post.vue';
  import Jumbotron from '../components/post/jumbotron.vue';
  import SideBar from '../components/nav/sideBar.vue';
  export default {
    data() {
      return {
        post: {},
        ok: false,
        message: '',
        comments: {
          page: 1,
          pageSize: 20,
          total: 0,
        },
      }
    },
    methods: {},
    async beforeMount() {
      const id = this.$route.params.id;
      await this.$store.dispatch('post', id);
      const res = this.$store.state.post;
      this.ok = res.ok;
      this.message = res.message;
      this.post = res.post;
      await this.$store.dispatch('getCommentsByPostId', id);
      let comments = this.$store.state.comment;
      if (comments && comments.comment) {
        const comment = comments.comment;
        this.comments = {
          list: comment.list || [],
          total: comment.total || 0,
          page: comment.page || 1,
          pageSize: comment.pageSize || 20,
        };
        console.log('ccccccc', this.comments);
      }
    },
    components: {
      Detail,
      Jumbotron,
      SideBar,
    }
  }
</script>
<style type="text/css">

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



</style>