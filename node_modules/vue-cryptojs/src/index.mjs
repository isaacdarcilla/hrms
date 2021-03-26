/* eslint-disable */
import cryptojs from 'crypto-js'

const VueCryptojs = {
  install (Vue, options) {
    Vue.CryptoJS = cryptojs
    Object.defineProperties(Vue.prototype, {
      CryptoJS: { get() { return cryptojs } },
      $CryptoJS: { get() { return cryptojs } }
    })
    if (typeof window !== 'undefined' && window.Vue) {
      window.Vue.use(VueCryptojs)
    }
  }
}

export default VueCryptojs
