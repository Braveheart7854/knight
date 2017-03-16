<template>
  <div>
    <md-toolbar>
      <div class="md-toolbar-container">
        <md-button class="md-icon-button" @click="toggleLeftSidenav">
          <md-icon>menu</md-icon>
        </md-button>
        <h2 class="md-title" style="flex: 1;">夏拾桑</h2>
        <input type="text" placeholder="search">
        <md-button class="md-icon-button">
          <md-icon>search</md-icon>
        </md-button>
      </div>
    </md-toolbar>
    <md-sidenav class="md-left" ref="leftSidenav" @open="open('Left')" @close="close('Left')">
      <md-toolbar>
        <div class="md-toolbar-container">
          <h3 class="md-title">Sidenav content</h3>
        </div>
      </md-toolbar>
      <div class="phone-viewport">
        <md-list>
          <md-list-item>
            <md-icon>whatshot</md-icon>
            <span>News</span>
            <md-list-expand>
              <md-list>
                <md-list-item class="md-inset">World</md-list-item>
                <md-list-item class="md-inset">Americas</md-list-item>
                <md-list-item class="md-inset">Europe</md-list-item>
              </md-list>
            </md-list-expand>
          </md-list-item>
          <md-list-item>
            <md-icon>videogame_asset</md-icon>
            <span>Games</span>
            <md-list-expand>
              <md-list>
                <md-list-item class="md-inset">Console</md-list-item>
                <md-list-item class="md-inset">PC</md-list-item>
                <md-list-item class="md-inset">Phone</md-list-item>
              </md-list>
            </md-list-expand>
          </md-list-item>
          <md-list-item>
            <md-icon>video_library</md-icon>
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
          <md-list-item>
            <md-icon>shopping_basket</md-icon>
            <span>Shop</span>
          </md-list-item>
        </md-list>
      </div>
    </md-sidenav>
  </div>
</template>

<script>
  export default {
    methods: {
      open() {

      },
      close() {

      },
      toggleLeftSidenav() {
        this.$refs.leftSidenav.toggle();
      },
    },
    created() {
      console.log('~!~!~!~!~!~!~!~!~!~!');
    }
  }

</script>