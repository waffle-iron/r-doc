<template>
  <div class="container guide__container">
    <guide-header-navigation :data="navbarData"></guide-header-navigation>
    <guide-image :data="imageData"></guide-image>
    <guide-step :data="stepsData" :edit="false"></guide-step>
    <guide-completed :data="completedData"></guide-completed>
  </div>
</template>

<script>
  import GuideHeaderNavigation from '../components/Guides/GuideHeaderNavigation.vue';
  import GuideImage from '../components/Guides/GuideImage.vue';
  import GuideStep from '../components/Guides/GuideStep.vue';
  import GuideCompleted from '../components/Guides/GuideCompleted.vue';

  export default {
    components: {
      GuideHeaderNavigation,
      GuideImage,
      GuideStep,
      GuideCompleted
    },
    data() {
      return {
        imageData: {
          title: GuideData.guides[0].title,
          type: GuideData.guides[0].type,
          revision: GuideData.guides[0].revision,
          published: GuideData.guides[0].published_date,
          mainImage: GuideData.guides[0].image.huge,
          intro: GuideData.guides[0].introduction
        },
        navbarData: {
          title: GuideData.guides[0].previous_text,
          guideid: GuideData.guides[0].guideid
        },
        stepsData: {
          steps: GuideData.guides[0].steps,
          guideid: GuideData.guides[0].guideid,
          title: GuideData.guides[0].title
        },
        completedData: GuideData.guides[0].conclusion
      }
    }
  }
</script>