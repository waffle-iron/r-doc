<template>
  <div role="tabpanel" class="tab-pane active" id="guide-steps">
    <guide-step :data="stepsData"></guide-step>
  </div>
</template>

<script>
  export default {
    props: ['data'],
    data() {
      return {
        stepsData: {
          steps: this.data.steps,
          guideid: this.data.guideid
        }
      }
    }
  }
</script>