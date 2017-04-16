<template>
  <div class="main-wrapper">
    <div class="editor">
      <textarea id="editor" placeholder="Balabala" autofocus rows="10" v-model="content"></textarea>
      <div class="editor-option">
        <form novalidate @submit.stop.prevent="submit">
          <md-input-container>
            <label>title</label>
            <md-input placeholder="title" v-model="title"></md-input>
          </md-input-container>
          <md-input-container>
            <label for="category">分类</label>
            <md-select name="category" id="category" v-model="category">
              <md-option value="自言自语">自言自语</md-option>
              <md-option value="以梦为马">以梦为马</md-option>
              <md-option value="桑下语">桑下语</md-option>
            </md-select>
          </md-input-container>
          <div>
            <md-chips v-model="tags" :md-max="5" md-input-placeholder="标签..." @change="tag">
              <template scope="chip">
                <span>{{ chip.value }}</span>
              </template>
            </md-chips>
          </div>
          <div>
            <md-radio v-model="radio1" id="my-test1" name="my-test-group1" md-value="1">公开</md-radio>
            <md-radio v-model="radio1" id="my-test2" name="my-test-group1" md-value="2">隐藏</md-radio>
            <md-radio v-model="radio1" id="my-test3" name="my-test-group1" md-value="3">仅自己可见</md-radio>
          </div>
          <md-button class="md-raised md-primary"><span @click="commit">提交</span></md-button>
        </form>
      </div>
    </div>
  </div>
</template>
<style lang='sass'>
  @import './styles/simditor.scss';
  @import './editor.scss';
  @import '../admin/main.css';
</style>
<script>
  import Simditor from 'simditor';
  import $ from 'jquery';
  export default {
    data: function () {
      return {
        category: '请选择分类',
        title: '',
        radio1: true,
        tags: [],
        content: '',
      }
    },
    mounted () {
      var editor = new Simditor({
        textarea: $('#editor'),
        upload: {
          url: '',
          params: null,
          fileKey: 'upload_file',
          connectionCount: 3,
          leaveConfirm: 'Uploading is in progress, are you sure to leave this page?'
        }

        //optional options
      });
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
    }

  }

</script>