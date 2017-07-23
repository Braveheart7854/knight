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
          <img src="../../assets/icon.jpg">
        </div>
      </div>
      <div class="phone-viewport">
        <md-list>
          <md-list-item>
            <md-icon>toys</md-icon>
            <span>在他乡</span>
          </md-list-item>
          <md-list-item @click.native="whisper">
            <md-icon>gesture</md-icon>
            <span>桑下语</span>
          </md-list-item>
          <md-list-item>
            <md-icon>date_range</md-icon>
            <span>分类</span>
            <md-list-expand>
              <md-list v-for="cate in category" key="{{cate.id}}">
                <md-list-item class="md-inset">{{cate.name}}</md-list-item>
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
    data: function () {
      return {
        category: [],
      };
    },
    async beforeMount() {

    },
    methods: {
      toggleLeftSidenav() {
        this.$refs.leftSidenav.toggle();
      },
      async open(ref) {
        console.log('Opened: ' + ref);
        if(!this.category.length) {
          await this.$store.dispatch('category');
          this.category = this.$store.getters.getCategory;
        }
      },
      close(ref) {
        console.log('Closed: ' + ref);
      },
      whisper() {
        this.$router.push('/posts?cate=whisper'); // @todo microblog
      }
    },
  }
</script>