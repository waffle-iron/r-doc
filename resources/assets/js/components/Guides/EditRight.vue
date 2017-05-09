<template>
  <div id="sidebar-float">
    <div id="sidebar" class="col-md-4">
      <div id="sidebar-guide-edit">
        <div id="main-guide-image" class="media-target" v-show="tab === 'introduction'">
          <div class="media-item media-image contents">
            <img :src="imageData" alt="" class="standard">
            <div class="alter-target standard replace-image">
              <div class="icon"></div>
            </div>
          </div>
        </div>
        <steps-guide-index :data="stepsData" :edit="false" v-if="tab === 'introduction'"></steps-guide-index>
        <steps-guide-index :data="stepsData" :edit="true" v-else-if="tab === 'steps'"></steps-guide-index>
      </div>
    </div>
  </div>
</template>

<script>
  import StepsGuideIndex from './StepsGuideIndex.vue';

  export default {
    props: ['imageData', 'stepsData', 'tab'],
    components: {
      StepsGuideIndex
    },
    created() {},
    data() {
      return {}
    },
    methods: {}
  }
</script>

<style>

</style>