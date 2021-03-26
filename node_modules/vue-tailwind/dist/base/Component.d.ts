import Vue from 'vue';
import CssClass from '../types/CssClass';
declare const Component: import("vue/types/vue").ExtendedVue<Vue, unknown, {
    getElementCssClass(elementName?: string | undefined, defaultClasses?: CssClass): CssClass;
}, {
    componentClass: CssClass;
    activeVariant: string | undefined;
}, {
    classes: any;
    fixedClasses: any;
    variants: any;
    variant: any;
}>;
export default Component;
