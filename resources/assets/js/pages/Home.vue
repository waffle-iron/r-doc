<template>
  <v-container>
    <v-progress-circular indeterminate
                         v-if="!show"
                         class="center-on-page"
                          :size="50"></v-progress-circular>
    <v-layout row v-if="show">
      <v-flex md10 offset-md1 lg6 offset-lg3>
        <v-card>
          <paginate name="guides" :list="data" :per="10" class="pr-4">
            <v-list two-line>
              <v-list-item v-for="guide in paginated('guides')"
                           :key="guide.id"
                           @click="goToGuide(guide.url)">
                <v-list-tile ripple>
                  <v-list-tile-content class="mr-3">
                    <v-list-tile-title>{{ guide.title }}</v-list-tile-title>
                    <v-list-tile-sub-title>{{ guide.category }}</v-list-tile-sub-title>
                  </v-list-tile-content>
                </v-list-tile>
                <v-divider class="grey lighten-3"></v-divider>
              </v-list-item>
            </v-list>
          </paginate>
          <div class="pa-3">
            <div class="text-xs-center">
              <paginate-links for="guides"
                              :show-step-links="true"
                              :classes="paginateClasses"
                              :limit="7"></paginate-links>
            </div>
          </div>
        </v-card>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
  import PaginateLinks from "vue-paginate/src/components/PaginateLinks";
  export default {
    components: {PaginateLinks},
    created () {
      axios.get('/api/v1/guides')
          .then(({data}) => {
            this.data = data
            this.show = true
          });
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
        },
        show: false
      }
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
  .center-on-page
    position fixed
    top 50%
    left 50%
    margin-top -50px
    margin-left -50px
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