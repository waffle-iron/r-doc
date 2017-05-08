<template>
  <div class="container">
    <div id="main-body">
      <div class="clearfix">
        <div class="lower-navbar">
          <ul class="edit-navbar">
            <li>
              <a href="#">View</a>
            </li>
            <li class="active-nav">
              <a href="#">Edit</a>
            </li>
            <li>
              <a href="#">History</a>
            </li>
          </ul>
          <div id="breadcrumb">
            <a href="#" class="breadcrumb-item back-nav">
              <span class="arrow fa fa-arrow-left"></span>&nbsp;&nbsp;Back to {{guideData.previous_text}}
            </a>
          </div>
          <div class="clearer"></div>
        </div>
      </div>
      <div id="sidebar-float">
        <div id="sidebar">
          <div id="sidebar-guide-edit">
            <div id="main-guide-image" class="media-target">
              <div class="media-item media-image contents">
                <img :src="guideData.image.standard" alt="" class="standard">
                <div class="alter-target standard replace-image">
                  <div class="icon">

                  </div>
                </div>
              </div>
            </div>
            <div id="guide-step-index" class="form-body locked">
              <h3 class="toggle-bar subhead">Steps</h3>
              <div class="toggle-div">
                <div id="thumbs-container">
                  <div :class="{'guide-sidebar-thumb': true, 'active': active(index)}"
                       v-for="(image, index) in guideData.steps"
                       v-bind:style="imageThumb(index)"
                       @mouseover="shouldBeActive(index, guideData.steps)"
                       @mouseout="shouldBeActive(index, guideData.steps)">
                    <a href="#" class="thumb-overlay"></a>
                    <p class="step-number">{{index + 1}}</p>
                  </div>
                </div>
                <div class="guide-sidebar-add-step">
                  <a href="#">
                    <i class="fa fa-plus"></i>
                  </a>
                </div>
                <div class="clearer"></div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>

<script>
  import GuideData from './data';
  export default {
    beforeMount() {
      this.gatherThumbnails();
    },
    data() {
      return {
        guideData: GuideData,
        imageThumbs: [],
        isActive: []
      }
    },
    computed: {
      active: function() {
        return function(index) {
          return this.isActive[index];
        };
      }
    },
    methods: {
      imageThumb(index) {
        return {
          backgroundImage: `url('${this.imageThumbs[index]}')`
        };
      },
      gatherThumbnails() {
        this.guideData.steps.forEach((image, index) => {
          this.imageThumbs[index] = image.media.data[0].mini;
          this.isActive[index] = false;
        });
      },
      getActiveState(index) {
        return this.isActive[index];
      },
      shouldBeActive(index, arr) {
        arr.forEach((active, idx) => {
          if(idx === index) {
            this.isActive[index] = !this.isActive[index];
          }
        });
      },
      shouldNotBeActive(index, arr) {

      },
      setNotActive() {
        this.guideData.steps.forEach((data, index) => {
          this.isActive[index] = false;
        });
      }
    }
  }
</script>

<style>

</style>