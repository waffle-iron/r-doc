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
                <index-card :data="guide"></index-card>
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
  import IndexCard from '../components/IndexCard.vue';
  import VueTypeahead from 'vue-typeahead';

  export default {
    components: {PaginateLinks, IndexCard},
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
</style>