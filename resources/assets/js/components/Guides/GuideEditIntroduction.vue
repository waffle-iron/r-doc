<template>
  <div role="tabpanel" class="tab-pane active" id="introduction">
    <div id="guide-intro-form">
      <div id="form-inputs" class="form-body">
        <div id="type-div" class="form-field form-field-top">
          <label for="intro-type">What type of guide is this?</label>
          <select name="" id="intro-type" class="form-control">
            <option :value="doctype" v-for="doctype in data.types" :selected="isGuideType(doctype)">
              {{doctype}}
            </option>
          </select>
        </div>
        <div id="device-div" class="form-field text-field">
          <label for="intro-device">Device</label>
          <input type="text" name="intro[device]" id="intro-device" class="form-control" :value='data.category'/>
        </div>
        <div id="title-div" class="form-field text-field">
          <label for="intro-title" class="tip">Title</label>
          <input type="text" name="intro[title]" id="intro-title" :value='data.title' class="form-control">
        </div>
        <div id="summary-div" class="summary form-field">
          <!-- TODO: I would like to add a character counter here. -->
          <label for="intro-summary">Search Summary</label>
          <textarea name="intro[summary]" id="intro-summary" rows="3" class="form-control"
                    placeholder='Summarize in a sentence or two what this guide will accomplish.'>{{data.summary}}</textarea>
        </div>
        <div id="introduction-div" class="introduction form-field">
          <label for="intro-introduction">Introduction</label>
          <markdown-editor v-model="introContent" ref="markdownEditor" id="intro-introduction"></markdown-editor>
        </div>
      </div>
      <div class="submit">
        <div class="guide-action-buttons">
          <button class="btn btn-primary">Save</button>
        </div>
      </div>
      <div class="pagination pagination-bottom">
        <p class="left"></p>
        <p class="middle">Editing Introduction</p>
        <p class="right">
          <a :href="editStepsUrl()" id="next-arrow">Guide Steps</a>&nbsp;
          <i class="fa fa-arrow-right"></i>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
  import {markdownEditor} from 'vue-simplemde';

  export default {
    props: ['data'],
    components: {
      markdownEditor
    },
    data() {
      return {
        baseUrl: '/mockups/guide/steps',
        introContent: toMarkdown(this.data.introduction),
        configs: {}
      }
    },
    methods: {
      isGuideType(doctype) {
        return doctype.toLowerCase() === this.data.type;
      },
      editStepsUrl() {
        return `${this.baseUrl}/${this.data.guideid}/${this.data.stepsid}`;
      }
    }
  }

</script>