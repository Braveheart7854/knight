<template>
  <div>
    <md-toolbar>
      <div class="md-toolbar-container">
        <md-button class="md-icon-button" @click="toggleLeftSidenav">
          <md-icon>menu</md-icon>
        </md-button>
        <h2 class="md-title" style="flex: 1;">夏拾桑</h2>
        <input type="text" placeholder="search">
        <md-button class="md-icon-button">
          <md-icon>search</md-icon>
        </md-button>
      </div>
    </md-toolbar>
    <md-sidenav class="md-left" ref="leftSidenav" @open="open('Left')" @close="close('Left')">
      <md-toolbar>
        <div class="md-toolbar-container">
          <h3 class="md-title">Sidenav content</h3>
        </div>
      </md-toolbar>
      <div class="phone-viewport">
        <md-list>
          <md-list-item>
            <md-icon>create</md-icon>
            <span>写文章</span>
          </md-list-item>
          <md-list-item>
            <md-icon>sort</md-icon>
            <span>文章管理</span>
          </md-list-item>
          <md-list-item>
            <md-icon>perm_media</md-icon>
            <span>图片管理</span>
          </md-list-item>
          <md-list-item>
            <md-icon>settings</md-icon>
            <span>设置</span>
          </md-list-item>
        </md-list>
      </div>
    </md-sidenav>
  </div>
</template>
<style>
  .side-bg {
    background: rgba(50,50,0, 0.5);
  }
</style>
<script>
  export default {
    methods: {
      open() {

      },
      close() {

      },
      toggleLeftSidenav() {
        this.$refs.leftSidenav.toggle();
      },
    },
    created() {
    }
  }

</script>