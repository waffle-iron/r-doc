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
            <img :src="media.medium" alt=""
                 :class="{'step-image': true, 'img-responsive': true, visible: shouldBeVisible(media)}">
          </div>
        </div>
        <div class="col-md-5 step-content">
          <div class="row step-thumbnails">
            <div class="col-md-4" v-for="(media, index) in step.media.data">
              <div :class="{'step-thumbnail-container': true, active: shouldBeVisible(media)}">
                <div class="step-thumbnail-inner">
                  <img :src="media.medium" class="img-responsive step-thumbnail"
                       @mouseover="makeVisible(media, step.media.data)">
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
        visibleObject: []
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
      },
      createImageObject() {
        let steps = this.stepData.steps;
        let media = [];
        steps.forEach(step => {
          media.push(step.media.data);
        });
        this.visibleObject = media;
      },
      shouldBeVisible(obj) {
        return obj.visible;
      },
      makeVisible(obj, arr) {
        arr.forEach(image => {
          if(image.id !== obj.id && image.visible) {
            image.visible = false;
            obj.visible = true;
          }
        });
      }
    }
  }
</script>