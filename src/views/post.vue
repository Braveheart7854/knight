<template>
  <div>
    <Post></Post>
  </div>
</template>

<script>
  import Post from '../components/post/index.vue';
  export default {
    data: function () {
      return {
        title: 'fuck table',
      }
    },
    components: {
      Post
    }
  }
</script>