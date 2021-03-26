import { CreateElement, VNode } from 'vue';
declare const TModal: import("vue/types/vue").ExtendedVue<{
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
    overlayShow: boolean;
    modalShow: boolean;
    params: undefined;
    preventAction: boolean;
}, {
    render(createElement: CreateElement): VNode;
    renderWrapper(createElement: CreateElement): VNode;
    renderModal(createElement: CreateElement): VNode;
    renderChilds(createElement: CreateElement): VNode[] | undefined;
    clickHandler(e: MouseEvent): void;
    keyupHandler(e: KeyboardEvent): void;
    beforeOpen(): void;
    opened(): void;
    beforeClose(): void;
    closed(): void;
    prepareDomForModal(): void;
    hide(): void;
    show(params?: undefined): void;
    cancel(): void;
    outsideClick(): void;
    getOverlay(): HTMLDivElement | undefined;
}, unknown, {
    name: string;
    value: boolean;
    header: string;
    footer: string;
    clickToClose: boolean;
    escToClose: boolean;
    noBody: boolean;
    hideCloseButton: boolean;
    disableBodyScroll: boolean;
    focusOnOpen: boolean;
    fixedClasses: any;
    classes: any;
}>;
export default TModal;
