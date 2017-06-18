<template>
  <div>
    <div class="arch-wrap">
      <div v-for="(posts, month) in archive">
        <div class="month">{{month}}</div>
        <div v-for="post in posts" v-if="Array.isArray(posts)" class="arch-box">
          <md-card md-with-hover>
            <md-card-header>
              <div class="md-title">{{post.title}}</div>
              <div class="md-subhead">{{new Date(post.created * 1000).toLocaleString()}}# 自言自语</div>
            </md-card-header>
          </md-card>
        </div>
      </div>
    </div>
    <Pagination :page="page" :total="total" :pageSize="pageSize"></Pagination>
  </div>
</template>
<script>
  import Pagination from '../components/pagination/post.vue';
  import Bottom from '../components/common/bottom.vue';
  export default {
    data() {
      return {
        page: 1,
        pageSize: 0,
        total: 0,
        list: [],
      }
    },
    beforeMount() {
      this.load();
    },
    beforeUpdate() {
      const page = Number(this.$route.query.page);
      if(page && page !== Number(this.page)) {
        this.load();
      }
    },
    computed: {
      archive: function () {
        const data = {};
        this.list.map(function (post) {
          const date = new Date(post.created * 1000);
          const month = date.getMonth() + 1;
          const year = date.getFullYear();
          const archive = year + '年' + month + '月';
          if (!data[archive]) {
            data[archive] = [post];
          } else {
            data[archive].push(post);
          }
          console.log(data);
        });
        return data;
      }
    },
    methods: {
      async load() {
        const query = Object.assign({}, this.$route.query);
        await this.$store.dispatch('posts', query);
        const res = this.$store.state.post;
        const data = res.post;
        const { list, page, pageSize, total } = data;
        this.list = list;
        this.page = page;
        this.pageSize = pageSize;
        this.total = total;
      }
    },
    components: {
      Pagination,
    }
  }
</script>
<style>
  .month {
    width: 100%;
    text-align: center;
    padding: 1em;
    line-height: 2em;
    font-size: 24px;
    display: block;
  }

  .arch-box {
    width: 45%;
    margin-left: 2%;
    margin-top: 0.5em;
    display: inline-block;
  }

  .arch-wrap {
    text-align: center;
  }
</style>