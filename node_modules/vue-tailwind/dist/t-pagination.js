(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports, require('lodash.range'), require('vue'), require('lodash.get')) :
    typeof define === 'function' && define.amd ? define(['exports', 'lodash.range', 'vue', 'lodash.get'], factory) :
    (global = typeof globalThis !== 'undefined' ? globalThis : global || self, factory(global.TPagination = {}, global.range, global.Vue, global.get));
}(this, (function (exports, range, Vue, get) { 'use strict';

    function _interopDefaultLegacy (e) { return e && typeof e === 'object' && 'default' in e ? e : { 'default': e }; }

    var range__default = /*#__PURE__*/_interopDefaultLegacy(range);
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

    const TPagination = Component.extend({
        name: 'TPagination',
        props: {
            value: {
                type: Number,
                default: null,
            },
            tagName: {
                type: String,
                default: 'ul',
            },
            elementTagName: {
                type: String,
                default: 'li',
            },
            disabled: {
                type: Boolean,
                default: false,
            },
            perPage: {
                type: Number,
                default: 20,
                validator: (value) => value > 0,
            },
            totalItems: {
                type: Number,
                default: 0,
                validator: (value) => value >= 0,
            },
            limit: {
                type: Number,
                default: 5,
                validator: (value) => value >= 0,
            },
            prevLabel: {
                type: String,
                default: '&lsaquo;',
            },
            nextLabel: {
                type: String,
                default: '&rsaquo;',
            },
            firstLabel: {
                type: String,
                default: '&laquo;',
            },
            lastLabel: {
                type: String,
                default: '&raquo;',
            },
            ellipsisLabel: {
                type: String,
                default: '&hellip;',
            },
            hideFirstLastControls: {
                type: Boolean,
                default: false,
            },
            hidePrevNextControls: {
                type: Boolean,
                default: false,
            },
            hideEllipsis: {
                type: Boolean,
                default: false,
            },
            classes: {
                type: Object,
                default() {
                    return {
                        wrapper: 'table border-collapse text-center bg-white mx-auto shadow-sm',
                        element: 'w-8 h-8 border border-gray-200 table-cell hover:border-blue-100',
                        activeElement: 'w-8 h-8 border border-blue-500 table-cell hover:border-blue-600',
                        disabledElement: 'w-8 h-8 border border-gray-200 table-cell',
                        ellipsisElement: 'w-8 h-8 border border-gray-200 hidden md:table-cell',
                        activeButton: 'bg-blue-500 w-full h-full text-white hover:bg-blue-600 transition duration-100 ease-in-out focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50',
                        disabledButton: 'opacity-25 w-full h-full cursor-not-allowed transition duration-100 ease-in-out',
                        button: 'hover:bg-blue-100 w-full h-full transition duration-100 ease-in-out focus:ring-2 focus:ring-blue-500 focus:outline-none focus:ring-opacity-50',
                        ellipsis: '',
                    };
                },
            },
        },
        render(createElement) {
            const createComponentFunc = this.createComponent;
            return createComponentFunc(createElement);
        },
        data() {
            return {
                currentPage: this.value,
            };
        },
        computed: {
            totalPages() {
                if (this.perPage <= 0) {
                    return 0;
                }
                return Math.ceil(this.totalItems / this.perPage);
            },
            pageButtons() {
                const from1 = Number(this.currentPage) - Math.round(this.limit / 2) + 1;
                const from2 = this.totalPages + 1 - this.limit;
                const from = Math.max(Math.min(from1, from2), 1);
                const to = Math.min(from + this.limit - 1, this.totalPages);
                return range__default['default'](from, to + 1).map((page) => {
                    if (!this.hideEllipsis && page === from && from > 1) {
                        return 'less';
                    }
                    if (!this.hideEllipsis && page === to && to < this.totalPages) {
                        return 'more';
                    }
                    return String(page);
                });
            },
            prevIsDisabled() {
                return this.disabled || this.currentPage === null || this.currentPage <= 1;
            },
            nextIsDisabled() {
                return this.disabled || this.currentPage === null || this.currentPage >= this.totalPages;
            },
        },
        watch: {
            value(value) {
                this.currentPage = value;
            },
            currentPage(currentPage) {
                this.$emit('input', currentPage);
                this.$emit('change', currentPage);
            },
        },
        methods: {
            createComponent(createElement) {
                const subElements = [];
                if (!this.hideFirstLastControls) {
                    subElements.push(this.createControl(createElement, this.firstLabel, this.prevIsDisabled, false, this.goToFirstPage));
                }
                if (!this.hidePrevNextControls) {
                    subElements.push(this.createControl(createElement, this.prevLabel, this.prevIsDisabled, false, this.goToPrevPage));
                }
                this.pageButtons.forEach((page) => {
                    if (page === 'less' || page === 'more') {
                        subElements.push(this.createControl(createElement, this.ellipsisLabel));
                    }
                    else {
                        subElements.push(this.createControl(createElement, page, false, this.isPageActive(Number(page)), () => this.selectPage(Number(page))));
                    }
                });
                if (!this.hidePrevNextControls) {
                    subElements.push(this.createControl(createElement, this.nextLabel, this.nextIsDisabled, false, this.goToNextPage));
                }
                if (!this.hideFirstLastControls) {
                    subElements.push(this.createControl(createElement, this.lastLabel, this.nextIsDisabled, false, this.goToLastPage));
                }
                return createElement(this.tagName, {
                    class: this.getElementCssClass('wrapper'),
                }, subElements);
            },
            // eslint-disable-next-line max-len
            createControl(createElement, text, disabled = false, active = false, clickHandler) {
                let className = '';
                if (!clickHandler) {
                    className = this.getElementCssClass('ellipsisElement');
                }
                else if (disabled) {
                    className = this.getElementCssClass('disabledElement');
                }
                else if (active) {
                    className = this.getElementCssClass('activeElement');
                }
                else {
                    className = this.getElementCssClass('element');
                }
                return createElement(this.elementTagName, {
                    class: className,
                }, [
                    this.createControlButton(createElement, text, disabled, active, clickHandler),
                ]);
            },
            // eslint-disable-next-line max-len
            createControlButton(createElement, text, disabled = false, active = false, clickHandler) {
                if (!clickHandler) {
                    return createElement('span', {
                        class: this.getElementCssClass('ellipsis'),
                        domProps: {
                            innerHTML: text,
                        },
                    });
                }
                let className = '';
                const attrs = {};
                if (disabled) {
                    className = this.getElementCssClass('disabledButton');
                    attrs.disabled = true;
                }
                else if (active) {
                    className = this.getElementCssClass('activeButton');
                }
                else {
                    className = this.getElementCssClass('button');
                }
                return createElement('button', {
                    class: className,
                    on: {
                        click: clickHandler,
                    },
                    attrs,
                    domProps: {
                        disabled: disabled ? true : undefined,
                        innerHTML: text,
                    },
                });
            },
            selectPage(page) {
                this.currentPage = page;
            },
            goToPrevPage() {
                this.currentPage = this.currentPage === null
                    ? 1
                    : Math.max(this.currentPage - 1, 1);
            },
            goToNextPage() {
                this.currentPage = this.currentPage === null
                    ? this.totalPages
                    : Math.min(this.currentPage + 1, this.totalPages);
            },
            goToFirstPage() {
                this.currentPage = 1;
            },
            goToLastPage() {
                this.currentPage = this.totalPages;
            },
            isPageActive(page) {
                return page === this.currentPage;
            },
        },
    });

    exports.default = TPagination;

    Object.defineProperty(exports, '__esModule', { value: true });

})));
//# sourceMappingURL=t-pagination.js.map
