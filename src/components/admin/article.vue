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

      <md-table @select="onSelect" @sort="onSort">
        <md-table-header>
          <md-table-row>
            <md-table-head>id</md-table-head>
            <md-table-head><span>权限</span></md-table-head>
            <md-table-head><span>分类</span></md-table-head>
            <md-table-head>
              <md-icon>message</md-icon>
              <span>标题</span>
            </md-table-head>
            <md-table-head><span>时间</span></md-table-head>
            <md-table-head><span>操作</span></md-table-head>
          </md-table-row>
        </md-table-header>

        <md-table-body>
          <md-table-row v-for="(row, rowIndex) in posts" :key="rowIndex" :md-item="row" md-selection>
            <md-table-cell> {{row.id}} </md-table-cell>
            <md-table-cell> {{row.category }}</md-table-cell>
            <md-table-cell> {{row.permission}}</md-table-cell>
            <md-table-cell> {{row.title}} </md-table-cell>
            <md-table-cell> {{row.created}} </md-table-cell>
            <md-table-cell>
             <span @click="edit">编辑 &nbsp;</span>|<span @click="remove(row.id)">&nbsp; 删除</span>
            </md-table-cell>
          </md-table-row>
        </md-table-body>
      </md-table>

      <md-table-pagination
        md-size="5"
        md-total="10"
        md-page="1"
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
</style>
<script>
  export default {
    data: () => ({
      page: 1,
      pageSize: 0,
      total: 0,
      posts: [],
    }),
    methods: {
      onPagination() {

      },
      onSelect() {

      },
      onSort() {

      },
      edit() {
        console.log(1111)
      },
      remove(id) {
        console.log('.....', id);
        this.$store.dispatch('delArt', {id});
      }
    },
    async beforeMount() {
      const params = {
        page: this.page,
      };
      await this.$store.dispatch('article', params);
      const data = this.$store.state.article;
      const article = data.article || {};
      const {page, list, total, pageSize} = article;
      this.posts = list || [];
      this.page = page || 1;
      this.pageSize = pageSize || 20;
      this.total = total || 0;
    }
  }
</script>