window._ = require('lodash')

const showdown = require('showdown')

try {
  window.$ = window.jQuery = require('jquery')
  window.moment = require('moment')
  window.toMarkdown = require('to-markdown')
  window.converter = new showdown.Converter()
} catch (e) {
  console.log(e)
}

// const VueSimplemde = require('vue-simplemde')

window.axios = require('axios')

window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
