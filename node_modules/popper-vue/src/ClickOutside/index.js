import { canUseDOM } from '../utils'

const ClickOutside = {
  name: 'ClickOutside',
  props: {
    whitelist: Array,
    do: Function,
    isDisabled: Boolean
  },
  created () {
    if (!this.isDisabled) {
      const listener = (e, el) => {
        const whitelistContainsTarget = this.whitelist.reduce((_, whitelistElement) => {
          return whitelistElement && whitelistElement.contains(e.target);
        }, false);

        if (
          e.target === el ||
          el.contains(e.target) ||
          (this.whitelist.includes(e.target)) ||
          whitelistContainsTarget
        ) return
        if (this.do) this.do()
      }

      canUseDOM && document.addEventListener('click', (e) => listener(e, this.$el))

      this.$once('hook:beforeDestroy', () => {
        document.removeEventListener('click', (e) => listener(e, this.$el))
      })
    }
  },
  render () {
    return this.$slots.default[0]
  }
}

export default ClickOutside
