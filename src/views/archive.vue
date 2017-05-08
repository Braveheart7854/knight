<template>
  <div class="arch-wrap">
    <div v-for="(posts, month) in archive">
      <div class="month">{{month}}</div>
      <div v-for="post in posts" v-if="Array.isArray(posts)" class="arch-box">
        <md-card md-with-hover>
          <md-card-header>
            <div class="md-title">{{post.title}}</div>
            <div class="md-subhead">2014-06-06# 自言自语</div>
          </md-card-header>
        </md-card>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    data() {
      return {
        page: 1,
        pageSize: 0,
        total: 0,
        list: [],
      }
    },
    async beforeMount() {
      await this.$store.dispatch('article', this.page);
      console.log(this.$store.state);
      const article = this.$store.state.article;
      const posts = article.article;
      console.log(posts);
      const { list, page, pageSize, total } = posts;
      console.log(list, page, pageSize, total);
      this.list = list;
      this.page = page;
      this.pageSize = pageSize;
      this.total = total;
    },
    computed: {
      archive: function () {
        const monthSecond = 86400 * 30;
        const month = {};
        this.list.map((post) => {
          const archive = Math.floor(post.created / monthSecond) * monthSecond;
          const date = new Date(archive * 1000).toDateString();
          console.log(date);
          if (!month[date]) {
            month[date] = [post];
          } else {
            month[date].push(post);
          }
          console.log(month);
        });
        return month;
      }
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