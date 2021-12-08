/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************!*\
  !*** ./resources/js/functions.js ***!
  \***********************************/
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function fetchSearchForm(form, url, message, token) {
  f.addEventListener('submit', function (event) {
    event.preventDefault();
    var formData = new FormData(form);
    var fetchData = {
      method: 'post',
      body: formData,
      headers: {
        "Accept": "application/json"
      }
    };
    fetch(url, fetchData).then(function (response) {
      return response.json();
    }).then(function (json) {
      message.innerHTML = '';

      var _iterator = _createForOfIteratorHelper(json),
          _step;

      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var obj = _step.value;
          var route = void 0;
          var id = obj['id'];
          var name = obj['name'];

          if (obj['location_name']) {
            route = '/restaurant/';
          } else {
            route = '/product/getOne/';
          }

          message.innerHTML += '<div class="search-list__item"><a href="' + route + id + '">' + name + '</a></div>';
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }
    });
  });
}

function fetchSearchInput(input, url, mes) {
  input.addEventListener('input', function () {
    var name = input.value;
    var formData = new FormData();
    formData.append('text', name);
    formData.append('_token', token);

    if (name.length > 0) {
      fetch(url, {
        method: 'post',
        body: formData,
        headers: {
          "Accept": "application/json"
        }
      }).then(function (response) {
        return response.json();
      }).then(function (json) {
        mes.innerHTML = '';

        var _iterator2 = _createForOfIteratorHelper(json),
            _step2;

        try {
          for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
            var obj = _step2.value;
            var route = void 0;
            var id = obj['id'];
            var _name = obj['name'];

            if (obj['location_name']) {
              route = '/restaurant/';
            } else {
              route = '/product/getOne/';
            }

            mes.innerHTML += '<div class="search-list__item"><a href="' + route + id + '">' + _name + '</a></div>';
          }
        } catch (err) {
          _iterator2.e(err);
        } finally {
          _iterator2.f();
        }
      });
    } else {
      mes.innerHTML = '';
    }
  });
}

function fetchSendForm(form, url, message) {
  var text = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : '';
  form.addEventListener('submit', function (event) {
    event.preventDefault();
    var formData = new FormData(form);
    var fetchData = {
      method: 'POST',
      body: formData,
      headers: {
        "Accept": "application/json"
      }
    };
    fetch(url, fetchData).then(function (response) {
      if (!response.ok) {
        response.json().then(function (result) {
          var errors = result.error;
          message.classList.add('alert');
          message.classList.add('alert-danger');
          message.innerHTML = errors;
        });
      } else {
        message.innerHTML = '';
        message.classList.remove('alert');
        message.classList.remove('alert-danger');
        var messageText = document.querySelector('.message-block__text');
        messageText.parentNode.classList.add('alert-success');
        messageText.parentNode.parentNode.classList.remove('hidden');
        messageText.innerHTML = text;
      }
    });
  });
}
/******/ })()
;