# vue-cryptojs
A small wrapper for integrating crypto-js into VueJS

## How to install:
```bash
npm install vue-cryptojs
```

And in your entry file:
```js
import Vue from 'vue'
import VueCryptojs from 'vue-cryptojs'

Vue.use(VueCryptojs)
```
## Usage:
This wrapper bind `CryptoJS` to `Vue` or `this` if you're using single file component.

Simple AES text encrypt/decrypt example:
```js
const encryptedText = this.CryptoJS.AES.encrypt("Hi There!", "Secret Passphrase").toString()
const decryptedText = this.CryptoJS.AES.decrypt(encryptedText, "Secret Passphrase").toString(this.CryptoJS.enc.Utf8)
```

Also `crypto-js` is available as:
```js
Vue.CryptoJS
this.CryptoJS
this.$CryptoJS
```

Please kindly check full documention of [crypto-js](https://github.com/brix/crypto-js)
