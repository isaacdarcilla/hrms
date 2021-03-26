import { CreateElement, VNode } from 'vue';
declare const TTag: import("vue/types/vue").ExtendedVue<{
    getElementCssClass(elementName?: string | undefined, defaultClasses?: import("../types/CssClass").default): import("../types/CssClass").default;
} & {
    componentClass: import("../types/CssClass").default;
    activeVariant: string | undefined;
} & {
    classes: any;
    fixedClasses: any;
    variants: any;
    variant: any;
} & import("vue").default, unknown, {
    render(createElement: CreateElement): VNode;
}, unknown, {
    text: string;
    tagName: string;
}>;
export default TTag;
