<template lang="pug">
  v-toolbar(primary)
    v-toolbar-title
      div(v-html="title" v-on:click="goHome()")
    v-spacer
    v-toolbar-items(v-if="notOnLoginPage")
      v-menu(transition="v-slide-x-transition" bottom left)
        v-btn(primary light slot="activator" icon="icon")
          v-icon more_vert
        v-list
          v-list-item
            v-list-tile(v-if="notLoggedIn")
              v-list-tile-title(v-on:click="goToLogin()") Login
            v-list-tile(v-if="isGuidePage")
              v-list-tile-title(v-on:click.prevent="goToGuideEdit()") Edit Guide
            v-list-tile(v-if="isGuidePage")
              v-list-tile-title(v-on:click.prevent="goToGuideHistory()") History
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
      },
      notOnLoginPage() {
        return this.$route.name !== 'login';
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