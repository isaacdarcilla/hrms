(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports, require('vue'), require('lodash.get')) :
    typeof define === 'function' && define.amd ? define(['exports', 'vue', 'lodash.get'], factory) :
    (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.TCard = {}, global.Vue, global.get));
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

    const TCard = Component.extend({
        name: 'TCard',
        props: {
            tagName: {
                type: String,
                default: 'div',
            },
            header: {
                type: String,
                default: undefined,
            },
            footer: {
                type: String,
                default: undefined,
            },
            noBody: {
                type: Boolean,
                default: false,
            },
            classes: {
                type: Object,
                default: () => ({
                    wrapper: 'border rounded shadow-sm bg-white border-gray-100',
                    body: 'p-3',
                    header: 'border-b border-gray-100 p-3 rounded-t',
                    footer: 'border-gray-100 border-t p-3 rounded-b',
                }),
            },
        },
        render(createElement) {
            const renderFun = this.render;
            return renderFun(createElement);
        },
        methods: {
            render(createElement) {
                return createElement(this.tagName, {
                    class: this.getElementCssClass('wrapper'),
                }, this.renderChilds(createElement));
            },
            renderChilds(createElement) {
                if (this.noBody) {
                    return this.$slots.default;
                }
                const childs = [];
                if (!!this.$slots.header || this.header !== undefined) {
                    childs.push(createElement('div', {
                        ref: 'header',
                        class: this.getElementCssClass('header'),
                    }, this.$slots.header || this.header));
                }
                childs.push(createElement('div', {
                    ref: 'body',
                    class: this.getElementCssClass('body'),
                }, this.$slots.default));
                if (!!this.$slots.footer || this.footer !== undefined) {
                    childs.push(createElement('div', {
                        ref: 'footer',
                        class: this.getElementCssClass('footer'),
                    }, this.$slots.footer || this.footer));
                }
                return childs;
            },
        },
    });

    exports.default = TCard;

    Object.defineProperty(exports, '__esModule', { value: true });

})));
//# sourceMappingURL=t-card.js.map
