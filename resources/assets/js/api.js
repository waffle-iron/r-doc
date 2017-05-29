const NS = 'RDOC-'

export default {
  getHeader () {
    return {
      'Accept': 'application/json',
      'Authorization': 'Bearer ' + this.get('token')
    }
  },

  saveUser () {
    return axios.get('/api/user', { headers: this.getHeader() })
  },

  requestLogin (username, password, cb) {
    axios.post('/api/auth/token', { username, password }).then(res => {
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
  },

  fetch (url) {
    return axios.get(url, { headers: this.getHeader() })
  },

  set (key, data) { localStorage.setItem(NS + key, JSON.stringify(data)) },

  get (key) { return JSON.parse(localStorage.getItem(NS + key)) },

  remove (key) { localStorage.removeItem(NS + key) }
}
