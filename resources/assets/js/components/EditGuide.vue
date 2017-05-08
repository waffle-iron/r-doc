<template>
  <edit-container v-if="type ==='introduction'">
    <edit-navbar :data="editNavbarData"></edit-navbar>
    <div class="row">
      <edit-left :data="editIntroData" :tab="'introduction'"></edit-left>
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
      }
    },
    methods: {}
  }
</script>
