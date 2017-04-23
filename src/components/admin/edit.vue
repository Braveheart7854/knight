<template>
  <div>
    <Editor v-bind:post="article" name="article"></Editor>
  </div>
</template>
<style lang='sass'>
</style>
<script>
  import Editor from '../editor/index.vue';
  export default {
    data () {
      return {
        article: {
          permission: 1,
          category: '请选择分类'
        }
      }
    },
    async beforeMount () {
      const id = this.$route.params.id;
      await this.$store.dispatch('getArt', id);
      const state = this.$store.state;
      const article = state.admin.article.attr;
      this.article = article;
      console.log(article);
    },
    created() {
      console.log('created editor');
    },
    methods: {
      setPulpFiction() {
        this.movie = 'pulp_fiction';
      },
      tag() {
        console.log('tttttttt', this.tags);
      },
      commit() {
        const tags = this.tags;
        const title = this.title;
        const category = this.category;
        const content = this.content;
        console.log(tags, title, category, content);
      }
    },
    components: {
      Editor
    }

  }

</script>