<template>
  <div v-md-theme="'default'">
    <router-view></router-view>
  </div>
</template>

<script>
  import NavBar from './components/nav/index.vue';
  export default {
    components: {
      NavBar
    },
    methods: {

    }
  }
</script>
<style>
  .main {
    width: 80%;
    border: 1px solid #fefefe;
    height: 400px;
  }
</style>