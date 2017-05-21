<template>
  <div>
    <SideBar></SideBar>
    <div class="header">
      <ul class="nav">
        <li><router-link to="/posts">home</router-link></li>
        <li><router-link to="/archive">archive</router-link></li>
        <li><a href="//github.com/racecourse/knight">github</a></li>
      </ul>
      <div class="search">
        <input class="filter" type="text" name="search" placeholder="keyword">
      </div>
    </div>
    <div class="content-warp">
      <transition>
        <router-view></router-view>
      </transition>
    </div>
  </div>
</template>
<style>
  .content-warp {
    position: relative;
    margin: 20px auto;
    width: 60%;
  }
</style>
<script>
  import SideBar from '../nav/sideBar';
  export default{
    components: {
      SideBar,
    }
  }
</script>