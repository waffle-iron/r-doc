<template lang="pug">
  v-container
    v-layout(row)
      v-flex(md10 offset-md1 lg6 offset-lg3)
        v-card
          paginate(
          name="guides"
              :list="data",
          :per="10"
          ).pr-4
            v-list(two-line)
              v-list-item(
              v-for="(guide, index) in paginated('guides')"
              v-bind:key="guide.id"
                  @click="goToGuide(guide.url)"
              )
                v-list-tile(ripple)
                  v-list-tile-content.mr-3
                    v-list-tile-title {{ guide.title }}
                    v-list-tile-sub-title {{ guide.category }}
                v-divider.grey.lighten-3
          div.pa-3
            .text-xs-center
              paginate-links(
              for="guides"
                  :show-step-links="true"
                  :classes="paginateClasses"
                  :limit="7"
              )
</template>

<script>
  import PaginateLinks from "vue-paginate/src/components/PaginateLinks";
  export default {
    components: {PaginateLinks},
    created () {
      axios.get('/api/v1/guides')
          .then(({data}) => this.data = data)
    },
    data () {
      return {
        data: [],
        paginate: ['guides'],
        shown: false,
        paginateClasses: {
          'li.left-arrow > a': 'pagination__navigation',
          'li.active > a': ['pagination_item--active', 'pagination__item'],
          'li > a': 'pagination__item'
        }
      }
    },
    mounted () {
      setTimeout(() => {
        this.shown = true
      }, 1000)
    },
    methods: {
      goToGuide(url) {
        console.log(url)
        this.$router.push(url)
      }
    }
  }
</script>

<style lang="stylus">
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
      transition .3s cubic-bezier(0,0,.2,1)

    .disabled
      opacity .6
      pointer-events: none

</style>