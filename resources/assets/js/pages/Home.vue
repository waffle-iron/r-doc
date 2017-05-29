<template lang="pug">
  #home
    toolbar(title="")
    v-container
      v-progress-circular(
        indeterminate
        v-if="loading"
        class="center-on-page"
        v-bind:size="50"
      )
      v-layout(row v-if="!loading")
        v-flex(sm10 offset-sm1 lg6 offset-lg3)
          v-card.mb-3(hover raised height="75px")
            v-card-row.pt-2.pl-5.pr-5
              v-text-field(
                name="search-input"
                label="Search documentation"
                id="search-documentation"
                v-model="search"
              )
          v-card
            h2.text-xs-center Documentation Index
            v-divider
            paginate(
              name="guides"
              v-bind:list="filteredList"
              v-bind:per="10"
              v-bind:class="{'pr-4': true}"
            )
              .portrait.mt-3(
                v-for="guide in paginated('guides')"
                v-bind:key="guide.id"
              )
                index-card(:data="guide")
            .pa-3
              .text-xs-center
                paginate-links(
                  for="guides"
                  v-bind:show-step-links="true"
                  v-bind:classes="paginateClasses"
                  v-bind:limit="7"
                )
</template>

<script>
  import { mapActions, mapState } from 'vuex'
  import Toolbar from '../components/Toolbar.vue'
  import IndexCard from '../components/IndexCard.vue'
  import api from '../api'

  export default {
    components: {
      Toolbar,
      IndexCard
    },
    created () {
      if (!api.get('documentIndex')) {
        this.fetchDocumentIndex()
      } else {
        this.loadDocumentIndex()
      }
      this.loading = false
    },
    data () {
      return {
        paginate: ['guides'],
        loading: true,
        paginateClasses: {
          'li.left-arrow > a': 'pagination__navigation',
          'li.active > a': ['pagination_item--active', 'pagination__item'],
          'li > a': 'pagination__item'
        },
        search: ''
      }
    },
    computed: {
      ...mapState({
        query: state => state.documentList
      }),
      filteredList () {
        return this.query.filter(post => {
          return post.title.toLowerCase().includes(this.search.toLowerCase())
        })
      }
    },
    methods: {
      ...mapActions([
        'fetchDocumentIndex',
        'loadDocumentIndex'
      ])
    }
  }
</script>

<style lang="stylus">
  .center-on-page
    position fixed
    top 50%
    left 50%
    opacity .8

  .paginate-links
    align-items center
    list-style-type none
    display inline-flex
    padding 0
    margin 0
    height 40px
    text-align center !important
    cursor: pointer

    li
      display flex
      align-items center

    li.active
      a
        background black
        color white

    a
      transition .3s cubic-bezier(0, 0, .2, 1)

    .disabled
      opacity .6
      pointer-events: none
</style>
