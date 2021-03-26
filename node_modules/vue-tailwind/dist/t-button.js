(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports, require('vue'), require('lodash.get')) :
    typeof define === 'function' && define.amd ? define(['exports', 'vue', 'lodash.get'], factory) :
    (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.TButton = {}, global.Vue, global.get));
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

    const HtmlInput = Component.extend({
        props: {
            id: {
                type: String,
                default: undefined,
            },
            name: {
                type: String,
                default: undefined,
            },
            disabled: {
                type: Boolean,
                default: undefined,
            },
            readonly: {
                type: Boolean,
                default: undefined,
            },
            autofocus: {
                type: Boolean,
                default: undefined,
            },
            required: {
                type: Boolean,
                default: undefined,
            },
            tabindex: {
                type: [String, Number],
                default: undefined,
            },
        },
        methods: {
            getListeners(listeners) {
                return Object.assign(Object.assign({}, this.$listeners), listeners);
            },
        },
    });

    const TButton = HtmlInput.extend({
        name: 'TButton',
        props: {
            value: {
                type: [String, Number],
                default: null,
            },
            text: {
                type: String,
                default: undefined,
            },
            tagName: {
                type: String,
                default: 'button',
                validator(value) {
                    return ['button', 'a'].indexOf(value) !== -1;
                },
            },
            type: {
                type: String,
                default: undefined,
            },
            href: {
                type: String,
                default: null,
            },
            to: {
                type: [String, Object],
                default: undefined,
            },
            append: {
                type: Boolean,
                default: false,
            },
            activeClass: {
                type: String,
                default: 'router-link-active',
            },
            exact: {
                type: Boolean,
                default: false,
            },
            exactActiveClass: {
                type: String,
                default: 'router-link-exact-active',
            },
            event: {
                type: [String, Array],
                default: 'click',
            },
            data: {
                type: Object,
                default: () => ({}),
            },
            method: {
                type: String,
                default: 'get',
            },
            replace: {
                type: Boolean,
                default: false,
            },
            preserveScroll: {
                type: Boolean,
                default: false,
            },
            preserveState: {
                type: Boolean,
                default: false,
            },
            only: {
                type: Array,
                default: () => [],
            },
            native: {
                type: Boolean,
                default: false,
            },
            classes: {
                type: [String, Array, Object],
                default: 'block px-4 py-2 text-white transition duration-100 ease-in-out bg-blue-500 border border-transparent rounded shadow-sm hover:bg-blue-600 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50  disabled:opacity-50 disabled:cursor-not-allowed',
            },
        },
        computed: {
            isInertiaLinkComponentAvailable() {
                return !!(this.$options.components
                    && this.$options.components.InertiaLink);
            },
            isRouterLinkComponentAvailable() {
                return !!(this.$options.components
                    && (this.$options.components.RouterLink || this.$options.components.NuxtLink));
            },
            /**
             * If we have the `to` defined and the routerLink or Nuxt link component is
             * available we can use it to create a router link
             *
             * @return {Boolean}
             */
            isARouterLink() {
                return this.to !== undefined
                    && this.isRouterLinkComponentAvailable
                    && !this.native;
            },
            /**
             * If we have the `href` defined and the InertiaLink component is available
             * we can use it to create an inertia link
             *
             * @return {Boolean}
             */
            isAnIntertiaLink() {
                return this.href !== null
                    && this.tagName === 'a'
                    && this.isInertiaLinkComponentAvailable
                    && !this.native;
            },
            /**
             * The component to render according to the props
             * @return {String}
             */
            componentToRender() {
                var _a;
                if (this.isARouterLink && this.$options.components) {
                    return this.$options.components.NuxtLink || this.$options.components.RouterLink;
                }
                if (this.isAnIntertiaLink) {
                    return (_a = this.$options.components) === null || _a === void 0 ? void 0 : _a.InertiaLink;
                }
                if (this.href) {
                    return 'a';
                }
                return this.tagName;
            },
        },
        render(createElement) {
            const renderFun = this.render;
            return renderFun(createElement);
        },
        methods: {
            blurHandler(e) {
                this.$emit('blur', e);
            },
            focusHandler(e) {
                this.$emit('focus', e);
            },
            clickHandler(e) {
                this.$emit('click', e);
            },
            keydownHandler(e) {
                this.$emit('keydown', e);
            },
            mousedownHandler(e) {
                this.$emit('mousedown', e);
            },
            blur() {
                this.$el.blur();
            },
            focus() {
                this.$el.focus();
            },
            inertiaLinkAttributes() {
                return {
                    data: this.data,
                    href: this.href,
                    method: this.method,
                    replace: this.replace,
                    preserveScroll: this.preserveScroll,
                    preserveState: this.preserveState,
                    only: this.only,
                    id: this.id,
                    value: this.value,
                    autofocus: this.autofocus,
                    disabled: this.disabled,
                    name: this.name,
                    type: this.type,
                };
            },
            routerLinkAttributes() {
                return {
                    to: this.to,
                    replace: this.replace,
                    append: this.append,
                    tag: this.tagName,
                    activeClass: this.activeClass,
                    exact: this.exact,
                    event: this.event,
                    exactActiveClass: this.exactActiveClass,
                    id: this.id,
                    value: this.value,
                    autofocus: this.autofocus,
                    disabled: this.disabled,
                    name: this.name,
                    type: this.type,
                };
            },
            /**
             * Attrs according to the button type
             * @return {Object}
             */
            getAttributes() {
                if (this.isAnIntertiaLink) {
                    return this.inertiaLinkAttributes();
                }
                if (this.isARouterLink) {
                    return this.routerLinkAttributes();
                }
                return {
                    id: this.id,
                    value: this.value,
                    autofocus: this.autofocus,
                    disabled: this.disabled,
                    name: this.name,
                    href: this.href,
                    type: this.type,
                };
            },
            render(createElement) {
                return createElement(this.componentToRender, {
                    attrs: this.getAttributes(),
                    class: this.componentClass,
                    on: this.getListeners({
                        click: this.clickHandler,
                        focus: this.focusHandler,
                        blur: this.blurHandler,
                        keydown: this.keydownHandler,
                        mousedown: this.mousedownHandler,
                    }),
                }, this.text === undefined ? this.$slots.default : this.text);
            },
        },
    });

    exports.default = TButton;

    Object.defineProperty(exports, '__esModule', { value: true });

})));
//# sourceMappingURL=t-button.js.map
