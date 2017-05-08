<template>
  <div id="guide-intro-form">
    <div id="form-inputs" class="form-body">
      <div id="type-div" class="form-field form-field-top">
        <label for="intro-type">What type of guide is this?</label>
        <select name="" id="intro-type" class="form-control">
          <option :value="type" v-for="type in introData.types" :selected="isGuideType(type)">
            {{introData.type}}
          </option>
        </select>
      </div>
      <div id="device-div" class="form-field text-field">
        <label for="intro-device">Device</label>
        <input type="text" name="intro[device]" id="intro-device" class="form-control" :value='introData.category'/>
      </div>
      <div id="title-div" class="form-field text-field">
        <label for="intro-title" class="tip">Title</label>
        <input type="text" name="intro[title]" id="intro-title" :value='introData.title' class="form-control">
      </div>
      <div id="summary-div" class="summary form-field">
        <!-- TODO: I would like to add a character counter here. -->
        <label for="intro-summary">Search Summary</label>
        <textarea name="intro[summary]" id="intro-summary" rows="3" class="form-control"
                  placeholder='Summarize in a sentence or two what this guide will accomplish.'>{{introData.summary}}</textarea>
      </div>
      <div id="introduction-div" class="introduction form-field">
        <label for="intro-introduction">Introduction</label>
        <textarea name="intro[introduction]" id="intro-introduction" rows="7" class="form-control"
                  placeholder=''>{{introData.introduction}}</textarea>
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
        <!-- TODO: Can I move to the next tab with this link? -->
        <a href="#">Guide Steps</a>&nbsp;
        <i class="fa fa-arrow-right"></i>
      </p>
    </div>
  </div>

</template>

<script>

  export default {
    props: ['introData'],
    data() {
      return {}
    },
    methods: {
      isGuideType(type) {
        return type.toLowerCase() === this.introData.type;
      }
    }
  }

</script>