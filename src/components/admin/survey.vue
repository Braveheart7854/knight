<template>
  <div class="sur-wrap">
    <section>
      <div class="sur-item">
        <div class="sur-title">系统概况</div>
        <div class="sur-li">昨日 pv: {{survey.pv}}</div>
        <div class="sur-li">访问 ip 数: {{survey.ip}}</div>
      </div>
      <hr>
      <div class="sur-item">
        <div class="sur-title">文章概况</div>
        <div class="sur-li">发表文章: {{survey.articleNumber}}</div>
        <div class="sur-li">评论数: {{survey.commentNumber}}</div>
        <div class="sur-li">
          <md-button class="md-fab md-clean">
            <md-icon>create</md-icon>
          </md-button>
        </div>
      </div>
      <div class="sur-item">
        <div class="sur-title">图片数</div>
        <div class="sur-li">相册: {{survey.albumNumber}}</div>
        <div class="sur-li">总共上传图片: {{survey.photoNumber}}</div>
        <div class="sur-li">
          <md-button class="md-fab md-clean">
            <md-icon>cloud_upload</md-icon>
          </md-button>
        </div>
      </div>
      <hr>
      <div class="sur-item">
        <div class="sur-title">快捷入口</div>
        <md-button class="md-fab md-clean">
          <md-icon>create</md-icon>
        </md-button>
        <md-button class="md-fab md-clean">
          <md-icon>sort</md-icon>
        </md-button>
        <md-button class="md-fab md-clean">
          <md-icon>photo</md-icon>
        </md-button>
      </div>
    </section>
  </div>
</template>
<style>
  .sur-wrap {
    text-align: left;
  }

  .sur-item {
    padding: 1em;
    position: relative;
    display: inline-block;
    text-align: left;
    margin: 2em;
  }

  .sur-title {
    width: 100%;
    display: inline-block;
    vertical-align: middle;
    margin-right: 1.8em;
    font-size: 1.2em;
    line-height: 1.5em;
    margin-bottom: 1.2em;
  }

  .sur-li {
    display: inline;
    margin-left: 1em;
    font-weight: 200;
  }

  .sur-li .md-button {
    margin-top: -3em;
    display: inline;
  }

</style>
<script>
  export default {
    data: function(){
      return {
        survey: {},
      }
    },
    async beforeMount() {
      await this.$store.dispatch('survey');
      const admin = this.$store.state.admin;
      this.survey = admin.survey || {};
    }
  }
</script>