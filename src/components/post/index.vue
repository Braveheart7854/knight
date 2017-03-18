<template>
  <div class="content">
      <md-card md-with-hover>
        <md-card-header>
          <div class="md-title">{{article.title}}</div>
          <div class="md-subhead">Subtitle here</div>
        </md-card-header>
        <md-card-content>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio itaque ea, nostrum odio. Dolores, sed
          accusantium quasi non, voluptas eius illo quas, saepe voluptate pariatur in deleniti minus sint. Excepturi.
        </md-card-content>
        <md-card-media v-md-ink-ripple>
          <img src="https://vuematerial.github.io/assets/card-image-1.jpg" alt="People">
        </md-card-media>
      </md-card>
  </div>
</template>
<style lang="sass">
  @import "index.scss";
</style>
<style>
  .main {
    width: 80%;
    margin: 10px auto;
  }
</style>
<script>
  export default {
    props: {
      article: {
        type: Object,
        required: true
      }
    },
    data () {
      return {
        list: [1, 2]
      }

    },
    mounted () {
    console.log(this.props);
    }
  }
</script>