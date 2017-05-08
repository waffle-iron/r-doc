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
//      this.setNotActive();
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
          console.log(this.isActive);
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
  #main-body {
    padding-top: 0.1px;
    background-color: #fff;
    text-align: start;
    position: relative;
    min-height: 300px;
    border-radius: 0;
    box-shadow: 0 0 6px #ccc;
  }

  .lower-navbar {
    background-color: #f2f2f2;
    position: relative;
  }

  .edit-navbar {
    float: right;
    list-style-type: none;
    position: relative;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
    height: 40px;
  }

  .arrow {
    font-size: 1.2em;
    font-weight: normal;
    line-height: 1.388em;
  }

  .edit-navbar li {
    margin: 0;
    padding: 0;
    height: 40px;
    line-height: 30px;
    float: left;
    border-right: 1px solid #ddd;
  }

  .edit-navbar li:hover {
    background-color: #fff;
  }

  .edit-navbar li:last-child {
    border: 0;
  }

  .edit-navbar li a {
    margin: 5px 0;
    height: 30px;
    line-height: 30px;
    display: inline-block;
    padding: 0 20px;
    border-style: none;
    color: #888;
  }

  .edit-navbar li a:hover,
  .edit-navbar li a:active,
  .edit-navbar li a:focus {
    text-decoration: none;
  }

  .edit-navbar li.active-nav a {
    color: #212426 !important;
    font-weight: bold;
  }

  #breadcrumb {
    display: block;
    line-height: 40px;
  }

  #breadcrumb .back-nav {
    margin-left: 12px;
  }

  #breadcrumb .breadcrumb-item {
    font-weight: bold;
    font-size: 13px;
  }

  #breadcrumb a {
    color: #555;
  }

  #breadcrumb a:hover,
  #breadcrumb a:active,
  #breadcrumb a:focus {
    text-decoration: none;
  }

  #sidebar-float {
    float: right;
    padding-right: 24px;
    padding-bottom: 24px;
  }

  #sidebar {
    width: 316px;
    margin-top: 24px;
  }

  #sidebar > div:first-child {
    margin-top: 0;
  }

  #main-guide-image {
    position: relative;
    margin: 8px 0 0;
    border: 8px solid #eee;
    border-radius: 4px;
  }

  .media-target {
    cursor: pointer;
    overflow: hidden;
    display: inline-block;
  }

  .media-target .contents {
    background-position: center;
    background-repeat: no-repeat;
  }

  .media-item {
    position: relative;
    overflow: hidden;
  }

  .media-target .replace-image {
    opacity: 0;
  }

  .alter-target {
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    z-index: 1;
    transition: opacity ease-out 0.28s;
  }

  .media-target .standard .icon {
    height: 100%;
    width: 100%;
    margin: 0;
  }

  .replace-image > .icon {
    background-image: url(https://d1ulmmr4d4i8j4.cloudfront.net/static/images/guide/replace-large.png);
    z-index: 2;
  }

  #sidebar .form-body {
    margin: 8px 0;
  }

  #guide-step-index {
    padding-right: 0;
  }

  .form-body {
    padding: 0 8px 8px 8px;
    overflow: auto;
    background-color: #eee;
    border-radius: 4px;
  }

  h3 .toggle-bar .subhead {
    font-size: 18px;
    padding-right: 10px;
  }

  .form-body h3 .subhead {
    margin-top: 0;
    padding: 5px 0 2px;
  }

  h3 .toggle-bar {
    margin: 0 0 4px 0;
    border-radius: 4px;
    background-color: #eee;
    cursor: pointer;
  }

  h3 {
    font-weight: 600;
  }

  #sidebar-toggle-edit .toggle-div {
    padding-left: 2px;
  }

  #guide-step-index .guide-sidebar-thumb {
    position: relative;
    float: left;
    width: 56px;
    height: 42px;
    margin: 0 4px 4px 0;
    background: no-repeat center center;
  }

  #guide-step-index .guide-sidebar-thumb a {
    display: block;
    height: 100%;
  }

  .guide-sidebar-thumb .thumb-overlay {
    opacity: 0.3;
    background-color: rgb(60, 93, 139);
  }

  #guide-step-index .active > .thumb-overlay {
    opacity: 0.01;
  }

  #guide-step-index .active > .step-number {
    background-color: #fece71;
  }

  .step-number {
    position: absolute;
    bottom: 0;
    right: 0;
    width: 1.6em;
    margin: 0;
    background-color: #212426;
    text-align: center;
    font-size: 1em;
    font-weight: bold;
    color: #fff;
  }

  #guide-step-index .guide-sidebar-add-step {
    position: relative;
    float: left;
    width: 56px;
    height: 42px;
    margin: 0 4px 4px 0;
    background-repeat: no-repeat;
    background-position: left -84px;
  }

  #guide-step-index .guide-sidebar-add-step a {
    display: block;
    text-align: center;
    width: 100%;
    height: 100%;
    padding: 2px;
    text-shadow: 0 -1px 0 #feb325;
    background-color: #fece71;
    color: #fff;
  }

  .guide-sidebar-add-step a i.fa {
    font-size: 23px;
    font-weight: bold;
    margin-top: 7px;
  }
</style>