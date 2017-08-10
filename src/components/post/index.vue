<template>
  <div>
    <div class="content">
      <mu-card>
        <mu-card-header @click="detail(article.id)" :title="article.title"
          :subTitle="new Date(article.created * 1000).toLocaleDateString()">
            <mu-avatar src="/images/uicon.jpg" slot="avatar"/>
        </mu-card-header>
        </mu-card-header>
        <mu-card-text>
          <div v-html="article.content"></div>
        </mu-card-text>
      </mu-card>
    </div>
  </div>
</template>
<script>
  export default {
    props: {
      article: {}
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
      }
    }
  }
</script>

