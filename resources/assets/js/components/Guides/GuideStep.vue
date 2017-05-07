<template>
  <div class="steps-container">
    <div v-for="(step, index) in stepData.steps">
      <section :id="getStepId(step.stepid)" class="step">
        <div class="row">
          <div class="col-md-10">
            <div class="step-title">
              <a :href="getStepId(step.stepid)" class="fragment-link">
                <i class="glyphicon glyphicon-circle-arrow-right anchor"></i>
                <strong class="step-value">Step {{ index + 1 }}</strong>
                <span class="step-title-title"
                      v-if="index+1 === 1">iMac Intel 27" Retina 5K Display Teardown</span>
              </a>
            </div>
          </div>
          <div class="col-md-2">
            <div class="step-edit-link">
              <a href="#" class="btn btn-default">
                <span>Edit&nbsp;</span>
                <i class="glyphicon glyphicon-edit"></i>
              </a>
            </div>
          </div>
        </div>
      </section>
      <div class="row">
        <div class="col-md-7">
          <div class="step-media step-main-media" v-for="(media, index) in step.media.data">
            <img :src="media.medium" alt="" :class="{'step-image': true, 'img-responsive': true, visible: index+1 === 1, hidden: index+1 !== 1}">
          </div>
        </div>
        <div class="col-md-5 step-content">
          <div class="row step-thumbnails">
            <div class="col-md-4" v-for="(media, index) in step.media.data">
              <div :class="{'step-thumbnail': true, active: index+1 === 1}">
                <div class="step-thumbnail-inner">
                  <img :src="media.medium" class="img-responsive">
                </div>
              </div>
            </div>
          </div>
          <div class="row step-lines-container">
            <ul class="step-lines">
              <li v-for="line in step.lines">
                <div :class="getBulletColor(line.bullet)" v-if="line.level === 0"></div>
                <p v-html="line.text_rendered" v-if="line.level === 0"></p>
                <div class="clearer" v-if="line.level === 0"></div>
                <ul v-if="line.level === 1 || line.level === 2">
                  <li v-if="line.level === 1">
                    <div :class="getBulletColor(line.bullet)" v-if="line.level===1"></div>
                    <p v-html="line.text_rendered" v-if="line.level===1"></p>
                  </li>
                  <div class="clearer" v-if="line.level===1"></div>
                  <ul v-if="line.level === 2">
                    <div :class="getBulletColor(line.bullet)"></div>
                    <p v-html="line.text_rendered"></p>
                    <li class="clearer"></li>
                  </ul>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="divider-container">
        <div class="divider-row divider">
          <div class="divider-content"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['stepData'],
    data() {
      return {

      }
    },
    computed: {
      currentlyActiveImage() {
        return;
      }
    },
    methods: {
      getStepId(stepid) {
        return `#s${stepid}`;
      },
      getBulletColor(bullet) {
        if(bullet === 'black') {
          return {
            'fa': true,
            'fa-circle': true,
            'bullet': true,
            'bullet-black': true
          }
        } else {
          return {
            'fa': true,
            'fa-circle': bullet !== 'icon_note',
            'bullet': true,
            'fa-info': bullet === 'icon_note',
            'bullet-red': bullet === 'red',
            'bullet-orange': bullet === 'orange',
            'bullet-yellow': bullet === 'yellow',
            'bullet-green': bullet === 'green',
            'bullet-blue': bullet === 'blue'
          }
        }
      }
    }
  }
</script>

<style>
  .steps-container {
    position: relative;
  }

  .step {
    line-height: 1em;
  }

  .step-title {
    text-decoration: none;
    line-height: 1.5em;
    padding: 2.1em 0;
  }

  .fragment-link {
    font-size: 2em;
  }

  .fragment-link:hover {
    text-decoration: none;
  }

  .anchor {
    color: #212426;
    opacity: 0.2;
    vertical-align: middle;
  }

  .step-title strong {
    font-weight: 700;
    color: #212426;
    padding-top: 5px;
  }

  .step-title .step-title-title {
    margin-left: 20px;
    color: #212426;
    font-weight: 300;
  }

  .step-edit-link {
    float: right;
    padding: 2.1em 0;
  }

  .step-main-media > .visible {
    position: static;
    visibility: visible;
  }

  .step-main-media > .hidden {
    position: absolute;
    visibility: hidden;
    top: 0;
    left: 0;
    height: auto;
  }

  .step-image {
    width: 100%;
    height: auto;
  }

  .step-thumbnails {
    margin-bottom: 20px;
  }

  .step-thumbnail {
    box-shadow: 0 0 0 0 transparent;
    transition: transform 0.2s;
  }

  .step-thumbnails .active {
    transform: translateY(-4px);
  }

  .step-thumbnails .active img {
    opacity: 1;
    box-shadow: 0 4px 10px rgba(0,0,0,0.5);
  }

  .step-thumbnail img {
    display: block;
    width: 100%;
    max-height: 90px;
    border-radius: 3px;
    transition: box-shadow 0.2s, border-color 0.2s, opacity 0.2s;
  }

  .step-thumbnail-inner {
    width: 110px;
    height: auto;
  }

  .step-lines {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .step-lines li {
    position: relative;
    margin: 0 0 20px 0;
    width: 100%;
  }

  .step-lines .bullet {
    position: absolute;
    top: 7px;
    font-size: 10px;
  }

  .bullet {
    width: 12px;
    height: 12px;
    line-height: 12px;
  }

  .step-lines .bullet-black {
    color: #ccc;
  }

  .bullet-red {
    color: #c1280b;
  }

  .bullet-orange {
    color: #ff9024;
  }

  .bullet-yellow {
    color: #f3e00e;
  }

  .bullet-green {
    color: #16dc81;
  }

  .bullet-blue {
    color: #2343e8;
  }

  .step-lines p {
    font-size: 16px;
    line-height: 22px;
    padding: 0 2px 0 26px;
    margin: 0;
  }

  .step-lines ul {
    list-style: none;
    padding: 0;
    margin: 20px 0 0 20px;
  }

  .clearer {
    clear: both;
    height: 0;
    padding: 0;
    margin: 0;
    line-height: 0;
    font-size: 0;
  }

  .divider-row .divider {
    position: relative;
    display: flex;
    flex-direction: row;
    align-items: center;
  }

  .divider-content {
    height: 1px;
    background-color: #f0f0f0;
    align-items: center;
  }
</style>