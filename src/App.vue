<template>
  <div id="example" v-md-theme="'default'">
    <NavBar></NavBar>
    <router-view></router-view>
    <div class="main-content">
    </div>
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