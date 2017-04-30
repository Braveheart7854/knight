<template>
  <div>
    <div class="content">
      <md-card md-with-hover>
        <md-card-header>
          <div class="md-title">{{article.title}}</div>
          <div class="md-subhead">{{new Date(article.created).toLocaleDateString()}}</div>
        </md-card-header>
        <md-card-content>{{article.content}}</md-card-content>
      </md-card>
    </div>
    <div class="comment-wrapper">
      <div class="comments">
        <div class="user">
          夏拾桑
        </div>
        <div class="text">
          <p>adfasdfasdfasdfasdfasdfasdfasdfasdfasdadg</p>
        </div>
      </div>
      <div class="form-outside">
        <div class="form-inside">
          <md-input-container>
            <label>With label</label>
            <md-input placeholder="your site"></md-input>
          </md-input-container>
          <md-input-container md-inline>
            <label>email</label>
            <md-input></md-input>
          </md-input-container>
          <md-input-container>
            <label>content</label>
            <md-textarea></md-textarea>
          </md-input-container>
        </div>
        <div class="from-btn"><md-button class="md-raised md-primary">发表评论</md-button></div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    props: {
      article: {
        type: Object,
        required: false,
        default: function() {
          return {};
        }
      }
    },
    data () {
      return {}
    },
    async beforeMount() {
      const id = this.
      await this.$store.dispatch('getCommentByPostId', )
    }
  }
</script>
<style>
  .comment-wrapper {
    position: relative;
    margin: 20px auto;
    width: 60%;
    background-color: #ffffff;
    display: -webkit-box;
    display: flex;
    -ms-flex-direction: column;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    z-index: 1;
    box-shadow: 0 1px 5px rgba(0,0,0,.2), 0 2px 2px rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.12);
  }
  .comments {
    width: 100%;
    padding: 20px;
    border-bottom: 1px dashed#f0ad4e;
  }
  .comments .user {
    width: 10em;
    height: 5em;
    margin-top: -1em;
    color: #99b2ff;
    display: inline;
  }
  .comments .text {
    margin-left: 1em;
    padding: 2em;
    display: inline-block;
    font-weight: 300;
  }
  .form-outside {
    width: 100%;
    padding: 20px;
  }
  .form-inside {
    position: relative;
    width: 60%;
    margin: 1em auto;
    border: 1px solid#b2b2b2;
    padding: 2em;
  }
  .form-outside .from-btn {
    position: relative;
    width: 10em;
    margin: 1em auto;
  }

</style>
