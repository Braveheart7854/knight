<template>
  <div>
    <md-toolbar>
      <div class="md-toolbar-container">
        <md-button class="md-icon-button" @click.native="toggleLeftSidenav">
          <md-icon>menu</md-icon>
        </md-button>
        <h2 class="md-title" style="flex: 1;"><router-link to="/admin/home">夏拾桑</router-link></h2>
      </div>
    </md-toolbar>
    <md-sidenav class="md-left" ref="leftSidenav" @open="open('Left')" @close="close('Left')">
      <md-toolbar>
        <div class="md-toolbar-container">
          <h4 class="md-title">knight 管理后台</h4>
        </div>
      </md-toolbar>
      <div class="phone-viewport">
        <md-list>
          <md-list-item>
            <md-icon>create</md-icon>
            <span><router-link to="/admin/create">写文章</router-link></span>
          </md-list-item>
          <md-list-item>
            <md-icon>sort</md-icon>
            <span><router-link to="/admin/article">文章管理</router-link></span>
          </md-list-item>
            <md-list-item>
            <md-icon>sort</md-icon>
            <span><router-link to="/admin/comment">评论管理</router-link></span>
          </md-list-item>
          <md-list-item>
            <md-icon>perm_media</md-icon>
            <span>图片管理</span>
          </md-list-item>
          </md-list-item>
            <md-list-item>
            <md-icon>photo</md-icon>
            <span><router-link to="/admin/upload">上传图片</router-link></span>
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
      open(ref) {
        console.log('Opened: ' + ref);
      },
      close(ref) {
        console.log('Opened: ' + ref);
      },
      toggleLeftSidenav() {
        this.$refs.leftSidenav.toggle();
      },
    },
    created() {
    }
  }

</script>