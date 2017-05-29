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
    <Bottom></Bottom>
  </div>
</template>
<style>
  .content-warp {
    position: relative;
    margin: 20px auto;
    width: 60%;
    margin-top: -1.5em;
  }
  .header {
    position: relative;
    margin: 0 auto;
    padding: 1em;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 60%;
    height: 10em;
    background: #00aaaa;
    overflow: hidden;
    border: 1em solid#ffffff;
  }

  .header ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
  }

  .header .nav {
    display: inline;
  }

  .header li {
    text-align: -webkit-match-parent;
    margin: 1em;
    padding: 1rem;
    display: inline;
    cursor: pointer;
  }

  .header li:hover {
    border-bottom: 2px dashed #0F769F;
  }
  .header .search {
    width: 5em;
    height: 2em;
    display: inline;
  }

  .header .filter {
    margin-left: 5em;
    border-radius: 5px;
    border: 0;
    padding-left: 5px;
    line-height: 18px;
  }
</style>
<script>
  import SideBar from '../nav/sideBar';
  import Bottom from './bottom.vue';
  export default{
    components: {
      SideBar,
      Bottom,
    }
  }
</script>
