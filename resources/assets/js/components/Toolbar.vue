<template>
  <v-toolbar primary>
    <v-toolbar-title v-html="title" @click="goHome()"></v-toolbar-title>
    <v-toolbar-items @click="goToLogin()">
      <v-btn primary light>Login</v-btn>
    </v-toolbar-items>
  </v-toolbar>
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