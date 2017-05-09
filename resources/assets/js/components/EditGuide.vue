<template>
  <edit-container>
    <edit-navbar :data="editNavbarData"></edit-navbar>
    <div class="row" v-if="type === 'introduction'">
      <edit-left :data="editIntroData" :tab="type"></edit-left>
      <edit-right :imageData="imageData" :stepsData="stepsData" :tab="type"></edit-right>
    </div>
    <div class="row" v-else-if="type === 'steps'">
      <edit-left :data="editStepsData" :stepsData="stepsData" :tab="type"></edit-left>
      <edit-right :imageData="imageData" :stepsData="stepsData" :tab="type"></edit-right>
    </div>
  </edit-container>
</template>

<script>
  import GuideData from './../data';
  import EditContainer from './Guides/EditContainer.vue';
  import EditNavbar from './Guides/EditNavbar.vue';
  import EditLeft from './Guides/EditLeft.vue';
  import EditRight from './Guides/EditRight.vue';

  export default {
    props: ['type'],
    components: {
      EditContainer,
      EditNavbar,
      EditLeft,
      EditRight
    },
    data() {
      return {
        editIntroData: {
          category: GuideData.category,
          type: GuideData.type,
          types: GuideData.types,
          title: GuideData.title,
          summary: GuideData.summary,
          introduction: GuideData.introduction,
          stepsid: GuideData.steps[0].stepid,
          guideid: GuideData.guideid
        },
        editNavbarData: {
          previousText: GuideData.previous_text,
          guideid: GuideData.guideid
        },
        imageData: GuideData.image.standard,
        stepsData: {
          steps: GuideData.steps,
          guideid: GuideData.guideid
        },
        editStepsData: {
          guideid: GuideData.steps[0].stepid
        }
      }
    },
    methods: {}
  }
</script>
