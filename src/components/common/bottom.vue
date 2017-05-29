<template>
  <div class="common-bottom">
    <div class="copyright">
      <span>Copyright (c) 2017-{{now}}</span>
      <span>powered by <a href="//github.com/racecourse">racecourse</a></span>
      <span></span>
      <a href="//github.com/racecourse/knight">
        <img class="repo" src="./github.png">
      </a>
    </div>
  </div>
</template>
<style>
  .common-bottom {
    position: absolute;
    width: 100%;
    padding: 2em;
    text-align: center;
    background-color: #ffffff;
    /*display: -webkit-box;*/
    /*display: flex;*/
    /*-ms-flex-direction: column;*/
    /*-webkit-box-orient: vertical;*/
    /*-webkit-box-direction: normal;*/
    /*flex-direction: column;*/
    /*z-index: 1;*/
    /*box-shadow: 0 1px 5px rgba(0,0,0,.2), 0 2px 2px rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.12);*/
  }
  .common-bottom span {
    margin-left: 1em;
  }
  .copyright {
    font-weight: 200;
  }
  .repo {
    margin-left: 4em;
  }
</style>
<script>
  export default {
    data: function() {
      return {
        now: new Date().getFullYear(),
      }
    }
  }
</script>