<template>
  <div>
    <div class="menu">
      <mu-button class="mu-icon-button" @click="toggle()">
        <mu-icon>menu</mu-icon>
      </mu-button>
    </div>
    <mu-drawer right :open="open" @close="toggle()">
      <div class="resume">
        <div class="avatar">
          <img src="../../assets/icon.jpg">
        </div>
      </div>
      <div class="phone-viewport">
        <mu-list>
          <mu-list-item>
            <mu-icon>toys</mu-icon>
            <span>在他乡</span>
          </mu-list-item>
          <mu-list-item @click.native="whisper">
            <mu-icon>gesture</mu-icon>
            <span>桑下语</span>
          </mu-list-item>
          <mu-list-item>
            <mu-icon>date_range</mu-icon>
            <span>分类</span>
            <mu-list-expand>
              <mu-list v-for="cate in category" key="{{cate.id}}">
                <mu-list-item class="mu-inset">{{cate.name}}</mu-list-item>
              </mu-list>
            </mu-list-expand>
          </mu-list-item>
        </mu-list>
      </div>
    </mu-sidenav>
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
        open: false,
      };
    },
    async beforeMount() {

    },
    methods: {
      toggle() {
        this.$refs.leftSidenav.toggle();
      },
      async open(ref) {
        console.log('Opened: ' + ref);
        if(!this.category.length) {
          await this.$store.dispatch('category');
          this.category = this.$store.getters.getCategory;
        }
        this.open = !this.open;
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