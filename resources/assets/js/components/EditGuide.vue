<template>
  <div class="container edit-container">
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
                  <guide-edit-introduction :introData="editIntroData"></guide-edit-introduction>
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
                    <div class="icon"></div>
                  </div>
                </div>
              </div>
              <steps-guide-index :indexData="guideData.steps"></steps-guide-index>
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
    ready() {
      $('#myTabs a').click(e => {
        e.preventDefault();
        $(this).tab(show);
      });
    },
    data() {
      return {
        guideData: GuideData,
        editIntroData: {
          category: GuideData.category,
          type: GuideData.type,
          types: GuideData.types,
          title: GuideData.title,
          summary: GuideData.summary,
          introduction: GuideData.introduction
        }
      }
    }
  }
</script>
