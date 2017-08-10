<template>
  <div>
    <mu-drawer left docked :open="open" @close="toggle()">
      <mu-appbar title="knight"/>
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
    </mu-drawer>
  </div>
</template>
<style>
  .side-bg {
    background: rgba(50,50,0, 0.5);
  }
</style>
<script>
  export default {
    data () {
      return {
        open: true,
      }
    },
    methods: {
      close() {
        console.log('Opened: ');
      },
      toggle() {
        this.open = !this.open;
      },
    },
    created() {
    }
  }

</script>