<template>
  <div>
    <SideNav></SideNav>
    <router-view></router-view>
    <Bottom></Bottom>
  </div>
</template>

<script>
import SideNav from '../nav/index.vue';
import Survey from  './survey.vue';
import Bottom from '../common/bottom.vue';
export default {

  components: {
    SideNav,
    Survey,
    Bottom,
  },
  mounted() {
  }
}
</script>