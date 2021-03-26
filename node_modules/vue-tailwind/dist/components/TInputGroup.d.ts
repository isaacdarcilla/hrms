import { CreateElement, VNode } from 'vue';
declare const TInputGroup: import("vue/types/vue").ExtendedVue<{
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
    /**
     * Get the tag name according to the slot name
     * @param  {String} slotName
     * @return {String}
     */
    getTagName(slotName: string): "label" | "div";
}, {
    elementsToRender: string[];
}, {
    inputName: string;
    label: string;
    description: string;
    feedback: string;
    sortedElements: unknown[];
    fixedClasses: any;
    classes: any;
}>;
export default TInputGroup;
