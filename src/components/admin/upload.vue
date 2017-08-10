<template>
  <div>
    <Uploader id="myVueDropzone"
       url="https://httpbin.org/post"
       v-on:vdropzone-success="showSuccess">
    </Uploader>
    <div class="upload-header">
      <mu-flat-button label="upload" primary/>
      <mu-flat-button label="cancel" primary/>
    </div>
  </div>
</template>
<style>
  .upload-header{
    margin-top: 1em;
    padding: 1em;
    text-align: center;
  }
</style>
<script>
  import Uploader from 'vue2-dropzone'
  export default {
    components: {
      Uploader
    },
    methods: {
      showSuccess: function (file) {
        console.log('A file was successfully uploaded')
      }
    }
  }
</script>
