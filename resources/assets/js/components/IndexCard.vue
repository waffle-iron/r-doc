<template lang="pug">
  v-card(:img="data.image" height="200px" v-on:click="goToGuide(data.id)")
    .transparent-image
      v-card-row
        v-card-title
          h4.white--text.mt-2.ml-2.mb-2 {{ data.title }}
      v-card-row(actions)
        v-chip {{ data.category }}
        v-spacer
        v-btn(flat class="white--text") {{ data.modified_date }}
        v-icon.white--text event
</template>

<script>
  export default {
    props: ['data'],
    methods: {
      goToGuide(guideid) {
        this.$router.push({name: 'guide', params: { id: guideid }})
      }
    }
  }
</script>

<style lang="stylus">
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