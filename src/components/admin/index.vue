<template>
  <div>
    <SideNav></SideNav>
    <router-view></router-view>
  </div>
</template>

<script>
import SideNav from '../nav/index.vue';
import Survey from  './survey.vue';
export default {

  components: {
    SideNav,
    Survey,
  },
  mounted() {
    console.log(this);
  }
}
</script>