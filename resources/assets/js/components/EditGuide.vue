<template>
  <div class="container">
    <div id="main-body">
      <div class="clearfix">
        <div class="lower-navbar">
          <ul class="edit-navbar">
            <li>
              <a href="/mockups/guide">View</a>
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
      <div class="row">
        <div id="content-float">
          <div id="content" class="col-md-8">
            <div class="tab-wrap">
              <ul class="nav nav-tabs tab-list" role="tablist" id="content-tabs">
                <li role="presentation" class="active">
                  <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Introduction</a>
                </li>
                <li role="presentation">
                  <a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Guide Steps</a>
                </li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                  <div id="guide-intro-form">
                    <div id="form-inputs" class="form-body">
                      <div id="type-div" class="form-field form-field-top">
                        <label for="intro-type">What type of guide is this?</label>
                        <select name="" id="intro-type" class="form-control">
                          <option :value="type" v-for="type in guideData.types" :selected="isGuideType(type)">{{type}}</option>
                        </select>
                      </div>
                      <div id="device-div" class="form-field text-field">
                        <label for="intro-device">Device</label>
                        <input type="text" name="intro[device]" id="intro-device" class="form-control" :value='guideData.category' />
                      </div>
                      <div id="title-div" class="form-field text-field">
                        <label for="intro-title" class="tip">Title</label>
                        <input type="text" name="intro[title]" id="intro-title" :value='guideData.title' class="form-control">
                      </div>
                      <div id="summary-div" class="summary form-field">
                        <!-- TODO: I would like to add a character counter here. -->
                        <label for="intro-summary">Search Summary</label>
                        <textarea name="intro[summary]" id="intro-summary" rows="3" class="form-control" placeholder='Summarize in a sentence or two what this guide will accomplish.'>{{guideData.summary}}</textarea>
                      </div>
                      <div id="introduction-div" class="introduction form-field">
                        <label for="intro-introduction">Introduction</label>
                        <textarea name="intro[introduction]" id="intro-introduction" rows="7" class="form-control" placeholder=''>{{guideData.introduction}}</textarea>
                      </div>  
                    </div>
                    <div class="submit">
                      <div class="guide-action-buttons">
                        <button class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
                  <div class="pagination pagination-bottom">
                    <p class="left"></p>
                    <p class="middle">Editing Introduction</p>
                    <p class="right">
                      <!-- TODO: Can I move to the next tab with this link? -->
                      <a href="#">Guide Steps</a>&nbsp;
                      <i class="fa fa-arrow-right"></i>
                    </p>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="messages">Guide Steps</div>
              </div>
            </div>
          </div>
        </div>
        <div id="sidebar-float">
          <div id="sidebar" class="col-md-4">
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
</div>
</template>

<script>
import GuideData from './data';
export default {
  beforeMount() {
    this.gatherThumbnails();
  },
  ready() {
    $('#myTabs a').click(e => {
      e.preventDefault();
      $(this).tab(show);
    })
  },
  data() {
    return {
      guideData: GuideData,
      imageThumbs: [],
      isActive: []
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
        if (idx === index) {
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
    },
    isGuideType(type) {
      return type.toLowerCase() === this.guideData.type;
    }
  }
}
</script>
