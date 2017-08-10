<template>
  <div class="sur-wrap">
    <section>
      <div class="sur-desc">
        <div class="sur-title">系统概况</div>
        <div class="sur-li"> cpu {{survey.pv}} %</div>
        <div class="sur-li"> memery: {{survey.ip}} KB</div>
        <div class="sur-li"> disk: {{survey.ip}} GB</div>
      </div>
      <hr class="sur-divider">
      <div class="sur-desc">
        <div class="sur-title">访问流浪</div>
        <div class="sur-li">昨日 pv: {{survey.pv}}</div>
        <div class="sur-li">访问 ip 数: {{survey.ip}}</div>
      </div>
      <hr class="sur-divider">
      <div class="sur-desc">
        <div class="sur-title">文章概况</div>
        <div class="sur-li">发表文章: {{survey.articleNumber}}</div>
        <div class="sur-li">评论数: {{survey.commentNumber}}</div>
        <div class="sur-li">
          <mu-float-button icon="create"/>
        </div>
      </div>
      <hr class="sur-divider">
      <div class="sur-item">
        <div class="sur-title">图片数</div>
        <div class="sur-li">相册: {{survey.albumNumber}}</div>
        <div class="sur-li">总共上传图片: {{survey.photoNumber}}</div>
        <div class="sur-li">
          <mu-float-button icon="cloud_upload"/>
        </div>
      </div>
      <hr class="sur-divider">
      <div class="sur-item">
        <div class="sur-title">快捷入口</div>
        <mu-float-button icon="create"/>
        <mu-float-button icon="sort"/>
        <mu-float-button icon="photo"/>
      </div>
    </section>
  </div>
</template>
<style>
  /* @import './main.css'; */
  .sur-wrap {
     position: relative;
    min-height: 100%;
    text-align: left; 
    /* display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center; */
  }

  .sur-desc {
    max-width: 972px;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
    margin: 2em;
    margin-bottom: 5em;
    margin-top: 5em;
    /* height: 500px; */
  }
  .sur-divider {
    margin: 0;
    height: 1px;
    border: none;
    background-color: rgba(0,0,0,.12);
    width: 100%;
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
  hr {
    display: block;
    -webkit-margin-before: 0.5em;
    -webkit-margin-after: 0.5em;
    -webkit-margin-start: auto;
    -webkit-margin-end: auto;
    border-style: inset;
    border-width: 1px;
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