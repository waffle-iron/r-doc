<template>
  <div class="container edit-container">
    <div id="main-body">
      <edit-navbar :data="editNavbarData"></edit-navbar>
      <div class="row">
        <div id="content-float">
          <div id="content" class="col-md-8">
            <div class="tab-wrap">
              <ul class="nav nav-tabs tab-list" role="tablist" id="content-tabs">
                <li role="presentation" class="active">
                  <a href="#introduction" aria-controls="home" role="tab" data-toggle="tab">Introduction</a>
                </li>
                <li role="presentation">
                  <a href="/mockups/guide/steps">Guide Steps</a>
                </li>
              </ul>
              <div class="tab-content">
                <guide-edit-introduction :data="editIntroData"></guide-edit-introduction>
                <div role="tabpanel" class="tab-pane" id="guide-steps">

                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="sidebar-float">
          <div id="sidebar" class="col-md-4">
            <div id="sidebar-guide-edit">
              <div id="main-guide-image" class="media-target">
                <div class="media-item media-image contents">
                  <img :src="mainImage" alt="" class="standard">
                  <div class="alter-target standard replace-image">
                    <div class="icon"></div>
                  </div>
                </div>
              </div>
              <steps-guide-index :data="steps"></steps-guide-index>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import GuideData from './../data'

  export default {
    data() {
      return {
        editIntroData: {
          category: GuideData.category,
          type: GuideData.type,
          types: GuideData.types,
          title: GuideData.title,
          summary: GuideData.summary,
          introduction: GuideData.introduction
        },
        mainImage: GuideData.image.standard,
        editNavbarData: {
          previousText: GuideData.previous_text,
          backUrl: '/mockups/guide'
        },
        steps: GuideData.steps
      }
    }
  }
</script>
