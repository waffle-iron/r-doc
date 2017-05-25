<template lang="pug">
  #guide-step.mt-4(v-if="!edit")
    v-card
      v-card-row.yellow
        v-card-title
          span Introduction
      v-card-row.pt-4.pb-2.pl-4.pr-4
        p {{ data.introduction }}
  #guide-step-edit.mt-4(v-else)
    v-card
      v-card-row.yellow
        v-card-title
          span TODO...
</template>

<script>
  export default {
    props: ['data', 'edit']
  }
</script>

<style lang="stylus">

</style>