/// <reference types="node" />
import { CreateElement, VNode } from 'vue';
declare const TDropdown: import("vue/types/vue").ExtendedVue<{
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
    hasFocus: boolean;
    hideOnLeaveTimeoutHolder: NodeJS.Timeout | null;
}, {
    render(createElement: CreateElement): VNode;
    blurEventTargetIsChild(e: FocusEvent): boolean;
    focusEventTargetIsChild(e: FocusEvent): boolean;
    escapeHandler(): void;
    mousedownHandler(): void;
    focusHandler(e: FocusEvent): void;
    blurHandler(e: FocusEvent): void;
    keydownHandler(e: KeyboardEvent): void;
    mouseleaveHandler(): void;
    mouseoverHandler(): void;
    doHide(): void;
    hideIfFocusOutside(e: FocusEvent): void;
    doShow(): void;
    doToggle(): void;
    blur(): void;
    focus(options?: FocusOptions | undefined): void;
}, unknown, {
    text: string;
    disabled: boolean;
    tagName: string;
    dropdownWrapperTagName: string;
    dropdownTagName: string;
    toggleOnFocus: boolean;
    toggleOnClick: boolean;
    toggleOnHover: boolean;
    hideOnLeaveTimeout: number;
    show: boolean;
    classes: any;
}>;
export default TDropdown;
