<template>
  <div>
    <div class="menu">
      <md-button class="md-icon-button" @click.native="toggleLeftSidenav">
        <md-icon>menu</md-icon>
      </md-button>
    </div>
    <md-sidenav class="md-left" ref="leftSidenav" @open="open('Left')" @close="close('Left')">
      <div class="resume">
        <div class="avatar">
          <img src="//pic.yupoo.com/craber_v/FSKpj7L8/SIwxr.jpg">
        </div>
      </div>
      <div class="phone-viewport">
        <md-list>
          <md-list-item>
            <md-icon>toys</md-icon>
            <span>自言自语</span>
          </md-list-item>
          <md-list-item>
            <md-icon>fingerprint</md-icon>
            <span>以梦为码</span>
          </md-list-item>
          <md-list-item>
            <md-icon>gesture</md-icon>
            <span>桑下语</span>
          </md-list-item>
          <md-list-item>
            <md-icon>date_range</md-icon>
            <span>Video</span>
            <md-list-expand>
              <md-list>
                <md-list-item class="md-inset">Humor</md-list-item>
                <md-list-item class="md-inset">Music</md-list-item>
                <md-list-item class="md-inset">Movies</md-list-item>
                <md-list-item class="md-inset">TV Shows</md-list-item>
              </md-list>
            </md-list-expand>
          </md-list-item>
        </md-list>
      </div>
    </md-sidenav>
  </div>
</template>

<style type="css">
  .menu {
    position: fixed;
    left: 1em;
    top: 1em;
    z-index: 100;
  }
  
  .resume {
    padding: 1em;
    text-align: center;
    max-height: 20em;
  }
  
  .avatar {
    margin: 1em auto;
    border: 1px;
    border-radius: 50%;
    height: 10em;
    width: 10em;
    overflow: hidden;
  }
</style>

<script>
  export default {
    methods: {
      toggleLeftSidenav() {
        this.$refs.leftSidenav.toggle();
      },
      open(ref) {
        console.log('Opened: ' + ref);
      },
      close(ref) {
        console.log('Closed: ' + ref);
      }
    },
  }
</script>