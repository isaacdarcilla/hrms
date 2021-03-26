declare const MultipleInput: import("vue/types/vue").ExtendedVue<{
    localValue: any;
} & {
    normalizeOptions(options: import("../types/InputOptions").default): import("../types/NormalizedOptions").default;
} & {
    normalizedOptions: import("../types/NormalizedOptions").default;
    flattenedOptions: import("../types/NormalizedOptions").default;
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
} & import("vue").default, unknown, unknown, unknown, {
    value: any;
    multiple: boolean;
}>;
export default MultipleInput;
