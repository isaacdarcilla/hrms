(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports, require('vue'), require('lodash.get')) :
    typeof define === 'function' && define.amd ? define(['exports', 'vue', 'lodash.get'], factory) :
    (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.TDropdown = {}, global.Vue, global.get));
}(this, (function (exports, Vue, get) { 'use strict';

    function _interopDefaultLegacy (e) { return e && typeof e === 'object' && 'default' in e ? e : { 'default': e }; }

    var Vue__default = /*#__PURE__*/_interopDefaultLegacy(Vue);
    var get__default = /*#__PURE__*/_interopDefaultLegacy(get);

    const mergeClasses = (classesA, classesB) => {
        let a = classesA;
        let b = classesB;
        // Convert array of string classes to a single string
        if (Array.isArray(classesA) && classesA.every((className) => typeof className === 'string' || !!className)) {
            a = classesA.filter((className) => !!className).join(' ');
        }
        // Convert array of string classes to a single string
        if (Array.isArray(classesB) && classesB.every((className) => typeof className === 'string' || !!className)) {
            b = classesB.filter((className) => !!className).join(' ');
        }
        if (typeof a === 'string' && typeof b === 'string') {
            return `${a} ${b}`;
        }
        if (typeof a === 'string' && Array.isArray(b)) {
            return [a].concat(b);
        }
        if (typeof b === 'string' && Array.isArray(a)) {
            return a.concat([b]);
        }
        if (Array.isArray(a) && Array.isArray(b)) {
            return a.concat(b);
        }
        return [a, b];
    };
    const Component = Vue__default['default'].extend({
        props: {
            classes: {
                type: [String, Array, Object],
                default: undefined,
            },
            fixedClasses: {
                type: [String, Array, Object],
                default: undefined,
            },
            variants: {
                type: Object,
                default: undefined,
            },
            variant: {
                type: [String, Object],
                default: undefined,
            },
        },
        computed: {
            componentClass() {
                return this.getElementCssClass();
            },
            activeVariant() {
                if (!this.variant) {
                    return undefined;
                }
                if (typeof this.variant === 'object') {
                    const truthyVariant = Object.keys(this.variant).find((variant) => !!this.variant[variant]);
                    return truthyVariant || undefined;
                }
                return this.variant;
            },
        },
        methods: {
            getElementCssClass(elementName, defaultClasses = '') {
                let classes;
                if (elementName) {
                    if (this.activeVariant) {
                        const elementVariant = get__default['default'](this.variants, `${this.activeVariant}.${elementName}`);
                        // If the variant exists but not for the element fallback to the default
                        if (elementVariant === undefined
                            && get__default['default'](this.variants, this.activeVariant) !== undefined) {
                            classes = get__default['default'](this.classes, elementName, defaultClasses);
                        }
                        else {
                            classes = elementVariant === undefined ? defaultClasses : elementVariant;
                        }
                    }
                    else {
                        classes = get__default['default'](this.classes, elementName, defaultClasses);
                    }
                    const fixedClasses = get__default['default'](this.fixedClasses, elementName);
                    if (fixedClasses) {
                        return mergeClasses(fixedClasses, classes);
                    }
                    return classes;
                }
                if (this.activeVariant) {
                    classes = get__default['default'](this.variants, this.activeVariant, defaultClasses);
                }
                else {
                    classes = this.classes === undefined ? defaultClasses : this.classes;
                }
                if (this.fixedClasses) {
                    return mergeClasses(this.fixedClasses, classes);
                }
                return classes;
            },
        },
    });

    /* eslint-disable no-shadow */
    var Key;
    (function (Key) {
        Key[Key["LEFT"] = 37] = "LEFT";
        Key[Key["UP"] = 38] = "UP";
        Key[Key["RIGHT"] = 39] = "RIGHT";
        Key[Key["DOWN"] = 40] = "DOWN";
        Key[Key["ENTER"] = 13] = "ENTER";
        Key[Key["ESC"] = 27] = "ESC";
        Key[Key["SPACE"] = 32] = "SPACE";
        Key[Key["BACKSPACE"] = 8] = "BACKSPACE";
    })(Key || (Key = {}));
    var Key$1 = Key;

    const TDropdown = Component.extend({
        name: 'TDropdown',
        props: {
            text: {
                type: String,
                default: '',
            },
            disabled: {
                type: Boolean,
                default: undefined,
            },
            tagName: {
                type: String,
                default: 'div',
            },
            dropdownWrapperTagName: {
                type: String,
                default: 'div',
            },
            dropdownTagName: {
                type: String,
                default: 'div',
            },
            toggleOnFocus: {
                type: Boolean,
                default: false,
            },
            toggleOnClick: {
                type: Boolean,
                default: true,
            },
            toggleOnHover: {
                type: Boolean,
                default: false,
            },
            hideOnLeaveTimeout: {
                type: Number,
                default: 250,
            },
            show: {
                type: Boolean,
                default: false,
            },
            classes: {
                type: Object,
                default() {
                    return {
                        button: 'block px-4 py-2 text-white transition duration-100 ease-in-out bg-blue-500 border border-transparent rounded shadow-sm hover:bg-blue-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50 disabled:opacity-50 disabled:cursor-not-allowed',
                        wrapper: 'inline-flex flex-col',
                        dropdownWrapper: 'relative z-10',
                        dropdown: 'origin-top-left absolute left-0 w-56 rounded shadow bg-white mt-1',
                        enterClass: '',
                        enterActiveClass: 'transition ease-out duration-100 transform opacity-0 scale-95',
                        enterToClass: 'transform opacity-100 scale-100',
                        leaveClass: 'transition ease-in transform opacity-100 scale-100',
                        leaveActiveClass: '',
                        leaveToClass: 'transform opacity-0 scale-95 duration-75',
                    };
                },
            },
        },
        data() {
            return {
                localShow: this.show,
                hasFocus: false,
                hideOnLeaveTimeoutHolder: null,
            };
        },
        render(createElement) {
            const renderFun = this.render;
            return renderFun(createElement);
        },
        watch: {
            show(show) {
                this.localShow = show;
            },
            localShow(localShow) {
                this.$emit('update:show', localShow);
                if (localShow) {
                    this.$emit('shown');
                }
                else {
                    this.$emit('hidden');
                }
            },
        },
        methods: {
            render(createElement) {
                const defaultSlot = this.$scopedSlots.default
                    ? this.$scopedSlots.default({
                        hide: this.doHide,
                        show: this.doShow,
                        toggle: this.doToggle,
                        blurHandler: this.blurHandler,
                    }) : null;
                const triggerSlot = this.$scopedSlots.trigger
                    ? this.$scopedSlots.trigger({
                        isShown: this.localShow,
                        hide: this.doHide,
                        hideIfFocusOutside: this.hideIfFocusOutside,
                        show: this.doShow,
                        toggle: this.doToggle,
                        mousedownHandler: this.mousedownHandler,
                        focusHandler: this.focusHandler,
                        blurHandler: this.blurHandler,
                        keydownHandler: this.keydownHandler,
                        disabled: this.disabled,
                    }) : createElement('button', {
                    ref: 'button',
                    attrs: {
                        type: 'button',
                        disabled: this.disabled,
                    },
                    class: this.getElementCssClass('button'),
                    on: {
                        keydown: this.keydownHandler,
                        mousedown: this.mousedownHandler,
                        focus: this.focusHandler,
                        blur: this.blurHandler,
                    },
                }, this.$slots.button || this.text);
                const subElements = [
                    triggerSlot,
                    createElement('transition', {
                        props: {
                            enterClass: this.getElementCssClass('enterClass'),
                            enterActiveClass: this.getElementCssClass('enterActiveClass'),
                            enterToClass: this.getElementCssClass('enterToClass'),
                            leaveClass: this.getElementCssClass('leaveClass'),
                            leaveActiveClass: this.getElementCssClass('leaveActiveClass'),
                            leaveToClass: this.getElementCssClass('leaveToClass'),
                        },
                    }, this.localShow ? [
                        createElement(this.dropdownWrapperTagName, {
                            ref: 'dropdownWrapper',
                            class: this.getElementCssClass('dropdownWrapper'),
                            attrs: {
                                tabindex: -1,
                            },
                            on: {
                                focus: this.focusHandler,
                                blur: this.blurHandler,
                            },
                        }, [
                            createElement(this.dropdownTagName, {
                                ref: 'dropdown',
                                class: this.getElementCssClass('dropdown'),
                            }, defaultSlot),
                        ]),
                    ] : undefined),
                ];
                return createElement(this.tagName, {
                    ref: 'wrapper',
                    class: this.getElementCssClass('wrapper'),
                    on: {
                        mouseover: this.mouseoverHandler,
                        mouseleave: this.mouseleaveHandler,
                    },
                }, subElements);
            },
            blurEventTargetIsChild(e) {
                const blurredElement = e.relatedTarget;
                if (blurredElement) {
                    const wrapper = this.$refs.wrapper;
                    return wrapper.contains(blurredElement);
                }
                return false;
            },
            focusEventTargetIsChild(e) {
                const focusedElement = e.target;
                if (focusedElement) {
                    const wrapper = this.$refs.wrapper;
                    return wrapper.contains(focusedElement);
                }
                return false;
            },
            escapeHandler() {
                this.doHide();
            },
            mousedownHandler() {
                if (this.toggleOnClick) {
                    this.doToggle();
                }
            },
            focusHandler(e) {
                if (!this.hasFocus && this.focusEventTargetIsChild(e)) {
                    this.hasFocus = true;
                    this.$emit('focus', e);
                }
                if (this.toggleOnFocus) {
                    this.doShow();
                }
            },
            blurHandler(e) {
                if (this.hasFocus && !this.blurEventTargetIsChild(e)) {
                    this.hasFocus = false;
                    this.$emit('blur', e);
                }
                if (this.toggleOnFocus || this.toggleOnClick) {
                    this.hideIfFocusOutside(e);
                }
            },
            keydownHandler(e) {
                if ([Key$1.ENTER, Key$1.SPACE].includes(e.keyCode)) {
                    this.mousedownHandler();
                }
                else if (e.keyCode === Key$1.ESC) {
                    this.escapeHandler();
                }
                this.$emit('keydown', e);
            },
            mouseleaveHandler() {
                if (!this.toggleOnHover) {
                    return;
                }
                if (!this.hideOnLeaveTimeout) {
                    this.doHide();
                    return;
                }
                this.hideOnLeaveTimeoutHolder = setTimeout(() => {
                    this.doHide();
                    this.hideOnLeaveTimeoutHolder = null;
                }, this.hideOnLeaveTimeout);
            },
            mouseoverHandler() {
                if (!this.toggleOnHover) {
                    return;
                }
                if (this.hideOnLeaveTimeout && this.hideOnLeaveTimeoutHolder) {
                    clearTimeout(this.hideOnLeaveTimeoutHolder);
                    this.hideOnLeaveTimeoutHolder = null;
                }
                this.doShow();
            },
            doHide() {
                this.localShow = false;
            },
            hideIfFocusOutside(e) {
                if (!(e instanceof Event)) {
                    throw new Error('the method hideIfFocusOutside expects an instance of `Event` as parameter');
                }
                if (!this.blurEventTargetIsChild(e)) {
                    this.doHide();
                }
            },
            doShow() {
                this.localShow = true;
            },
            doToggle() {
                if (this.localShow) {
                    this.doHide();
                }
                else {
                    this.doShow();
                }
            },
            blur() {
                const el = this.$refs.button;
                el.blur();
            },
            focus(options) {
                const el = this.$refs.button;
                el.focus(options);
            },
        },
    });

    exports.default = TDropdown;

    Object.defineProperty(exports, '__esModule', { value: true });

})));
//# sourceMappingURL=t-dropdown.js.map
