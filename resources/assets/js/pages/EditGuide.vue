<template>
  <edit-container>
    <edit-navbar :data="editNavbarData"></edit-navbar>
    <div class="row" v-if="type === 'introduction'">
      <edit-right :imageData="imageData" :stepsData="stepsData" :tab="type"></edit-right>
      <edit-left :data="editIntroData" :tab="type"></edit-left>
    </div>
    <div class="row" v-else-if="type === 'steps'">
      <edit-right :imageData="imageData" :stepsData="stepsData" :tab="type"></edit-right>
      <edit-left :data="editStepsData" :stepsData="stepsData" :tab="type"></edit-left>
    </div>
  </edit-container>
</template>

<script>
  import EditContainer from '../components/Guides/EditContainer.vue';
  import EditNavbar from '../components/Guides/EditNavbar.vue';
  import EditLeft from '../components/Guides/EditLeft.vue';
  import EditRight from '../components/Guides/EditRight.vue';

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
          category: GuideData.guides[0].category,
          type: GuideData.guides[0].type,
          types: GuideData.guides[0].types,
          title: GuideData.guides[0].title,
          summary: GuideData.guides[0].summary,
          introduction: GuideData.guides[0].introduction,
          stepsid: GuideData.guides[0].steps[0].stepid,
          guideid: GuideData.guides[0].guideid
        },
        editNavbarData: {
          previousText: GuideData.guides[0].previous_text,
          guideid: GuideData.guides[0].guideid
        },
        imageData: GuideData.guides[0].image.medium,
        stepsData: {
          steps: GuideData.guides[0].steps,
          guideid: GuideData.guides[0].guideid
        },
        editStepsData: {
          guideid: GuideData.guides[0].steps[0].stepid
        }
      }
    },
    methods: {}
  }
</script>
