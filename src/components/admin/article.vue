<template>
  <div class="main-wrapper">
    <md-table-card>
      <md-toolbar>
        <md-button class="md-icon-button">
          <md-icon>filter_list</md-icon>
        </md-button>
        <md-button class="md-icon-button">
          <md-icon>search</md-icon>
        </md-button>
      </md-toolbar>
      <md-table @sort="onSort">
        <md-table-header>
          <md-table-row>
            <md-table-head md-numeric>id</md-table-head>
            <md-table-head md-numeric><span>category</span></md-table-head>
            <md-table-head md-numeric><span>permission</span></md-table-head>
            <md-table-head md-numeric>
              <md-icon>message</md-icon>
              <span>title</span>
            </md-table-head>
            <md-table-head md-numeric><span>created at</span></md-table-head>
            <md-table-head><span>action</span></md-table-head>
          </md-table-row>
        </md-table-header>
        <md-table-body>
          <md-table-row v-for="row in posts" :key="row.id" :md-item="{id:row.id}">
            <md-table-cell md-numeric> {{row.id}} </md-table-cell>
            <md-table-cell md-numeric> {{row.category}}</md-table-cell>
            <md-table-cell md-numeric> {{row.permission|permit}}</md-table-cell>
            <md-table-cell md-numeric> {{row.title}} </md-table-cell>
            <md-table-cell md-numeric> {{row.created}} </md-table-cell>
            <md-table-cell md-numeric>
              <div class="action">
                <button class="action-btn" @click="edit(row.id)">编辑</button>
                <button class="action-btn" @click="del(row.id)">删除</button>
              </div>
            </md-table-cell>
          </md-table-row>
        </md-table-body>
      </md-table>

      <md-table-pagination
        :md-size="pageSize"
        :md-total="total"
        :md-page="page"
        md-label="Rows"
        md-separator="of"
        :md-page-options="[5, 10, 25, 50]"
        @pagination="onPagination"></md-table-pagination>
    </md-table-card>
  </div>
</template>
<style>
  .md-table .md-table-head {
    text-align: center;
  }
  .action {
    text-align: center;
  }
  .action .action-btn {
    background-color: #b2b2bb;
    margin-left: 0.1em;
    border: 0;
  }

</style>
<script>
  export default {
    data: () => ({
      page: 1,
      pageSize: 0,
      total: 20,
      list: [],
      category: [],
      selected: [],
    }),
    methods: {
      async onPagination() {
        let page = this.page;
        const total = this.total;
        const pageSize = this.pageSize;
        if(!page) page = this.$route.query.page || 1;
        page = page + 1;
//        if (page * pageSize >= total) return null;
        await this.$store.dispatch('article', {page, pageSize, total});
        this.loadArticle();
      },
      onSort() {

      },
      edit (id) {
        this.$router.push('/admin/article/' + id + '/edit');
      },
      del (id) {
        this.$store.dispatch('delArt', {id});
      },
      loadArticle() {
        const data = this.$store.state.article;
        const article = data.article || {};
        const {page, list, total, pageSize} = article;
        this.list = list || [];
        this.page = page || 1;
        this.pageSize = pageSize || 20;
        this.total = total || 0;
      }
    },
    async beforeMount() {
      const params = {
        page: this.page,
      };
      await this.$store
        .dispatch('article', params)
        .then(() => {
          return this.$store.dispatch('category')
        });
      this.category = this.$store.getters.getCategory;
      this.loadArticle();
    },
    computed: {
      posts() {
        const category = this.category;
        return this.list.map(function (post) {
          post.category = '';
          category.map(function (cate) {
            if(cate.id === post.cateId) {
              post.category = cate.name;
            }
          });
          return post;
        });
      }
    },
    filters: {
      permit(level) {
        const data = {
          0: 'public',
          1: 'hidden',
          2: 'private',
        };
        return data[level] ? data[level] : 'unknown';
      }
    }
  }
</script>