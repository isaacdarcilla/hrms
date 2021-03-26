import { CreateElement, VNode } from 'vue';
import NormalizedOption from '../types/NormalizedOption';
import NormalizedOptions from '../types/NormalizedOptions';
declare const TSelect: import("vue/types/vue").ExtendedVue<{
    value: any;
    multiple: boolean;
} & {
    localValue: any;
} & {
    normalizeOptions(options: import("../types/InputOptions").default): NormalizedOptions;
} & {
    normalizedOptions: NormalizedOptions;
    flattenedOptions: NormalizedOptions;
} & {
    value: any;
    valueAttribute: string;
    textAttribute: string;
    options: any;
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
} & import("vue").default, {
    localValue: any;
}, {
    createSelectWrapper(createElement: CreateElement): VNode;
    createArrow(createElement: CreateElement): VNode;
    createSelect(createElement: CreateElement): VNode;
    createOptions(createElement: CreateElement, value: string | number | unknown[]): VNode[];
    createOptgroup(createElement: CreateElement, option: NormalizedOption, value: string | number | unknown[]): VNode;
    createOption(createElement: CreateElement, option: NormalizedOption, value: string | number | unknown[]): VNode;
    inputHandler(e: Event): void;
    blurHandler(e: FocusEvent): void;
    focusHandler(e: FocusEvent): void;
    blur(): void;
    focus(options?: FocusOptions | undefined): void;
}, {
    normalizedOptionsWithPlaceholder: NormalizedOptions;
}, {
    placeholder: string;
    wrapped: boolean;
    classes: any;
}>;
export default TSelect;
