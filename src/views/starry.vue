<template>
  <div>
    <Starry></Starry>
  </div>
</template>

<script>
  import Starry from '../components/starry/index.vue';
  export default {
    data: function () {
      return {
        title: 'fuck table',
      }
    },
    components: {
      Starry: Starry,
    }
  }
</script>