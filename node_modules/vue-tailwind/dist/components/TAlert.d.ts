import { CreateElement, VNode } from 'vue';
declare const TAlert: import("vue/types/vue").ExtendedVue<{
    getElementCssClass(elementName?: string | undefined, defaultClasses?: import("../types/CssClass").default): import("../types/CssClass").default;
} & {
    componentClass: import("../types/CssClass").default;
    activeVariant: string | undefined;
} & {
    classes: any;
    fixedClasses: any;
    variants: any;
    variant: any;
} & import("vue").default, {
    localShow: boolean;
}, {
    render(createElement: CreateElement): VNode;
    initTimeout(): void;
    hide(): void;
}, unknown, {
    tagName: string;
    bodyTagName: string;
    dismissible: boolean;
    show: boolean;
    timeout: number;
    classes: any;
}>;
export default TAlert;
