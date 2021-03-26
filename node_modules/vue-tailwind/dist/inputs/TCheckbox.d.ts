import { CreateElement, VNode } from 'vue';
import CssClass from '../types/CssClass';
declare const TCheckbox: import("vue/types/vue").ExtendedVue<{
    getListeners(listeners: {
        [key: string]: Function | Function[];
    } | undefined): {
        [key: string]: Function | Function[];
    } | undefined;
} & {
    id: string;
    name: string;
    disabled: boolean;
    readonly: boolean;
    autofocus: boolean;
    required: boolean;
    tabindex: string | number;
} & {
    getElementCssClass(elementName?: string | undefined, defaultClasses?: CssClass): CssClass;
} & {
    componentClass: CssClass;
    activeVariant: string | undefined;
} & {
    classes: any;
    fixedClasses: any;
    variants: any;
    variant: any;
} & import("vue").default, {
    localValue: any;
}, {
    getInput(): HTMLInputElement;
    renderWrapped(createElement: CreateElement): VNode;
    render(createElement: CreateElement): VNode;
    wrapperSpaceHandler(e: KeyboardEvent): void;
    setIndeterminate(indeterminate: boolean): void;
    setChecked(checked: boolean): void;
    changeHandler(): void;
    blurHandler(e: FocusEvent): void;
    focusHandler(e: FocusEvent): void;
    blur(): void;
    click(): void;
    focus(options?: FocusOptions | undefined): void;
}, {
    isChecked: unknown;
}, {
    value: any;
    uncheckedValue: any;
    indeterminate: string | boolean;
    checked: string | boolean;
    model: any;
    wrapped: boolean;
    wrapperTag: string;
    inputWrapperTag: string;
    labelTag: string;
    label: string | number;
    classes: any;
}>;
export default TCheckbox;
