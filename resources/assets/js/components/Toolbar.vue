<template>
  <v-toolbar class="grey darken-4">
    <v-toolbar-title>{{ title }}</v-toolbar-title>
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
      }
    }
  }
</script>

<style lang="stylus">

</style>