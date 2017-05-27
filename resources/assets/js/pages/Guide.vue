<template lang="pug">
  #guide
    toolbar(title='<i class="material-icons icon icon--light">arrow_back</i>&nbsp;HOME')
    .portrait
      v-card(:img="image" height="300px")
        .transparent-image
          v-card-row.image--banner
            p.datatype.card__title.yellow {{ data.type }}
            v-card-title.white--text
              v-flex(column)
                h4.white--text.mb-0 {{ data.title }}
                h6.white--text.text-xs-center Revision {{ data.revision }}
            h6.text-xs-center.yellow(v-if="data.published") Published: {{ data.published }}
            h6.text-xs-center.yellow(v-if="!data.published") Unpublished
      v-container
        v-layout(row-md column child-flex-sm)
          v-flex(sm12 md10 offset-md1 lg8 offset-lg2)
            v-card
              v-card-row.yellow
                v-card-title
                  span Introduction
              v-card-row.pt-4.pb-2.pl-4.pr-4
                p {{ data.introduction }}
            guide-step(:data="data" v-bind:edit="false")
            v-card
              v-card-row.yellow.mt-3
                v-card-title
                  span Conclusion
              v-card-row.pt-4.pb-2.pl-4.pr-4
                p {{ data.conclusion }}
</template>

<script>
  import Toolbar from '../components/Toolbar.vue';
  import GuideStep from '../components/GuideStep.vue';

  export default {
    components: {
      Toolbar,
      GuideStep
    },
    created(){
      axios.get('/api/v1/guides/' + this.$route.params.id)
          .then(r => {
            this.data = r.data;
            this.image = r.data.image.original
          })
    },
    data() {
      return {
        data: {},
        image: ''
      }
    }
  }
</script>

<style lang="stylus">
  .card__row.image--banner
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