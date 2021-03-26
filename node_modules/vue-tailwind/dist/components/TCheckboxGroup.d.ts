import { CreateElement, VNode } from 'vue';
import NormalizedOption from '../types/NormalizedOption';
import NormalizedOptions from '../types/NormalizedOptions';
declare const TCheckboxGroup: import("vue/types/vue").ExtendedVue<{
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
    localValue: (string | number | Record<string, unknown>)[];
}, {
    createRadioGroup(createElement: CreateElement): VNode;
    createRadioOptions(createElement: CreateElement): VNode[];
    createRadioOption(createElement: CreateElement, option: NormalizedOption, index: number): VNode;
    buildId(option: NormalizedOption, index: number): string;
    inputHandler(value: (string | number | Record<string, unknown>)[]): void;
    blurHandler(e: FocusEvent): void;
    focusHandler(e: FocusEvent): void;
}, unknown, {
    groupWrapperTag: string;
    wrapperTag: string;
    inputWrapperTag: string;
    labelTag: string;
    value: unknown[];
    fixedClasses: any;
    classes: any;
}>;
export default TCheckboxGroup;
