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
//      login () {
//        const authUser = {}
//        window.axios.post(LOGIN_URL, this.credentials)
//            .then(response => {
//              if (response.status === 200) {
//                authUser.access_token = response.data.access_token
//                authUser.refresh_token = response.data.refresh_token
//                localStorage.setItem('authUser', JSON.stringify(authUser))
//                window.axios.get(USER_URL, {headers: getHeader()})
//                    .then(response => {
//                      authUser.email = response.data.email
//                      authUser.name = response.data.name
//                      localStorage.setItem('authUser', JSON.stringify(authUser))
//                    })
//              }
//              this.$router.push({name: 'dashboard'})
//            }).catch(err => console.log(err))
//      }
      login () {
        auth.login(this.username, this.password, loggedIn => {
          if (!loggedIn) {
            this.error = true
          } else {
            this.$router.replace(this.$route.query.redirect || '/')
          }
        })
      }
    }
  }
</script>
