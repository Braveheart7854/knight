<template>
  <div class="editor">
    <!--<textarea id="markdown">-->
    <!--</textarea>-->
    <textarea id="editor" placeholder="Balabala" autofocus></textarea>
    <div class="editor-option">
      <form novalidate @submit.stop.prevent="submit">
        <md-input-container>
          <label>With label</label>
          <md-input placeholder="title"></md-input>
        </md-input-container>
        <md-input-container>
          <label for="movie">请选择分类</label>
          <md-select name="movie" id="movie" v-model="movie">
            <md-option value="fight_club">Fight Club</md-option>
            <md-option value="godfather">Godfather</md-option>
            <md-option value="godfather_ii">Godfather II</md-option>
            <md-option value="godfather_iii">Godfather III</md-option>
            <md-option value="godfellas">Godfellas</md-option>
            <md-option value="pulp_fiction">Pulp Fiction</md-option>
            <md-option value="scarface">Scarface</md-option>
          </md-select>
        </md-input-container>
        <md-button href="#/components/button" class="md-raised md-primary">submit</md-button>
      </form>
    </div>
  </div>

</template>
<style lang='sass'>
  @import './editor.scss';
  @import "./styles/simditor.scss";
</style>
<script>
  import Simditor from 'simditor';
  import $ from 'jquery';
  export default {
    data: function () {
      return {
        movie: '请选择分类',
      }
    },
    mounted () {
      console.log(document.getElementById("markdown"));
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
      }
    }

  }

</script>