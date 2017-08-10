<template>
  <div>
    <mu-toolbar>
      <div class="mu-toolbar-container">
        <mu-button class="mu-icon-button" @click.native="toggleLeftSidenav">
          <mu-icon>menu</mu-icon>
        </mu-button>
        <h2 class="mu-title" style="flex: 1;"><router-link to="/admin/home">夏拾桑</router-link></h2>
      </div>
    </mu-toolbar>
    <mu-sidenav class="mu-left" ref="leftSidenav" @open="open('Left')" @close="close('Left')">
      <mu-toolbar>
        <div class="mu-toolbar-container">
          <h4 class="mu-title">knight 管理后台</h4>
        </div>
      </mu-toolbar>
      <div>
        <mu-list>
          <mu-list-item>
            <mu-icon>create</mu-icon>
            <span><router-link to="/admin/create">写文章</router-link></span>
          </mu-list-item>
          <mu-list-item>
            <mu-icon>sort</mu-icon>
            <span><router-link to="/admin/article">文章管理</router-link></span>
          </mu-list-item>
            <mu-list-item>
            <mu-icon>sort</mu-icon>
            <span><router-link to="/admin/comment">评论管理</router-link></span>
          </mu-list-item>
          <mu-list-item>
            <mu-icon>perm_media</mu-icon>
            <span>图片管理</span>
          </mu-list-item>
          </mu-list-item>
            <mu-list-item>
            <mu-icon>photo</mu-icon>
            <span><router-link to="/admin/upload">上传图片</router-link></span>
          </mu-list-item>
          <mu-list-item>
            <mu-icon>settings</mu-icon>
            <span>设置</span>
          </mu-list-item>
        </mu-list>
      </div>
    </mu-sidenav>
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