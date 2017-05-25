<template>
  <div id="home">
    <v-toolbar class="grey darken-4">
      <v-toolbar-title>r-doc</v-toolbar-title>
      <v-toolbar-items @click="goToLogin()">
        <v-btn primary light>Login</v-btn>
      </v-toolbar-items>
    </v-toolbar>
    <v-container>
      <v-progress-circular indeterminate
                           v-if="!show"
                           class="center-on-page"
                           :size="50"></v-progress-circular>
      <v-layout row v-if="show">
        <v-flex sm10 offset-sm1 lg6 offset-lg3>
          <v-card>
            <h2 class="text-xs-center">Documentation Index</h2>
            <v-divider class="grey lighten-2"></v-divider>
            <paginate name="guides"
                      :list="query"
                      :per="10"
                      class="pr-4">
              <div class="portrait mt-3"
                   v-for="guide in paginated('guides')"
                   :key="guide.id">
                <v-card :img="guide.image" height="200px" @click="goToGuide(guide.url)">
                  <div class="transparent-image">
                    <v-card-row>
                      <v-card-title>
                        <h4 class="white--text mt-2 ml-2 mb-2">{{ guide.title }}</h4> <br>
                      </v-card-title>
                    </v-card-row>
                    <v-card-row actions>
                      <v-chip>{{ guide.category }}</v-chip>
                      <v-spacer></v-spacer>
                      <v-btn flat class="white--text">{{ guide.modified_date }}</v-btn>
                      <v-icon class="white--text">event</v-icon>
                    </v-card-row>
                  </div>
                </v-card>
              </div>
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
  </div>
</template>

<script>
  import PaginateLinks from "vue-paginate/src/components/PaginateLinks";
  import VueTypeahead from 'vue-typeahead';

  export default {
    components: {PaginateLinks},
    mixins: [VueTypeahead],
    created () {
      axios.get('/api/v1/guides')
          .then(({data}) => {
            this.query = data;
            data.forEach(d => this.data.push(d.title));
            this.show = true
          });
    },
    data () {
      return {
        query: [],
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
        this.$router.push(url)
      },
      goToLogin() {
        this.$router.push('/login')
      }
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

  .transparent-image
    position absolute
    z-index 1
    width 100%
    height 100%
    background-color rgba(0, 0, 0, .5)

    .card__row.card__row--actions
      position absolute
      bottom 0
</style>