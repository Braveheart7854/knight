<template>
  <div>
    <List></List>
  </div>
</template>

<script>
  import Table from '../components/table/index.vue';
  export default {
    data: function () {
      return {
        title: 'fuck table',
      }
    },
    components: {
      List: Table
    }
  }
</script>