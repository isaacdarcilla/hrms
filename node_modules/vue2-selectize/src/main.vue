<template>
  <select>
    <slot/>
  </select>
</template>

<script>
import $ from 'jquery'
import equal from 'deep-equal'

if (!$().selectize) {
  require('selectize')
}

function clean (options) {
  return options
    .map(option => ({
      text: option.text,
      value: option.value
    }))
}

export default {
  props: {
    value: {
      default: ''
    },
    settings: {
      type: Object,
      default: () => ({})
    },
    disabled: {
      type: Boolean,
      default: false
    }
  },
  data () {
    return {
      options: [],
      createdOptions: []
    }
  },
  mounted () {
    var self = this
    if (this.settings.create) {
      const create = this.settings.create
      this.settings.create = function(input,callback) {
        let option = null
        if (create === true) {
          option = {
            text: input,
            value: input
          }
        }
        else {
          option = create(input, callback)
        }
        self.createdOptions.push(option)
        return option
      }
    }
    $(this.$el).selectize({
      onInitialize: () => {
        this.setValue()
      },
      onChange: value => {
        this.$emit('input', value)
      },
      ...this.settings
    })
    this.makeOptions(true)
    this.toggleDisabled(this.disabled)
  },
  destroyed () {
    if (this.$el.selectize) {
      this.$el.selectize.destroy()
    }
  },
  watch: {
    value (value, old) {
      if (!equal(value, old)) {
        this.setValue()
      }
    },
    disabled (value) {
      this.toggleDisabled(value)
    }
  },
  methods: {
    toggleDisabled (value) {
      if (value) {
        this.$el.selectize.disable()
      }
      else {
        this.$el.selectize.enable()
      }
    },
    makeOptions (justLocal = false) {
      const old = this.options
      let _new = []
      const nodes = this.$slots.default
      if (this.settings.options === undefined && nodes) {
        _new = nodes
          .filter(node => node.tag && node.tag.toLowerCase() === 'option')
          .map(node => {
            return {
              text: node.children ? node.children[0].text.trim() : null,
              value: node.data.domProps ? node.data.domProps.value : node.data.attrs.value
            }
          })
          .concat(this.createdOptions)
      }
      if (!equal(clean(old), clean(_new))) {
        this.options = _new
        if (!justLocal) {
          this.$el.selectize.clearOptions();
          const optionValues = this.options.map(o => o.value)
          Object.keys(this.$el.selectize.options)
            //IE11 fix, Object.values is not supported
            .map(key => this.$el.selectize.options[key])
            .filter(option => optionValues.every(v => !equal(v, option.value)))
            .forEach(option => this.$el.selectize.removeOption(option.value))
          this.$el.selectize.addOption(this.options)
          this.$el.selectize.refreshOptions(false)
          this.setValue()
        }
      }
    },
    setValue () {
      this.$el.selectize.setValue(this.value, true)
    }
  },
  beforeUpdate () {
    this.makeOptions()
  }
}
</script>
