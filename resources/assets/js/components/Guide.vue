<template>
  <div class="container guide__container">
    <guide-header-navigation :navData="navbarData"></guide-header-navigation>
    <guide-image :headerData="imageData"></guide-image>
    <guide-step :stepData="stepsData"></guide-step>
    <guide-completed :completedText="completedData"></guide-completed>
  </div>
</template>

<script>
  import GuideData from './data';

  export default {
    created() {
      //this is where the axios request will pull in the page data.
    },
    data() {
      return {
//        GuideData,
        imageData: {
          title: GuideData.title,
          type: GuideData.type,
          revision: GuideData.revision,
          published: GuideData.published_date,
          mainImage: GuideData.image.huge,
          intro: GuideData.introduction
        },
        navbarData: {
          title: GuideData.previous_text
        },
        stepsData: {
          steps: GuideData.steps
        },
        completedData: GuideData.conclusion
      }
    }
  }
</script>