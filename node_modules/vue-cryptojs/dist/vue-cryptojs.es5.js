"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _cryptoJs = _interopRequireDefault(require("crypto-js"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

/* eslint-disable */
var VueCryptojs = {
  install: function install(Vue, options) {
    Vue.CryptoJS = _cryptoJs["default"];
    Object.defineProperties(Vue.prototype, {
      CryptoJS: {
        get: function get() {
          return _cryptoJs["default"];
        }
      },
      $CryptoJS: {
        get: function get() {
          return _cryptoJs["default"];
        }
      }
    });

    if (typeof window !== 'undefined' && window.Vue) {
      window.Vue.use(VueCryptojs);
    }
  }
};
var _default = VueCryptojs;
exports["default"] = _default;