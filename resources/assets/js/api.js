const getHeader = function () {
  return {
    'Accept': 'application/json',
    'Authorization': 'Bearer ' + localStorage.token
  }
}

export const fetchUser = function () {
  axios.get('/api/user', { headers: getHeader() }).then(res => {
    const user = { email: res.data.email, name: res.data.name }
    localStorage.authUser = JSON.stringify(user)
    return user
  })
}

export const requestLogin = function (username, password, cb) {
  axios.post('/oauth/token', { username, password }).then(res => {
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
