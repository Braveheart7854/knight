<template>
  <div>
    <SideNav></SideNav>
    <div class="main-wrapper">
      <router-view></router-view>
    </div>
    <Bottom></Bottom>
  </div>
</template>
<style>
@import './main.css';
</style>
<script>
import SideNav from '../nav/index.vue';
import Bottom from '../common/bottom.vue';
export default {
  components: {
    SideNav,
    Bottom,
  },
}
</script>