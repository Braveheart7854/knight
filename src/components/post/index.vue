<template>
  <div>
    <div class="content">
      <md-card md-with-hover>
        <md-card-header>
          <router-link v-bind:to="'/post/' + article.id">
            <div class="md-title" @click="detail(article.id)">
              {{article.title}}
            </div>
          </router-link>
          <div class="md-subhead">{{new Date(article.created).toLocaleDateString()}}</div>
        </md-card-header>
        <md-card-content>{{article.content}}</md-card-content>
      </md-card>
    </div>
  </div>
</template>
<style lang="sass">
  @import "index.scss";

  .comment-wrapper {
    margin: 20px auto;
    width: 60%;
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
        article: {},
        comments: {},
      }

    },
    mounted () {
    },
    methods: {
      detail(id) {
        console.log('xxxxxxx', id);
      }
    }
  }
</script>

