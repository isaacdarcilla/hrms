import CheckboxValue from '../types/CheckboxValues';
declare const TToggle: import("vue/types/vue").ExtendedVue<{
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
    isChecked: boolean;
}, {
    blurHandler(e: FocusEvent): void;
    focusHandler(e: FocusEvent): void;
    getElement(): HTMLDivElement;
    blur(): void;
    click(): void;
    spaceHandler(e: KeyboardEvent): void;
    clickHandler(): void;
    toggleValue(): void;
    setChecked(checked: boolean): void;
    focus(options?: FocusOptions | undefined): void;
}, {
    isDisabled: boolean;
    currentValue: CheckboxValue;
}, {
    value: any;
    uncheckedValue: any;
    model: any;
    checked: boolean;
    tabindex: string | number;
    uncheckedPlaceholder: string;
    checkedPlaceholder: string;
    uncheckedLabel: string;
    checkedLabel: string;
    classes: any;
    fixedClasses: any;
}>;
export default TToggle;
