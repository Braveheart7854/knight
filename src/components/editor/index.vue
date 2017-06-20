<template>
  <div class="main-wrapper">
    <div class="editor">
      <div class="row">
        <vue-editor id="editor" v-model="content" :editor-toolbar="toolbar">
        </vue-editor>
        <div class="editor-option">
          <form novalidate @submit.stop.prevent="submit">
            <md-input-container>
              <label>title</label>
              <md-input placeholder="title" v-model="article.title"></md-input>
            </md-input-container>
            <md-input-container>
              <label for="category">分类</label>
              <md-select name="category" id="category" v-model="article.cateId" @selected="cate">
                <div v-for="cate in category">
                  <md-option :value="cate.id">{{cate.name}}</md-option>
                </div>
              </md-select>
            </md-input-container>
            <div>
              <md-chips v-model="article.tags" :md-max="5" md-input-placeholder="标签..." @change="tag">
                <template scope="chip">
                  <span>{{ chip.value }}</span>
                </template>
              </md-chips>
            </div>
            <div>
              <md-radio v-model="article.permission" id="my-test1" name="my-test-group1" md-value="1">公开</md-radio>
              <md-radio v-model="article.permission" id="my-test2" name="my-test-group1" md-value="2">隐藏</md-radio>
              <md-radio v-model="article.permission" id="my-test3" name="my-test-group1" md-value="3">仅自己可见</md-radio>
            </div>
            <md-button class="md-raised md-primary"><span @click="commit">提交</span></md-button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<style lang='sass'>
  @import './editor.scss';
  @import '../admin/main.css';

</style>
<script>
  import {VueEditor} from 'vue2-editor';
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
        editor: null,
        category: [],
        content: '',
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
      }
    },
    async beforeMount() {
      await this.$store.dispatch('category');
      this.category = this.$store.getters.getCategory;
    },
    methods: {
      tag() {

      },
      cate(cateId) {
        this.article.cateId = cateId;
      },
      commit() {
        const id = this.$route.params.id;
        if (!id) {
          this.article.content = this.content;
          this.$store.dispatch('addPost', this.article);
        }
      }
    },
    components: {
      VueEditor
    },

  }

</script>