<template lang="pug">
  v-toolbar(primary)
    v-toolbar-title
      div(primary light v-html="title" v-on:click="goHome()")
    v-spacer
    v-toolbar-items
      div(v-if="isGuidePage" v-on:click.prevent="goToGuideEdit()")
        v-btn(primary light) Edit Guide
      div(v-if="isGuidePage" v-on:click.prevent="goToGuideHistory()")
        v-btn(primary light) History
      div(v-if="notLoggedIn" v-on:click="goToLogin()")
        v-btn(primary light) Login
</template>

<script>

  export default {
    props: ['title'],
    computed: {
      isGuidePage() {
        return this.$route.name === 'guide' && window.Laravel.user;
      },
      notLoggedIn() {
        return !window.Laravel.user && this.$route.name !== 'login';
      }
    },
    methods: {
      goToLogin() {
        this.$router.push('/login')
      },
      goHome() {
        this.$router.push('/')
      },
      goToGuideEdit(){
        this.$router.push({ name: 'guide-edit' })
      },
      goToGuideHistory() {
        this.$router.push({ name: 'guide-history' })
      }
    }
  }
</script>

<style lang="stylus">
  .toolbar__title
    cursor pointer
</style>