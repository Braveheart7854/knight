<template>
  <div>
    <md-table v-once>
      <md-table-header>
        <md-table-row>
          <md-table-head>id</md-table-head>
          <md-table-head md-numeric>权限</md-table-head>
          <md-table-head md-numeric>分类</md-table-head>
          <md-table-head md-numeric>标题</md-table-head>
          <md-table-head md-numeric>时间</md-table-head>
        </md-table-row>
      </md-table-header>
      <md-table-body>
        <md-table-row v-for="(row, index) in 5" :key="index">
          <md-table-cell>Dessert Name</md-table-cell>
          <md-table-cell v-for="(col, index) in 4" :key="index" md-numeric>10</md-table-cell>
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
<script>
  export default {
    methods: {
      data: {
        article: [],
        page: 1,
        pageSize: 20,
        total: 50,
      },
      onPagination() {

      }
    },
    beforeMount() {
      this.$store.dispatch('article');
    }
  }
</script>