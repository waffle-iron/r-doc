<template>
  <div class="guide__introduction">
    <h2>Introduction</h2>
    <div v-html="intro"></div>
  </div>
</template>

<script>
  export default {
    props: ['introData'],
    data() {
      return {
        intro: this.introData.intro
      }
    }
  }
</script>