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
          username
        </div>
        <div class="text">
          <p>adfasdfasdfasdfasdfasdfasdfasdfasdfasdadg</p>
        </div>
      </div>
      <div id="form-main">
        <div id="form-div">
          <form class="form" id="form1">
            <p class="name">
              <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input"
                     placeholder="Name" id="name"/>
            </p>
            <p class="email">
              <input name="email" type="text" class="validate[required,custom[email]] feedback-input" id="email"
                     placeholder="Email"/>
            </p>
            <p class="text">
              <textarea name="text" class="validate[required,length[6,300]] feedback-input" id="comment"
                        placeholder="Comment"></textarea>
            </p>
            <div class="submit">
              <input type="submit" value="SEND" id="button-blue"/>
              <div class="ease"></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  export default {
    props: {
      article: {
        type: Object,
        required: true
      }
    },
    data () {
      return {}
    },
    mounted () {
      console.log(this.props);
    }
  }
</script>
<style>
  .comment-wrapper {
    position: relative;
    margin: 20px auto;
    width: 60%;
    background-color: #ffffff;
  }
  .comments {
    width: 100%;
    padding: 20px;
    border: 1px solid#f0ad4e;
  }
  .comments .user {
    width: 10em;
    height: 5em;
    margin-top: -1em;
    color: #99b2ff;
    display: inline;
  }
  .comments .text {
    border:1px solid#000000;
    margin-left: 1em;
    padding: 2em;
    display: inline-block;
  }

</style>
<style>
  @import "comment.css";
</style>
