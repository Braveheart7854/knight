<template>
  <div>
    <div class="post">
      <Post v-for="(article, key) in posts"
            v-bind:article="article"
            v-bind:key="key">
      </Post>
      <Pagination :page="page" :total="total" :pageSize="pageSize"></Pagination>
    </div>
  </div>
</template>

<script>
  import Post from '../components/post/index.vue';
  import Pagination from '../components/pagination/post.vue';

  export default {
    data() {
      return {
        posts: {},
        page: 1,
        pageSize: 20,
        total: 0,
        ok: false,
        message: '',
      }
    },
    methods: {
      async change() {
        const page = this.$route.query.page || 1;
        await this.$store.dispatch('posts', { page });
        const res = this.$store.getters.getPost;
        const { post, ok, message } = res;
        this.posts = post.list;
        this.total = post.total || 0;
        this.page = post.page || 1;
        this.pageSize = post.pageSize || 0;
        this.ok = ok;
        this.message = message;
      }
    },
    async beforeMount() {
      this.change();
    },
    beforeUpdate() {
      const page = Number(this.$route.query.page);
      if (page && page !== Number(this.page)) {
        this.change();
      }
    },
    components: {
      Post,
      Pagination,
    }
  }
</script>
<style type="text/css">
  html, body {
    margin: 0;
    padding: 0;
  }
  .post {
    position: relative;
    padding: 1em;
    display: block;
  }

</style>