<template>
  <div>
    <div class="content">
      <mu-card>
        <mu-card-header @click="detail(article.id)" :title="article.title"
          :subTitle="new Date(article.created * 1000).toLocaleDateString()">
            <mu-avatar slot="avatar"color="Teal" backgroundColor="lightGreen500">桑</mu-avatar>
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
        console.log(this);
      }
    }
  }
</script>

