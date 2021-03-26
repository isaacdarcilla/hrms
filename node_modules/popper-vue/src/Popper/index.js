import PopperJS from 'popper.js'
import ClickOutside from '../ClickOutside'
import './popper-vue.styles.scss'
import { createChainedFunction, useId, canUseDOM, isVueComponent, HTMLElement } from '../utils'

const PopperArrow = {
  name: 'PopperArrow',
  render (h) {
    return h('div', {
      style: {
        background: 'inherit'
      },
      attrs: {
        'x-arrow': true,
        role: 'presentation'
      }
    })
  }
}

const Popper = {
  name: 'Popper',
  props: {
    isOpen: Boolean,
    placement: {
      type: String,
      default: 'bottom'
    },
    usePortal: {
      type: Boolean,
      default: false
    },
    onClose: {
      type: Function,
      default: () => null
    },
    closeOnClickAway: {
      type: Boolean,
      default: true
    },
    modifiers: {
      type: Object,
      default: () => {}
    },
    anchorEl: [HTMLElement, Object],
    eventsEnabled: {
      type: Boolean,
      default: true
    },
    positionFixed: Boolean,
    hasArrow: {
      type: Boolean,
      default: true
    },
    usePortalTarget: String
  },
  data () {
    return {
      popper: null
    }
  },
  computed: {
    portalTarget () {
      return this.usePortalTarget || `#popper-vue-portal-${useId(4)}`
    },
    reference () {
      const ref = this.usePortal
        // There should be a much cleaner way to do this.
        // But for now this works. Should return with bigger guns.
        ? canUseDOM && document.querySelector(this.portalTarget).firstChild
        : this.getNode(this.$el.firstChild)
      return ref
    }
  },
  watch: {
    placement (newValue) {
      if (this.popper) {
        this.popper.options.placement = newValue
        this.popper.scheduleUpdate()
      }
    },
    isOpen (newValue) {
      if (newValue) this.handlerPopperOpen()
      else this.handlePopperClose()
    }
  },
  methods: {
    /**
     * Handles open state for Popper
     */
    handlerPopperOpen () {
      // Double check to make sure portal target is mounted
      // If it already is mounted, Portal component will use
      // the existing portal target to mount popper children
      (this.usePortal && this.$refs.portalRef) && this.$refs.portalRef.mountTarget()
      if (!this.anchorEl || !this.reference) return
      this.popper = new PopperJS(this.anchorEl, this.reference, {
        placement: this.placement,
        modifiers: {
          ...(this.usePortal && {
            preventOverflow: {
              boundariesElement: 'window'
            }
          }),
          ...this.modifiers
        },
        onUpdate: createChainedFunction(
          this.handlePopperUpdate
        ),
        onCreate: createChainedFunction(
          this.handlePopperCreated
        ),
        eventsEnabled: this.eventsEnabled,
        positionFixed: this.positionFixed
      })
      this.popper.scheduleUpdate()
    },
    /**
     * Closes Popper Element
     */
    handlePopperClose () {
      if (this.popper) {
        this.popper.destroy()
        this.popper = null
        this.$emit('popper:close', {})
      }
    },
    /**
     * Returns the HTML element of a Vue component or native element
     * @param {Vue.Component|HTMLElement} element HTMLElement or Vue Component
     */
    getNode (element) {
      const isVue = isVueComponent(element)
      return isVue ? element.$el : element
    },
    /**
     * Wrapped handler for close events
     */
    wrapClose () {
      if (this.popper) {
        if (this.onClose) this.onClose()
        this.$emit('popper:close', {})
      }
    },
    /**
     * Handle's popper updates when update is called
     * @param {Object} payload
     */
    handlePopperUpdate (payload) {
      this.$emit('popper:update', payload)
    },
    /**
     * Handle's popper updates when update is called
     * @param {Object} payload
     */
    handlePopperCreated (payload) {
      this.$emit('popper:create', payload)
    },
    /**
     * Binds Arrow class to VNode data before rendering
     * @param {Vue.VNode} node
     * @returns {Vue.VNode}
     */
    bindArrowClass (node) {
      if (node[0].data['staticClass']) node[0].data['staticClass'] += ' popper-vue'
      else node[0].data['staticClass'] = 'popper-vue'
      return node
    }
  },
  render (h) {
    const children = this.$slots.default
    if (children.length > 1) {
      // eslint-disable-next-line
        return console.error(`[PopperVue]: The <Popper> component expects only one child element at it's root. You passed ${children.length} child nodes.`)
    }

    /**
       * Add arrow element to children list if hasArrow props is to be shown
       */
    if (this.hasArrow && this.isOpen) {
      children[0].children.push(h(PopperArrow))
      this.bindArrowClass(children, h)
    }

    return h('div', {
      style: {
        display: this.isOpen ? 'unset' : 'none'
      }
    }, [h(ClickOutside, {
      props: {
        whitelist: [this.anchorEl],
        active: this.closeOnClickAway,
        do: this.wrapClose
      }
    }, children)])
  }
}

export {
  Popper,
  PopperArrow
}
