<template>
  <div id="content-float">
    <div id="content" class="col-md-8">
      <div class="tab-wrap">
        <ul class="nav nav-tabs tab-list" role="tablist" id="content-tabs" v-if="tab === 'introduction'">
          <li role="presentation" class="active">
            <a href="#introduction" aria-controls="introduction" role="tab" data-toggle="tab">Introduction</a>
          </li>
          <li role="presentation">
            <a :href="guideStepsUrl()">Guide Steps</a>
          </li>
        </ul>
        <div class="tab-content" v-if="tab === 'introduction'">
          <guide-edit-introduction :data="data"></guide-edit-introduction>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import GuideEditIntroduction from './GuideEditIntroduction.vue';

  export default {
    props: ['data', 'tab'],
    components: {
      GuideEditIntroduction
    },
    created() {},
    data() {
      return {
        baseUrl: '/mockups/guide/steps'
      }
    },
    methods: {
      guideStepsUrl() {
        return `${this.baseUrl}/${this.data.guideid}/${this.data.stepid}`;
      }
    }
  }
</script>

<style>

</style>