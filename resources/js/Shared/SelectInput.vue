<template>
  <div>
    <label v-if="label" class="form-label" :for="id">{{ label }}</label>
    <select :id="id" :disabled="disable" ref="input" v-model="selected" v-bind="$attrs" class="form-select" :class="{ error: 0 }">
      <slot />
    </select>
    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `select-input-${this._uid}`
      },
    },
    value: [String, Number, Boolean],
    label: String,
    error: String,
    disabled: Boolean,
  },
  data() {
    return {
      selected: this.value,
      disable: this.disabled,
    }
  },
  watch: {
    selected(selected) {
      this.$emit('input', selected)
    },
  },
  methods: {
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
  },
}
</script>
