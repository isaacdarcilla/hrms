(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports, require('vue'), require('lodash.get')) :
    typeof define === 'function' && define.amd ? define(['exports', 'vue', 'lodash.get'], factory) :
    (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.TAlert = {}, global.Vue, global.get));
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

    const TAlert = Component.extend({
        name: 'TAlert',
        props: {
            tagName: {
                type: String,
                default: 'div',
            },
            bodyTagName: {
                type: String,
                default: 'div',
            },
            dismissible: {
                type: Boolean,
                default: true,
            },
            show: {
                type: Boolean,
                default: false,
            },
            timeout: {
                type: Number,
                default: undefined,
            },
            classes: {
                type: Object,
                default() {
                    return {
                        wrapper: 'relative flex items-center p-4 bg-blue-50 border-l-4 border-blue-500 rounded shadow-sm',
                        body: 'flex-grow',
                        close: 'absolute relative flex items-center justify-center flex-shrink-0 w-6 h-6 ml-4 text-blue-500 transition duration-100 ease-in-out rounded hover:bg-blue-200 focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50',
                        closeIcon: 'fill-current h-4 w-4',
                    };
                },
            },
        },
        data() {
            return {
                localShow: this.show,
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
                if (this.localShow) {
                    this.$emit('shown');
                    if (this.timeout) {
                        this.initTimeout();
                    }
                }
                else {
                    this.$emit('hidden');
                }
            },
        },
        mounted() {
            if (this.localShow && this.timeout) {
                this.initTimeout();
            }
        },
        methods: {
            render(createElement) {
                if (!this.localShow) {
                    return createElement();
                }
                return createElement(this.tagName, {
                    class: this.getElementCssClass('wrapper'),
                }, !this.dismissible
                    ? [
                        createElement(this.bodyTagName, {
                            ref: 'body',
                            class: this.getElementCssClass('body'),
                        }, this.$slots.default),
                    ]
                    : [
                        createElement(this.bodyTagName, {
                            ref: 'body',
                            class: this.getElementCssClass('body'),
                        }, this.$slots.default),
                        createElement('button', {
                            ref: 'close',
                            class: this.getElementCssClass('close'),
                            attrs: {
                                type: 'button',
                            },
                            on: {
                                click: this.hide,
                            },
                        }, this.$slots.close
                            || [
                                createElement('svg', {
                                    attrs: {
                                        fill: 'currentColor',
                                        xmlns: 'http://www.w3.org/2000/svg',
                                        viewBox: '0 0 20 20',
                                    },
                                    class: this.getElementCssClass('closeIcon'),
                                }, [
                                    createElement('path', {
                                        attrs: {
                                            'clip-rule': 'evenodd',
                                            'fill-rule': 'evenodd',
                                            d: 'M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z',
                                        },
                                    }),
                                ]),
                            ]),
                    ]);
            },
            initTimeout() {
                setTimeout(() => {
                    this.hide();
                }, this.timeout);
            },
            hide() {
                this.localShow = false;
            },
        },
    });

    exports.default = TAlert;

    Object.defineProperty(exports, '__esModule', { value: true });

})));
//# sourceMappingURL=t-alert.js.map
