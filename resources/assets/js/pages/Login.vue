<template lang="pug">
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
                v-text-field.input-group--focused(name="Email"
                label="Email Address"
                    :value="email")
              v-flex(md8 offset-md2)
                v-text-field.input-group--focused(name="Password"
                label="Password"
                type="password"
                    :value="password")
              v-flex(md8 offset-md2 v-on:click.prevent="login()")
                v-btn.grey.darken-4.white--text(block) Login
</template>

<script>
  export default {
    data () {
      return {
        email: 'michaela.morar@example.com',
        password: 'secret'
      }
    },
    methods: {
      login () {
        axios.post('http://r-doc.dev/login', {
          email: this.email,
          password: this.password
        }).then(response => {
          window.location = response.responseURL;
        })
      },
      test() {
        console.log('fired')
      }
    }
  }
</script>