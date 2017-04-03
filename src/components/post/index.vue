<template>
  <div class="content">
      <md-card md-with-hover>
        <md-card-header>
          <div class="md-title">{{article.title}}</div>
          <div class="md-subhead">{{new Date(article.created).toLocaleDateString()}}</div>
        </md-card-header>
        <md-card-content>{{article.content}}</md-card-content>
        <md-card-media v-md-ink-ripple>
          <img src="https://vuematerial.github.io/assets/card-image-1.jpg" alt="People">
        </md-card-media>
      </md-card>
  </div>
</template>

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
<style lang="sass">
  @import "index.scss";
</style>
