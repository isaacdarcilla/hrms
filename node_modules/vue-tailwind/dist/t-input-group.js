(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports, require('lodash.intersection'), require('vue'), require('lodash.get')) :
    typeof define === 'function' && define.amd ? define(['exports', 'lodash.intersection', 'vue', 'lodash.get'], factory) :
    (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.TInputGroup = {}, global.intersection, global.Vue, global.get));
}(this, (function (exports, intersection, Vue, get) { 'use strict';

    function _interopDefaultLegacy (e) { return e && typeof e === 'object' && 'default' in e ? e : { 'default': e }; }

    var intersection__default = /*#__PURE__*/_interopDefaultLegacy(intersection);
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

    const TInputGroup = Component.extend({
        name: 'TInputGroup',
        props: {
            inputName: {
                type: String,
                default: undefined,
            },
            label: {
                type: String,
                default: undefined,
            },
            description: {
                type: String,
                default: undefined,
            },
            feedback: {
                type: String,
                default: undefined,
            },
            sortedElements: {
                type: Array,
                default: () => (['label', 'default', 'feedback', 'description']),
                validator(value) {
                    const expectedValues = ['default', 'description', 'feedback', 'label'];
                    return value.length === intersection__default['default'](value, expectedValues).length;
                },
            },
            fixedClasses: {
                type: Object,
                default() {
                    return {};
                },
            },
            classes: {
                type: Object,
                default() {
                    return {
                        wrapper: '',
                        label: 'block',
                        body: '',
                        feedback: 'text-gray-400 text-sm',
                        description: 'text-gray-400 text-sm',
                    };
                },
            },
        },
        render(createElement) {
            const renderFun = this.render;
            return renderFun(createElement);
        },
        computed: {
            /**
             * Only render the elements that has a prop or a slot (always the default prop)
             * @return {Array}
             */
            elementsToRender() {
                const props = this.$props;
                const slots = this.$slots;
                return this.sortedElements
                    .filter((e) => e === 'default' || !!props[e] || !!slots[e]);
            },
        },
        methods: {
            render(createElement) {
                return createElement('div', {
                    ref: 'wrapper',
                    class: this.getElementCssClass('wrapper'),
                }, this.elementsToRender.map((elementName) => createElement(this.getTagName(elementName), {
                    ref: elementName,
                    class: this.getElementCssClass(elementName === 'default' ? 'body' : elementName),
                    attrs: {
                        for: elementName === 'label' ? this.inputName : undefined,
                    },
                    slot: elementName,
                }, this.$slots[elementName] || this.$props[elementName])));
            },
            /**
             * Get the tag name according to the slot name
             * @param  {String} slotName
             * @return {String}
             */
            getTagName(slotName) {
                switch (slotName) {
                    case 'label':
                        return 'label';
                    default:
                        return 'div';
                }
            },
        },
    });

    exports.default = TInputGroup;

    Object.defineProperty(exports, '__esModule', { value: true });

})));
//# sourceMappingURL=t-input-group.js.map
