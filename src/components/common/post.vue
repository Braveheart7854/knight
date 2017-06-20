<template>
  <div>
    <SideBar></SideBar>
    <div class="header">
      <ul class="nav">
        <li><router-link to="/">home</router-link></li>
        <li><router-link to="/archive">archive</router-link></li>
        <li><a href="//github.com/racecourse/knight">github</a></li>
        <li><router-link to="/">about</router-link></li>
      </ul>
      <div class="search">
        <input class="filter" id="keyword" type="text" name="search" placeholder="keyword">
        <md-icon @click.native="search" class="search-btn">search</md-icon>
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
    height: 2em;
  }

  .header .filter {
    margin-left: 5em;
    border: 0;
    padding-left: 5px;
    height: 32px;
    -ms-flex: 1;
    -webkit-box-flex: 1;
    flex: 1;
    border: none;
    background: none;
    transition: all .4s cubic-bezier(.25,.8,.25,1);
    transition-property: font-size;
    color: rgba(0,0,0,.54);
    font-family: inherit;
    font-size: 1px;
    line-height: 24px;
    border-bottom: 1px solid#efefef;
  }
  .search-btn {
    cursor: pointer;
  }
</style>
<script>
  import SideBar from '../nav/sideBar.vue';
  import Bottom from './bottom.vue';
  export default{
    components: {
      SideBar,
      Bottom,
    },
    methods: {
      search() {
        const keyword = document.getElementById('keyword').value;
        alert('search api is close');
      }
    }
  }
</script>
