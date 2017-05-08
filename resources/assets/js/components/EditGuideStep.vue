<template>
  <div class="container edit-container">
    <div class="main-body">
      <edit-navbar :data="editNavbarData"></edit-navbar>
      <div class="row">
        <div id="content-float">
          <div id="content" class="col-md-8">
            <div class="tab-wrap">
              <ul class="nav nav-tabs tab-list" role="tablist" id="content-tabs">
                <li role="presentation">
                  <a :href="guideIntroductionUrl()">Introduction</a>
                </li>
                <li role="presentation" class="active">
                  <a href="#guide-steps" aria-controls="guide-steps" role="tab" data-toggle="tab">Guide Steps</a>
                </li>
              </ul>
              <div class="tab-content">
                <guide-edit-steps></guide-edit-steps>
              </div>
            </div>
          </div>
          <div id="sidebar-float">
            <div id="sidebar" class="col-md-4">
              <div id="sidebar-guide-edit">
                <steps-guide-index :data="stepsData" :edit="true"></steps-guide-index>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import GuideData from './../data.js';
  export default {
    data() {
      return {
        baseUrl: '/mockups/guide/intro',
        editNavbarData: {
          previousText: GuideData.previous_text,
          guideid: GuideData.guideid
        },
        stepsData: {
          steps: GuideData.steps,
          guideid: GuideData.guideid
        }
      }
    },
    methods: {
      guideIntroductionUrl() {
        return `${this.baseUrl}/${GuideData.guideid}`;
      }
    }
  }
</script>