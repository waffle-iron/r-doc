<template>
  <div class="completion-container">
    <div class="guide-complete">
      <div id="guideConclusion">
        <div class="finish-line">
          <i class="fa fa-flag-checkered "></i>&nbsp;Conclusion
        </div>
        <div class="conclusionText">
          <p v-html="completedText"></p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['completedText']
  }
</script>

<style>
  .completion-container {
    margin: 60px 0;
    position: relative;
  }

  .guide-complete {
    margin: 0;
    background-color: #f2f8fd;
    border: 1px solid #b3d4f0;
    border-raidus: 4px;
    padding: 26px;
  }

  #guideConclusion {
    text-align: center;
  }

  .finish-line {
    margin: 0 auto 30px;
    position: relative;
    display: inline-block;
    padding: 0 15px;
    z-index: 1;
    font-size: 20px;
    font-weight: 700;
    text-transform: uppercase;
  }

  .conclusionText {
    font-size: 1.2em;
    font-weight: 500;
  }
</style>