<template lang="pug">
  #guide-step.mt-4(v-if="!edit")
    v-card.mt-2(v-for="(step, index) in data.steps" v-bind:key="step.guide_id")
      v-card-row.yellow(v-bind:id="getStepId(step.id)")
        v-card-title
          a(v-bind:href="getStepHref(step.id)")
            v-icon.anchor(dark) keyboard_tab
            strong.ml-2 Step {{ index + 1 }}
            span.ml-2(v-if="index+1 === 1") {{ data.title }}
          v-spacer(v-on:click="goEditStep(step.id)")
            v-btn(dark flat) Edit
              v-icon(dark right) mode_edit
      v-card-row
        v-container.pb-0
          v-layout(row-md column child-flex-md)
            image-hover-select(v-bind:data="step.media")
            step-lines(v-bind:lines="step.lines")
</template>

<script>
  import ImageHoverSelect from '../components/ImageHoverSelect.vue';
  import StepLines from '../components/StepLines.vue';

  export default {
    props: ['data', 'edit'],
    components: {
      ImageHoverSelect,
      StepLines
    },
    created() {
      console.log($(document).width())
    },
    methods: {
      getStepId(stepid) {
        return `s${stepid}`;
      },
      getStepHref(stepid) {
        return `#s${stepid}`;
      },
      goEditStep(id) {
        this.$router.push(this.$route.path + '/edit/' + id);
      }
    }
  }
</script>

<style lang="stylus">
  .anchor
    vertical-align middle
    color #212426
    opacity .2
    visibility hidden

  .card__title
    .spacer
      position absolute
      right 10px

    a
      text-decoration none

      span
        font-size .7em
        font-weight 600

    &:hover
      .anchor
        visibility visible
</style>