import { CreateElement, VNode } from 'vue';
declare const TCard: import("vue/types/vue").ExtendedVue<{
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
    renderChilds(createElement: CreateElement): VNode[] | undefined;
}, unknown, {
    tagName: string;
    header: string;
    footer: string;
    noBody: boolean;
    classes: any;
}>;
export default TCard;
