# vue2-selectize

A [Selectize](http://selectize.github.io/selectize.js/) wrapper for VueJS 2.

## Prerequisites
* jQuery >= 1.7.0

## Installation

```js
npm install --save jquery vue2-selectize
```

## Usage

```html
<selectize v-model="selected" :settings="settings"> <!-- settings is optional -->
  <option :value="1">One</option>
  <option :value="2">Two</option>
</selectize>
```
```js
import Selectize from 'vue2-selectize'

export default {
  components: {
    Selectize
  },
  data() {
    return {
      settings: {}, // https://github.com/selectize/selectize.js/blob/master/docs/usage.md
      selected: 1
    }
  }
}
```
```scss
// Include your preferred theme in your main SASS file (or your component's <style lang="scss"/> section).

@import "~selectize/dist/css/selectize.bootstrap3.css";
```