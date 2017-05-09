<template>
  <div id="content-float">
    <div id="content" class="col-md-7 col-md-pull-5">
      <div class="tab-wrap">
        <ul class="nav nav-tabs tab-list"
            role="tablist"
            id="content-tabs"
            v-if="tab === 'introduction'">
          <li role="presentation" class="active">
            <a href="#introduction"
               aria-controls="introduction"
               role="tab"
               data-toggle="tab">Introduction</a>
          </li>
          <li role="presentation">
            <a :href="guideStepsUrl(tab)">Guide Steps</a>
          </li>
        </ul>
        <ul class="nav nav-tabs tab-list"
            role="tablist" id="content-tabs"
            v-else-if="tab === 'steps'">
          <li role="presentation">
            <a :href="guideStepsUrl(tab)">Introduction</a>
          </li>
          <li role="presentation" class="active">
            <a href="#guide-steps"
               aria-controls="guide-steps"
               role="tab"
               data-toggle="tab">Guide Steps</a>
          </li>
        </ul>
        <div class="tab-content" v-if="tab === 'introduction'">
          <guide-edit-introduction :data="data"></guide-edit-introduction>
        </div>
        <div class="tab-content" v-else-if="tab === 'steps'">
          <guide-step :data="stepsData" :edit="true"></guide-step>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import GuideEditIntroduction from './GuideEditIntroduction.vue';
  import GuideStep from './GuideStep.vue';
  import StepsGuideIndex from './StepsGuideIndex.vue'

  export default {
    props: ['data', 'tab', 'stepsData'],
    components: {
      GuideEditIntroduction,
      GuideStep,
      StepsGuideIndex
    },
    created() {},
    data() {
      return {
        baseUrl: '/mockups/guide'
      }
    },
    methods: {
      guideStepsUrl(tabType) {
        if(tabType === 'introduction') {
          return `${this.baseUrl}/steps/${this.data.guideid}/${this.data.stepsid}`;
        } else if (this.tab === 'steps') {
          return `${this.baseUrl}/intro/${this.data.guideid}`;
        }
      }
    }
  }
</script>

<style>

</style>