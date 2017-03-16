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
      <div class="sidewalk"></div>
      <div class="street"></div>
    </div>
  </div>
</template>
<style>
  @import "star.css";
</style>
<script>
  export default {
    mounted() {
      console.log('ffffff')
      createStars();
      setInterval(animateStars, 100);
      function createStars () {
        var spawnStars = document.querySelector('.sky, .city'),
          numStars = 18;
        for (let i = 0; i < numStars; i++) {
          var randSize = 5 + Math.random() * 8
          var star = document.createElement('div');
          star.className = 'star';
          star.style.position = 'absolute';
          star.style.left = Math.random() * 710 + 'px';
          star.style.top = Math.random() * 310 + 'px';
          star.style.backgroundColor = '#fff';
          star.style.height = randSize + 'px';
          star.style.width = randSize + 'px';
          star.style.borderRadius = '50%';

          spawnStars.appendChild(star);
        }
      }

      function animateStars () {
        var windowWidth = document.querySelector('.sky').offsetWidth;
        document.querySelectorAll('.star').forEach((star, i) => {
          var currentPos = Number(star.style.left.slice(0, -2));

          if (i % 2 === 0)
            currentPos += i / 50;
          else
            currentPos -= i / 50;

          if (currentPos > windowWidth)
            currentPos = 0;
          if (currentPos < 0)
            currentPos = windowWidth;

          star.style.left = currentPos + 'px';
          });
      }
    }
  }
</script>