<template>
  <div id="guide">
    <toolbar :title="icon"></toolbar>
    <div class="portrait">
      <v-card :img="image" height="300px">
        <div class="transparent-image">
          <v-card-row>
            <p class="datatype card__title yellow">{{ data.type }}</p>
            <v-card-title class="white--text">
              <h4 class="white--text">{{ data.title }}</h4>
            </v-card-title>
            <h6 class="text-xs-center yellow" v-if="data.published">Published: {{ data.published }}</h6>
            <h6 class="text-xs-center yellow" v-else>Unpublished</h6>
          </v-card-row>
        </div>
      </v-card>
    </div>
  </div>
</template>

<script>
  import Toolbar from '../components/Toolbar.vue';

  export default {
    components: {
      Toolbar
    },
    created(){
      axios.get('/api/v1/guides/' + this.$route.params.id)
          .then(r => {
            this.data = r.data;
            this.image = r.data.image[0].original
          })
    },
    data() {
      return {
        data: {},
        image: '',
        icon: '<i class="material-icons icon icon--light">arrow_back</i>'
      }
    }
  }
</script>

<style lang="stylus">
  .card__row
    display flex
    flex-direction column
    padding-top 0
    height 100% !important

    .datatype
      padding 0 36px
      position absolute
      top 0
      height 35px
      border-radius 0 0 4px 4px
      font-weight 600

    h4
      align-self center
      padding-top 36px

    h6
      width 100%
      height 30px
      line-height 30px
      margin-bottom 0
</style>