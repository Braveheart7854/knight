<template>
  <div class="main-wrapper">
    <div class="editor">
      <div class="row">
        <quillEditor id="editor" v-model="content" :options="editorOptions"></quillEditor>
        <div class="editor-option">
          <form novalidate @submit.stop.prevent="submit">
            <mu-text-field placeholder="title" v-model="title">
            <mu-select-field v-model="cateId" multiple label="选择多个">
              <div v-for="cate in category" v-bind:key="cate.id">
                <mu-menu-item :value="cate.id" :title="cate.name"/>
              </div>
            </mu-select-field>
            <div>
              <mu-radio v-model="article.permission" nativeValue="1" label="public"/>
              <mu-radio v-model="article.permission" nativeValue="2" label="hidden"/>
              <mu-radio v-model="article.permission" nativeValue="3" label="private"/>
            </div>
            <mu-raised-button label="submit" class="demo-raised-button" @click="commit"/>
          </form>
        </div>
      </div>
    </div>
    <mu-snackbar v-if="snackbar.show" :message="snackbar.message" action="close" @actionClick="hideSnackbar" @close="hideSnackbar"/>
  </div>
</template>
<style lang='sass'>
  @import './editor.scss';
  @import '../admin/main.css';
</style>
<script>
import hljs from 'highlightjs';
import {quillEditor} from 'vue-quill-editor';
hljs.configure({
  tabReplace: '    ', // 4 spaces
  classPrefix: ''     // don't append class prefix
                      // … other options aren't changed
});
hljs.initHighlighting();
export default {
  props: {
    article: {
      type: Object,
      required: false,
      default: function () {
        return {
          permission: 1,
          tags: [],
          title: '',
          content: '',
          cateId: 1
        };
      },
    }
  },
  data: function () {
    return {
      snackbar: {
        message: '',
      },
      editor: null,
      category: [],
      content: '',
      title: '',
      tags: [],
      cateId: 1,
      permission: 1,
      editorOptions: {
        modules: {
          syntax: {
            highlight: text => hljs.highlightAuto(text).value
          },              // Include syntax module
          toolbar: [
            ['bold', 'italic', 'strike'],
            ['blockquote', 'code-block', 'image'],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'indent': '-1' }, { 'indent': '+1' }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'font': [] }],
            [{ 'align': [] }],
            ['clean']
          ]
        },
      },
    }
  },
  async beforeMount() {
    await this.$store.dispatch('category');
    this.category = this.$store.getters.getCategory;
    this.content = this.article.content;
    this.title = this.article.title || '';
    this.cateId = this.article.cateId;
    this.tags = this.article.tags;
    this.permission = this.article.permission;
  },
  methods: {
    tag() {

    },
    cate(cateId) {
      this.article.cateId = cateId;
    },
    async commit() {
      const id = this.$route.params.id;
      this.article.content = this.content;
      if (!this.title) {
        const message = 'title required~!';
        return this.tip(message);
      }
      if (!this.content) {
        return this.tip('content can not be empty~!');
      }
      const data = {
        title: this.title,
        cateId: this.cateId,
        permission: this.permission,
        content: this.content,
        tags: this.tags,
      }
      if (!id) {
      } else {
        data.id = id;
        await his.$store.dispatch('editArticle', data);
      }
      this.tip('success~!');
    },
    tip(message) {
      this.$refs.snackbar.open();
    },
    showSnackbar () {
      this.snackbar.show = true
      this.snackbar.message = message;
      if (this.snackTimer) clearTimeout(this.snackTimer)
      this.snackTimer = setTimeout(() => { this.snackbar = false }, 2000)
    },
    hideSnackbar () {
      this.snackbar = false
      if (this.snackTimer) clearTimeout(this.snackTimer)
    },
  },
  components: {
    quillEditor
  },
}
</script>
<style>
  .ql-container .ql-editor {
    min-height: 30em;
    padding-bottom: 1em;
    max-height: 50em;
  }
</style>

