import { requestLogin } from './api'

export default {
  login (username, password, cb) {
    cb = arguments[arguments.length - 1]
    if (localStorage.token) {
      if (cb) cb(true)
      this.onChange(true)
      return
    }
    requestLogin(username, password, (res) => {
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
    return localStorage.refresh
  },

  loggedIn () {
    return !!localStorage.token
  },

  logout (cb) {
    delete localStorage.token
    delete localStorage.refresh
    if (cb) cb()
    this.onChange(false)
  },

  onChange () {}
}
