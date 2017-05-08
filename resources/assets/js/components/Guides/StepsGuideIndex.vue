<template>
  <div id="guide-step-index" class="form-body locked">
    <h3 class="toggle-bar subhead">Steps</h3>
    <div class="toggle-div">
      <div id="thumbs-container">
        <div :class="{'guide-sidebar-thumb': true, 'active': active(index)}"
             v-for="(image, index) in data.steps"
             :style="imageThumb(index)"
             @mouseover="shouldBeActive(index, data.steps)"
             @mouseout="shouldBeActive(index, data.steps)">
          <a :href="stepEditUrl(index)" class="thumb-overlay"></a>
          <p class="step-number">{{index + 1}}</p>
        </div>
      </div>
    </div>
    <div class="guide-sidebar-add-step">
      <a href="#">
        <i class="fa fa-plus"></i>
      </a>
    </div>
    <div class="clearer"></div>
  </div>
</template>

<script>
  export default {
    props: ['data'],
    beforeMount() {
      this.gatherThumbnails();
    },
    data() {
      return {
        isActive: [],
        imageThumbs: []
      }
    },
    computed: {
      active: function () {
        return function (index) {
          return this.isActive[index];
        };
      }
    },
    methods: {
      getActiveState(index) {
        return this.isActive[index];
      },
      shouldBeActive(index, arr) {
        arr.forEach((active, idx) => {
          if (idx === index) {
            this.isActive[index] = !this.isActive[index];
          }
        });
      },
      setNotActive() {
        this.data.forEach((data, index) => {
          this.isActive[index] = false;
        });
      },
      imageThumb(index) {
        return {
          backgroundImage: `url('${this.imageThumbs[index]}')`
        };
      },
      gatherThumbnails() {
        this.data.steps.forEach((image, index) => {
          this.imageThumbs[index] = image.media.data[0].mini;
          this.isActive[index] = false;
        });
      },
      stepEditUrl(index) {
        return `/mockups/guide/steps/${this.data.guideid}/${this.data.steps[index].stepid}`;
      }
    }
  }
</script>