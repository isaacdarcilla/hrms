import { CreateElement, VNode } from 'vue';
declare const TInput: import("vue/types/vue").ExtendedVue<{
    localValue: string | number | null;
    valueWhenFocus: string | number | null;
} & {
    blurHandler(e: FocusEvent): void;
    focusHandler(e: FocusEvent): void;
    keyupHandler(e: KeyboardEvent): void;
    keydownHandler(e: KeyboardEvent): void;
    blur(): void;
    click(): void;
    focus(options?: FocusOptions | undefined): void;
    select(): void;
    setSelectionRange(start: number, end: number, direction?: "forward" | "backward" | "none" | undefined): void;
    setRangeText(replacement: string): void;
} & {
    value: string | number;
    autocomplete: string;
    maxlength: string | number;
    minlength: string | number;
    multiple: boolean;
    pattern: string;
    placeholder: string;
    classes: any;
} & {
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
} & import("vue").default, unknown, {
    render(createElement: CreateElement): VNode;
    inputHandler(e: Event): void;
}, unknown, {
    type: string;
    max: string | number;
    min: string | number;
    classes: any;
}>;
export default TInput;
