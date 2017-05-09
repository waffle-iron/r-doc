<template>
  <div id="guide-step-index"
       :class="{'form-body': true, 'reordering-steps': reordering}">
    <div class="row">
      <div class="col-xs-6">
        <h3 class="toggle-bar subhead">Steps</h3>
      </div>
      <div class="col-xs-6">
        <div class="rearrange" v-if="edit">
          <span class="rearrange-steps"
                v-if="!isReordering"
                @click.prevent="arrangeToggle()">Rearrange Steps</span>
          <span class="rearrange-steps text-right"
                v-show="isReordering"
                @click="saveStepOrder()">Save</span>
          <span class="reordering-or"
                v-show="isReordering">&nbsp;or&nbsp;</span>
          <span class="rearrange-steps"
                v-show="isReordering"
                @click="arrangeToggle()">Cancel</span>
        </div>
      </div>
    </div>
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
      <div class="guide-sidebar-add-step" v-if="!reordering">
        <a href="#">
          <i class="fa fa-plus"></i>
        </a>
      </div>
    </div>
    <div class="clearer"></div>
  </div>
</template>

<script>
  export default {
    props: ['data', 'edit'],
    beforeMount() {
      this.gatherThumbnails();
    },
    data() {
      return {
        isActive: [],
        imageThumbs: [],
        reordering: false
      }
    },
    computed: {
      active: function () {
        return function (index) {
          return this.isActive[index];
        };
      },
      isReordering() {
        return this.reordering;
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
      },
      arrangeToggle() {
        this.reordering = !this.reordering;
      },
      saveStepOrder() {
        console.log('this is where an ajax request happens...');
        this.arrangeToggle();
      }
    }
  }
</script>