import { LOGIN_URL } from './config'

export default {
  login (username, password, cb) {
    cb = arguments[arguments.length - 1]
    if (localStorage.token) {
      if (cb) cb(true)
      this.onChange(true)
      return
    }
    loginRequest(username, password, (res) => {
      if (res.authenticated) {
        localStorage.token = res.token
        localStorage.refresh = res.refresh
        if (cb) cb(true)
        this.onChange(true)
      } else {
        if (cb) cb(false)
        this.onChange(false)
      }
    })
  },

  getToken () {
    return localStorage.token
  },

  getRefreshToken () {
    return loginRequest.refresh
  },

  loggedIn () {
    return !!localStorage.token
  },

  logout (cb) {
    delete localStorage.token
    if (cb) cb()
    this.onChange(false)
  },

  onChange () {}
}

function loginRequest (username, password, cb) {
  axios.post(LOGIN_URL, { username, password }).then(res => {
    if (res.status === 200) {
      cb({
        authenticated: true,
        token: res.data.access_token,
        refresh: res.data.refresh_token
      })
    } else {
      cb({ authenticated: false })
    }
  })
}
