import InputOptions from '../types/InputOptions';
import NormalizedOptions from '../types/NormalizedOptions';
declare const InputWithOptions: import("vue/types/vue").ExtendedVue<{
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
    normalizeOptions(options: InputOptions): NormalizedOptions;
}, {
    normalizedOptions: NormalizedOptions;
    flattenedOptions: NormalizedOptions;
}, {
    value: any;
    valueAttribute: string;
    textAttribute: string;
    options: any;
}>;
export default InputWithOptions;
