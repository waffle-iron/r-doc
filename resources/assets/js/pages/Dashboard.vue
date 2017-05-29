<template lang="pug">
  v-app
    v-navigation-drawer(persistent light v-model="drawer")
      v-list.pa-0
        v-list-item
          v-list-tile(avatar tag="div")
            v-list-tile-avatar
              img(src="https://randomuser.me/api/portraits/men/85.jpg")
            v-list-tile-content
              v-list-tile-title John Leider
            v-list-tile-action
      v-list.pt-0(dense)
        v-divider
        v-list-item(@click.prevent="goHome()")
          v-list-tile
            v-list-tile-action
              v-icon dashboard
            v-list-tile-content
              v-list-tile-title Home
        v-list-item(@click.prevent="logout()")
          v-list-tile
            v-list-tile-action
              v-icon exit_to_app
            v-list-tile-content
              v-list-tile-title Logout
    v-toolbar(primary fixed)
      v-toolbar-side-icon(light @click.native.stop="drawer = !drawer")
      v-toolbar-title Toolbar
    main
      v-container(fluid)
        .title Click on sidebar to re-open
        //v-router
</template>

<script>
  import { mapActions } from 'vuex'

  export default {
    data () {
      return {
        drawer: true,
        items: [
          { title: 'Home', icon: 'dashboard' },
          { title: 'About', icon: 'question_answer' },
          { title: 'Logout', icon: 'exit_to_app' }
        ],
        right: null
      }
    },
    methods: {
      ...mapActions([
        'removeUser'
      ]),
      logout () {
        this.removeUser()
        this.$router.push('/logout')
      },
      goHome () {
        this.$router.push({ name: 'home' })
      }
    }
  }
</script>
