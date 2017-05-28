<template lang="pug">
  #login-page
    toolbar(title="<i class='material-icons icon icon--light'>arrow_back</i> HOME")
    v-container
      v-layout(row)
        v-flex(md8 xs12 offset-md2)
          v-card
            v-card-row.grey.darken-4
              v-card-title
                span.white--text Login
            v-card-text
              v-layout.pt-3(row wrap column)
                v-flex(md8 offset-md2)
                  v-text-field(name="Email"
                  label="Email Address"
                  v-model="username")
                v-flex(md8 offset-md2)
                  v-text-field(name="Password"
                  label="Password"
                  type="password"
                  v-model="password")
                v-flex(md8 offset-md2 v-on:click.prevent="login()")
                  v-btn.grey.darken-4.white--text(block) Login
</template>

<script>
  import auth from '../auth'
  import { mapActions } from 'vuex'
  import Toolbar from '../components/Toolbar.vue'

  export default {
    components: {
      Toolbar
    },
    data () {
      return {
        username: 'sauer.angel@example.com',
        password: 'secret'
      }
    },
    methods: {
      ...mapActions([
        'setUser'
      ]),
      login () {
        auth.login(this.username, this.password, loggedIn => {
          if (!loggedIn) {
            // handle error display
          } else {
            this.setUser()
            this.gotoUrl('dashboard')
          }
        })
      },
      gotoUrl (name) {
        if (!this.$route.query.length) {
          this.$router.push({ name })
        } else {
          this.$router.replace(this.$route.query.redirect || '/')
        }
      }
    }
  }
</script>
