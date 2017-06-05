<template>
  <div class="page">
    <div class="sky">
      <div class="moon">
        <div class="crescent"></div>
      </div>
    </div>
    <div class="city">
      <div class="buildings"></div>
      <div class="background-2"></div>
      <div class="background-1"></div>
    </div>
    <div class="ground">
      <div class="sidewalk-top">
        <div class="street-light">
          <div class="base">
            <div class="solar-panel"></div>
            <div class="bulb"></div>
            <div class="bulb-container"></div>
            <div class="curve"></div>
            <div class="ball"></div>
            <div class="upper"></div>
            <div class="middle"></div>
          </div>
        </div>
        <div class="bench">
          <div class="left-leg"></div>
          <div class="back">
            <div class="back-top"></div>
            <div class="pegs">
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
              <div class="peg"></div>
            </div>
            <div class="seat"></div>
          </div>
          <div class="right-leg"></div>
        </div>
        <div class="bench-shadow"></div>
      </div>
      <div class="overlay"></div>
      <div class="cell">
        <div class="num">&nbsp;&nbsp; 3 2 1 0</div>
      </div>

      <div class="sidewalk"></div>
      <div class="street"></div>
    </div>
    <div class="walkman">
      <WalkingDead></WalkingDead>
    </div>
  </div>
</template>
<style>
  @import "star.css";
  @import "countdown.css";
</style>
<script>
  import WalkingDead from './walkingdead.vue';
  export default {
    components: {
      WalkingDead: WalkingDead,
    },
  }
</script>