import api from './api'

export default {
  login (username, password, cb) {
    cb = arguments[arguments.length - 1]
    if (api.get('token')) {
      if (cb) cb(true)
      this.onChange(true)
      return
    }
    api.requestLogin(username, password, (res) => {
      if (res.authenticated) {
        api.set('token', res.token)
        api.set('refresh', res.refresh)
        if (cb) cb(true)
        this.onChange(true)
      } else {
        if (cb) cb(false)
        this.onChange(false)
      }
    })
  },

  getToken () {
    return api.get('token')
  },

  getRefreshToken () {
    return api.get('refresh')
  },

  loggedIn () {
    return !!api.get('token')
  },

  logout (cb) {
    delete api.remove('token')
    delete api.remove('refresh')
    if (cb) cb()
    this.onChange(false)
  },

  onChange () {}
}
