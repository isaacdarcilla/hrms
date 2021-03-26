import Vue from 'vue'
import VueCryptojs from '../src/index.mjs'

Vue.use(VueCryptojs)

const test = new Vue({
  methods: {
    run() {
      Vue.CryptoJS.SHA256("Message").toString();
      this.CryptoJS.SHA256("Message").toString();
      this.$CryptoJS.SHA256("Message").toString();
    }
  }
})
test.run()