webpackJsonp([3],{

/***/ "./resources/assets/js/auth.js":
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(__webpack_provided_window_dot_jQuery, $) {window._ = __webpack_require__("./node_modules/lodash/lodash.js");

try {
  window.$ = __webpack_provided_window_dot_jQuery = __webpack_require__("./node_modules/jquery/dist/jquery.js");

  // Bootstrap Sass
  __webpack_require__(!(function webpackMissingModule() { var e = new Error("Cannot find module \"bootstrap-sass\""); e.code = 'MODULE_NOT_FOUND'; throw e; }()));

  // iCheck
  __webpack_require__(!(function webpackMissingModule() { var e = new Error("Cannot find module \"icheck\""); e.code = 'MODULE_NOT_FOUND'; throw e; }()));
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = __webpack_require__("./node_modules/axios/index.js");

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

var token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key',
//     cluster: 'mt1',
//     encrypted: true
// });

$(document).ready(function () {
  $('.i-checks').iCheck({
    checkboxClass: 'icheckbox_square-green',
    radioClass: 'iradio_square-green'
  });
});
/* WEBPACK VAR INJECTION */}.call(exports, __webpack_require__("./node_modules/jquery/dist/jquery.js"), __webpack_require__("./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ 2:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/auth.js");


/***/ })

},[2]);