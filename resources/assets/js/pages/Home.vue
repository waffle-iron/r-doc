<template>
  <div id="home">
    <toolbar title="Home"></toolbar>
    <v-container>
      <v-progress-circular indeterminate
                           v-if="loading"
                           class="center-on-page"
                           :size="50"></v-progress-circular>
      <v-layout row v-if="!loading">
        <v-flex sm10 offset-sm1 lg6 offset-lg3>
          <v-card hover raised height="75px" class="mb-3">
            <v-card-row class="pt-2 pl-5 pr-5">
              <v-text-field name="search-input"
                            label="Search documentation"
                            id="search-documentation-temp"
                            v-model="search">
              </v-text-field>
            </v-card-row>
          </v-card>
          <v-card>
            <h2 class="text-xs-center">Documentation Index</h2>
            <v-divider class="grey lighten-2"></v-divider>
            <paginate name="guides"
                      :list="filteredList"
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
  import Toolbar from '../components/Toolbar.vue'
  import PaginateLinks from "vue-paginate/src/components/PaginateLinks";
  import IndexCard from '../components/IndexCard.vue';

  export default {
    components: {
      Toolbar,
      PaginateLinks,
      IndexCard
    },
    created () {
      axios.get('/api/v1/guides')
          .then(({data}) => {
            this.query = data;
            this.loading = false
          });
    },
    data () {
      return {
        query: [],
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
      filteredList() {
        return this.query.filter(post => {
          return post.title.toLowerCase().includes(this.search.toLowerCase())
        })
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