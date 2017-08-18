<template>
  <div>
    <div class="content">
      <mu-card>
        <mu-card-header @click="detail(post.id)" :title="post.title"
          :subTitle="new Date(post.created * 1000).toLocaleDateString()">
            <mu-avatar slot="avatar"color="Teal" backgroundColor="lightGreen500">桑</mu-avatar>
        </mu-card-header>
        <mu-card-text>
          <div v-html="post.content"></div>
        </mu-card-text>
      </mu-card>
    </div>
  </div>
</template>
<script>
  import marked from 'marked';
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
      console.log(this.article);
    },
    methods: {
      detail(id) {
        console.log(this);
      }
    },
    computed: {
      post()  {
        const post = Object.assign({}, this.article);
        console.log('ppppp', post);
        post.content =  marked(post.content);

        return post;
      }
    }
  }
</script>

