// window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

const showdown = require('showdown');

try {
  window.$ = window.jQuery = require('jquery');
  require('bootstrap-sass');
  window.moment = require('moment');
  window.toMarkdown = require('to-markdown');
  window.converter = new showdown.Converter();
} catch (e) {
  console.log(e);
}

const VueSimplemde = require('vue-simplemde');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';