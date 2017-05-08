<template>
  <div class="container guide__container">
    <guide-header-navigation :data="navbarData"></guide-header-navigation>
    <guide-image :data="imageData"></guide-image>
    <guide-step :data="stepsData"></guide-step>
    <guide-completed :data="completedData"></guide-completed>
  </div>
</template>

<script>
  import GuideData from './../data.js'

  export default {
    data() {
      return {
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