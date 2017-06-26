<template>
  <div>
    <LeftNav></LeftNav>
    <div class="main-wrapper">
      <Survey></Survey>
    </div>
  </div>
</template>
<style>
  .main-wrapper {
    margin: 1em auto;
    width: 60%;
    height: 80em;
    background: #99b2ff;
  }
</style>
<script>
  import LeftNav from '../components/nav/index.vue';
  import Survey from '../components/admin/survey.vue';
  export default {
    components: {
      LeftNav,
      Survey,
    }
  }
</script>