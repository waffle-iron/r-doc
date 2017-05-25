<template>
  <v-card id="guide-step" v-if="!edit">
    <v-card-row class="yellow">
      <v-card-title>
        <span>Introduction</span>
      </v-card-title>
    </v-card-row>
    <v-card-row class="pt-4 pb-2 pl-4 pr-4">
      <p>{{ data.introduction }}</p>
    </v-card-row>
  </v-card>
</template>

<script>
  export default {
    props: ['data', 'edit']
  }
</script>

<style lang="stylus">

</style>