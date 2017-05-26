<template lang="pug">
  #guide-step.mt-4(v-if="!edit")
    v-card(v-for="(step, index) in data.steps" v-bind:key="step.guide_id")
      v-card-row.yellow
        v-card-title
          a(v-bind:href="getStepHref(step.id)")
            v-icon.anchor(medium fa dark)
  #guide-step-edit.mt-4(v-else)
    v-card
      v-card-row.yellow
        v-card-title
          span TODO...
</template>

<script>
  export default {
    props: ['data', 'edit'],
    methods: {
      getStepHref(stepid) {
        return `#s${stepid}`;
      }
    }
  }
</script>

<style lang="stylus">
  .anchor
    vertical-align middle
    color #212426
    opacity .1
    visibility hidden

  .card__title
    a:hover
      .anchor
        visibility visible
</style>