<template>
  <div>
    <div class="content">
      <md-card md-with-hover>
        <md-card-header>
          <div class="md-title">{{article.title}}</div>
          <div class="md-subhead">{{new Date(article.created*1000).toLocaleDateString()}}</div>
        </md-card-header>
        <md-card-content>
          <div v-html="article.content"></div>
        </md-card-content>
      </md-card>
    </div>
    <div class="comment-wrapper">
      <div v-for="comment in comments.list">
        <div class="comments">
          <div class="user">{{comment.username}}</div>
          <div class="text">
            <p>{{comment.content}}</p>
          </div>
        </div>
      </div>
      <div class="form-outside">
        <div class="form-inside">
          <md-input-container md-inline>
            <label>username</label>
            <md-input placeholder="username" v-model="username"></md-input>
          </md-input-container>
          <md-input-container>
            <label>site</label>
            <md-input placeholder="your site" v-model="site"></md-input>
          </md-input-container>
          <md-input-container md-inline>
            <label>email</label>
            <md-input placeholder="email" v-model="email" type="email"></md-input>
          </md-input-container>
          <md-input-container>
            <label>content</label>
            <md-textarea v-model="content"></md-textarea>
          </md-input-container>
        </div>
        <div class="from-btn">
          <div @click="submit">
            <md-button class="md-raised md-primary">发表评论</md-button>
          </div>
        </div>
      </div>
      <md-snackbar md-position="top center" ref="snackbar" :md-duration="2000">
        <span>{{message}}</span>
      </md-snackbar>
    </div>
  </div>
</template>
<script>
  export default {
    props: {
      article: {
        type: Object,
        required: false,
        default: function () {
          return {};
        }
      },
      comments: {
        type: Object,
        required: false,
        default: function () {
          return {
            list: [],
            page: 1,
            pageSize: 20,
            total: 0,
          }
        }
      }
    },
    data () {
      return {
        username: '',
        email: '',
        site: '',
        content: '',
        message: '',
        ok: false,
      }
    },
    beforeUpdate() {
      console.log('xxxxxxxxxx', this.comments);
    },
    methods: {
      submit() {
        const username = this.username;
        if (!username || !content) {
          this.message = 'username and content required';
          this.ok = false;
          this.snackbar();
          return;
        }
        const data = {
          content: this.content,
          site: this.site,
          email: this.email,
          username: this.username,
        };
        console.log(data);
      },
      snackbar() {
        this.$refs.snackbar.open();
      }
    }
  }
</script>
<style>
  .content {
    position: relative;
    display: block;
  }

  .comment-wrapper {
    position: relative;
    width: 100%;
    background-color: #ffffff;
    display: -webkit-box;
    display: flex;
    -ms-flex-direction: column;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    flex-direction: column;
    z-index: 1;
    box-shadow: 0 1px 5px rgba(0, 0, 0, .2), 0 2px 2px rgba(0, 0, 0, .14), 0 3px 1px -2px rgba(0, 0, 0, .12);
  }

  .comments {
    width: 100%;
    padding: 20px;
    border-bottom: 1px dashed #f0ad4e;
    display: table;
  }

  .comments .user {
    margin-top: -1em;
    color: #99b2ff;
    display: table-cell;
  }

  .comments .text {
    padding: 2em;
    display: table-cell;
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
    border: 1px solid #b2b2b2;
    padding: 2em;
  }

  .form-outside .from-btn {
    position: relative;
    width: 10em;
    margin: 1em auto;
  }
</style>
