<template lang="pug">
  v-toolbar(primary)
    v-toolbar-title(v-html="title" v-on:click="goHome()")
    v-toolbar-items(v-on:click="goToLogin()")
      v-btn(primary light) Login
</template>

<script>

  export default {
    props: ['title'],
    methods: {
      goToLogin() {
        this.$router.push('/login')
      },
      goHome() {
        this.$router.push('/')
      }
    }
  }
</script>

<style lang="stylus">
  .toolbar__title
    cursor pointer
</style>