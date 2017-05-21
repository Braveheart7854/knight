<template>
  <div>
    <div class="content">
      <md-card md-with-hover>
        <md-card-header>
          <router-link v-bind:to="'/posts/' + article.id">
            <div class="md-title" @click="detail(article.id)">
              {{article.title}}
            </div>
          </router-link>
          <div class="md-subhead">{{new Date(article.created * 1000).toLocaleDateString()}}</div>
        </md-card-header>
        <md-card-content>
          <div v-html="article.content"></div>
        </md-card-content>
      </md-card>
    </div>
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

