<template>
  <div class="clearfix">
    <div class="lower-navbar">
      <ul class="edit-navbar">
        <li>
          <a :href="viewUrl()">View</a>
        </li>
        <li class="active-nav">
          <a href="#">Edit</a>
        </li>
        <li>
          <a href="#" style="color: red;">History</a>
        </li>
      </ul>
      <div id="breadcrumb">
        <a href="#" class="breadcrumb-item back-nav">
          <span class="arrow fa fa-arrow-left"></span>
          &nbsp;&nbsp;Back to {{data.previousText}}
        </a>
      </div>
      <div class="clearer"></div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['data'],
    data() {
      return {
        baseUrl: '/mockups/guide'
      }
    },
    methods: {
      viewUrl() {
        return `${this.baseUrl}/${this.data.guideid}`;
      }
    }
  }
</script>