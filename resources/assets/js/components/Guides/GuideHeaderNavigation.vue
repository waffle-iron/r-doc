<template>
  <div class="guide__navigation-in-header row">
    <div class="column">
      <ul class="row page-navigation-bar">
        <li class="page-navigation-link back-link">
          <a href="#" class="nav-link">
            <i class="glyphicon glyphicon-chevron-left icon"></i>
            <span>{{navData.title}}</span>
          </a>
        </li>
        <li class="page-navigation-link">
          <a href="/mockups/guide/edit" class="nav-link">
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
              <li><a href="#">History</a></li>
              <li><a href="#">Save to Favorites</a></li>
              <li><a href="#">Download PDF</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: ['navData']
}

</script>

<style>
  .guide__navigation-in-header {
    padding: 0 10px;

  }

  .page-navigation-bar {
    margin-top: -22px;
    margin-left: 0;
    margin-right: 0;
    padding: 0;
    height: 50px;
    background-color: rgba(33, 36, 38, 0.05);
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    list-style-type: none;
    text-align: left;
    justify-content: flex-end;
  }

  .page-navigation-bar .back-link {
    margin-right: auto;
    overflow: hidden;
    text-overflow: ellipsis;
    min-width: 0;
  }

  .page-navigation-link a {
    display: inline-block;
    padding-right: 20px;
    line-height: 50px;
    color: #4e5052;
    white-space: nowrap;
    cursor: pointer;
    transition: background-color 0.1s, color 0.1s;
  }

  .page-navigation-link:first-child a {
    padding-left: 5px;
    border-bottom-left-radius: 4px;
  }

  .page-navigation-link a:hover {
    background-color: rgba(0, 0, 0, 0.05);
    text-decoration: none;
    color: #24272a;
  }

  .page-navigation-link .icon {
    margin: 0 10px;
    color: #24272a;
    opacity: 0.3;
    transition: opacity 0.1s;
  }

  .nav-link {
    padding-left: 20px;
  }

  .nav-link:focus {
    text-decoration: none;
  }
</style>