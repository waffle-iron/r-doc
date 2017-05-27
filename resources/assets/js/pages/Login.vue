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
              v-layout.pt-3(row wrap)
                v-flex(md8 offset-md2)
                  v-text-field(name="Email"
                  label="Email Address"
                  v-model="email")
                v-flex(md8 offset-md2)
                  v-text-field(name="Password"
                  label="Password"
                  type="password"
                  v-model="password")
                v-flex(md8 offset-md2 v-on:click.prevent="login()")
                  v-btn.grey.darken-4.white--text(block) Login
</template>

<script>
  import {LOGIN_URL, USER_URL, getHeader} from '../config'
  import {CLIENT_ID, CLIENT_SECRET} from '../env'
  import Toolbar from '../components/Toolbar.vue'

  export default {
    components: {
      Toolbar
    },
    data () {
      return {
        email: 'sauer.angel@example.com',
        password: 'secret'
      }
    },
    methods: {
      login () {
        const postData = {
          grant_type: 'password',
          client_id: CLIENT_ID,
          client_secret: CLIENT_SECRET,
          username: this.email,
          password: this.password,
          scope: ''
        };
        const authUser = {};
        axios.post(LOGIN_URL, postData)
            .then(response => {
              if (response.status === 200) {
                authUser.access_token = response.data.access_token;
                authUser.refresh_token = response.data.refresh_token;
                localStorage.setItem('authUser', JSON.stringify(authUser));
                axios.get(USER_URL, {headers: getHeader()})
                    .then(response => {
                      authUser.email = response.data.email;
                      authUser.name = response.data.name;
                      localStorage.setItem('authUser', JSON.stringify(authUser));
                    });
              }
              this.$router.push({name: 'dashboard'})
            })
      }
    }
  }
</script>