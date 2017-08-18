<template>
  <div>
    <div class="editor">
      <!-- <quillEditor id="editor" v-model="art.content" :options="editorOptions"/> -->
      <markdownEditor :configs="configs" ref="editor" v-model="art.content"></markdownEditor>
      <div class="editor-option">
        <mu-text-field hintText="title" v-model="art.title"/>
        <mu-select-field v-model="art.cateId" :labelFocusClass="['label-foucs']" label="category">
          <mu-menu-item v-for="(cate,index) in category" :key="index" :value="cate.id" :title="cate.name" />
        </mu-select-field>
        <br/>
        <div class="permission">
          <mu-radio label="public" name="permission" :nativeValue="permission" v-model="art.permission" />
          <mu-radio label="hidden" name="permission" :nativeValue="permission" v-model="art.permission" />
          <mu-radio label="private" name="permission" :nativeValue="permission" v-model="art.permission" />
        </div>
        <br/>
        <mu-raised-button label="submit" @click="commit"/>
      </div>
    </div>
    <mu-snackbar v-if="snackbar.show" :message="snackbar.message" 
      action="close" @actionClick="hideSnackbar" @close="hideSnackbar">
    </mu-snackbar>  
  </div>
</template>
<style lang='sass'>
  @import './editor.scss';
  @import '../admin/main.css';
</style>
<style>
  .permission {
    margin-top: 1em;
  }
  .markdown-editor {
    width: 65%;
     display: inline-block;
  }
  .markdown-editor .CodeMirror, .markdown-editor .CodeMirror-scroll {
    min-height: 40em;
  }
</style>
<script>
import { markdownEditor } from 'vue-simplemde';
import SimpleMDE from 'simplemde';
export default {
  props: {
    article: {
      type: Object,
      required: false,
      default: function () {
        return {
          permission: "1",
          tags: [],
          title: '',
          content: '',
          cateId: 1,
          created: new Date().toLocaleDateString(),
        };
      },
    }
  },
  data: function () {
    return {
      snackbar: {
        message: '',
        show: false,
        snackTimer: 3000,
      },
      editor: null,
      category: [],
      content: '',
      title: '',
      tags: [],
      cateId: 1,
      permission: "1",
      configs: {
        autosave: true,
        status: true,
        initialValue: '###',
        renderingConfig: {
          codeSyntaxHighlighting: true,
          highlightingTheme: 'github'
        }
      }
    }
  },
  async mounted() {
    await this.$store.dispatch('category');
    this.category = this.$store.getters.getCategory;
    console.log('>>>>>>', this.article);
    console.log();
  },
  methods: {
    tag() {

    },
    async commit() {
      const id = this.$route.params.id;
      const article = Object.assign({}, this.art);
      if (!article.title) {
        const message = 'title required~!';
        return this.tip(message);
      }
      if (!article.content) {
        return this.tip('content can not be empty~!');
      }
      
      const data = {
        title: article.title,
        cateId: article.cateId,
        permission: article.permission,
        content: article.content,
        tags: article.tags,
      }
      console.log('$$$$$$$$', data);
      if (!id) {
        await this.$store.dispatch('addArticle', data);
      } else {
        data.id = id;
        await this.$store.dispatch('editArticle', data);
      }
      this.tip('success~!');
    },
    tip(message) {
      this.snackbar.show = true
      this.snackbar.message = message;
      if (this.snackbar.snackTimer) {
        clearTimeout(this.snackbar.snackTimer);
      }
      this.snackbar.snackTimer = setTimeout(() => { this.snackbar.show = false }, 2000);
    },
    hideSnackbar () {
      this.snackbar.show = false;
      this.snackbar.message = '';
      if (this.snackbar.snackTimer) clearTimeout(this.snackbar.snackTimer)
    },
  },
  computed: {
    art: function() {
      console.log('ffffuck')
      const data = Object.assign({}, this.article);
      data.permission = String(data.permission);

      return data;
    },
    simplemde (){
      console.log('---|---', this.$refs);
      return this.$refs.editor.simplemde
    }
  },
  components: {
    // quillEditor
    markdownEditor
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

