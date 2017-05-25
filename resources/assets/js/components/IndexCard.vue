<template>
  <v-card :img="data.image" height="200px" @click="goToGuide(data.url)">
    <div class="transparent-image">
      <v-card-row>
        <v-card-title>
          <h4 class="white--text mt-2 ml-2 mb-2">{{ data.title }}</h4> <br>
        </v-card-title>
      </v-card-row>
      <v-card-row actions>
        <v-chip>{{ data.category }}</v-chip>
        <v-spacer></v-spacer>
        <v-btn flat class="white--text">{{ data.modified_date }}</v-btn>
        <v-icon class="white--text">event</v-icon>
      </v-card-row>
    </div>
  </v-card>
</template>

<script>
  export default {
    props: ['data'],
    methods: {
      goToGuide(url) {
        this.$router.push(url)
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