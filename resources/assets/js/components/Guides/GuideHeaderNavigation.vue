<template>
  <div class="guide__navigation-in-header row">
    <div class="column">
      <ul class="nav-row page-navigation-bar">
        <li class="page-navigation-link back-link">
          <a href="#" class="nav-link">
            <i class="glyphicon glyphicon-chevron-left icon"></i>
            <span>{{data.title}}</span><span style="color: red;">&nbsp;(not implmented)</span>
          </a>
        </li>
        <li class="page-navigation-link">
          <a :href="editUrl()" class="nav-link">
            <span>Edit&nbsp;</span>
            <i class="glyphicon glyphicon-edit"></i>
          </a>
        </li>
        <li class="page-navigation-link">
          <div class="btn-group pull-right">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false">
              <span>Options&nbsp;</span>
              <i class="glyphicon glyphicon-option-vertical"></i>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#" style="color: red;">History</a></li>
              <li><a href="#" style="color: red;">Save to Favorites</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: ['data'],
  data() {
    return {
      baseUrl: '/mockups/guide/intro'
    }
  },
  methods: {
    editUrl() {
      return `${this.baseUrl}/${this.data.guideid}`
    }
  }
}
</script>
