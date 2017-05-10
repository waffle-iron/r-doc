<template>
  <div class="steps-container" v-if="!edit">
    <div v-for="(step, index) in data.steps">
      <section :id="getStepId(step.stepid)" class="step">
        <div class="row">
          <div class="col-md-10">
            <div class="step-title">
              <a :href="getStepId(step.stepid)" class="fragment-link">
                <i class="fa fa-slack anchor"></i>
                <strong class="step-value">Step {{ index + 1 }}</strong>
                <span class="step-title-title"
                      v-if="index+1 === 1">iMac Intel 27" Retina 5K Display Teardown</span>
              </a>
            </div>
          </div>
          <div class="col-md-2">
            <div class="step-edit-link">
              <a :href="editStepUrl(index)" class="btn btn-default">
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
  <div class="steps-container" v-else>
    <section :id="getStepId(editStep.stepid)" class="step">
      <div class="row">
        <div class="col-md-10">
          <div class="step-title">
            <h2><strong class="step-value">Step {{ editStep.orderby }}</strong></h2>
          </div>
        </div>
      </div>
    </section>
    <div class="step-media step-main-media" v-for="(media, index) in editStep.media.data">
      <img :src="media.medium" alt=""
           :class="{'step-image-edit': true, 'img-responsive': true, visible: shouldBeVisible(media)}">
    </div>
    <div class="row edit-step-thumbnails">
      <div class="col-md-4" v-for="(media, index) in editStep.media.data">
        <div :class="{'step-thumbnail-container': true, active: shouldBeVisible(media)}">
          <div class="step-thumbnail-inner">
            <img :src="media.medium" class="img-responsive step-thumbnail"
                 @mouseover="makeVisible(media, editStep.media.data)">
          </div>
        </div>
      </div>
    </div>
    <hr class="thumbnail-divider">
    <div class="step-content">
      <div class="row step-lines-container">
        <ul class="step-lines">
          <li v-for="line in editStep.lines">
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
    <div class="submit">
      <div class="guide-action-buttons">
        <button class="btn btn-primary">Save</button>
      </div>
    </div>
    <div id="guide-step-actions">
      <a class="btn btn-lg button-delete" id="deleteStep" href="#">
        <i class="fa fa-trash-o"></i>&nbsp;Delete Step</a>
      <a id="insert-step" class="btn btn-lg" href="#">
        <i class="fa fa-plus"></i>&nbsp;Insert Step</a>
    </div>
    <div class="pagination pagination-bottom" v-if="edit">
      <p class="left">
        <i class="fa fa-arrow-left"></i>&nbsp;
        <a :href="previousStepUrl">{{backLabel}}</a>
      </p>
      <p class="middle"></p>
      <p class="right">
        <a :href="nextStepUrl" id="next-arrow">Next</a>&nbsp;
        <i class="fa fa-arrow-right"></i>
      </p>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['data', 'edit'],
    created() {
      this.currentStepEditId = this.getCurrentStepEditId();
      this.determineEditStep();
      this.determinePreviousAndNextStep();
    },
    data() {
      return {
        baseUrl: '/mockups/guide/steps',
        baseBackUrl: '/mockups/guide/intro',
        visibleObject: [],
        currentStepEditId: 0,
        editStep: {},
        previousStepUrl: '',
        nextStepUrl: ''
      }
    },
    computed: {
      backLabel() {
        if (this.editStep.orderby > 1) {
          return 'Back';
        } else {
          return 'Introduction';
        }
      }
    },
    methods: {
      makeIntroductionBackUrl: function () {
        this.previousStepUrl = `${this.baseBackUrl}/${this.data.guideid}`;
      },
      makeNextUrl: function () {
        this.nextStepUrl = `${this.baseUrl}/${this.data.guideid}/${this.data.steps[this.editStep.orderby].stepid}`;
      },
      makeNewStepUrl: function () {
        this.nextStepUrl = `${this.baseUrl}/${this.data.guideid}/new-after/${this.editStep.orderby + 1}`;
      },
      makePreviousUrl: function () {
        this.previousStepUrl = `${this.baseUrl}/${this.data.guideid}/${this.data.steps[this.editStep.orderby - 2].stepid}`
      },
      determinePreviousAndNextStep() {
        if (this.edit) {
          if (this.editStep.orderby === 1) {
            this.makeIntroductionBackUrl();
            this.makeNextUrl()
          } else if (this.editStep.orderby === this.data.steps.length) {
            this.makePreviousUrl();
            this.makeNewStepUrl();
          } else {
            this.makeNextUrl();
            this.makePreviousUrl();
          }
        }
      },
      getCurrentStepEditId() {
        let path = window.location.pathname.split('/');
        return parseInt(path[path.length - 1]);
      },
      determineEditStep() {
        if (this.edit) {
          this.data.steps.forEach(step => {
            if (step.stepid === this.currentStepEditId) {
              this.editStep = step;
            }
          });
        }
      },
      getStepId(stepid) {
        return `#s${stepid}`;
      },
      getBulletColor(bullet) {
        if (bullet === 'black') {
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
        let steps = this.data.steps;
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
          if (image.id !== obj.id && image.visible) {
            image.visible = false;
            obj.visible = true;
          }
        });
      },
      editStepUrl(index) {
        return `${this.baseUrl}/${this.data.guideid}/${this.data.steps[index].stepid}`;
      }
    }
  }
</script>