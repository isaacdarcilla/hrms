import { CreateElement, VNode } from 'vue';
import CssClass from '../types/CssClass';
declare const TRadio: import("vue/types/vue").ExtendedVue<{
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
    renderWrapped(createElement: CreateElement): VNode;
    render(createElement: CreateElement): VNode;
    inputHandler(e: Event): Promise<void>;
    /**
     * We need to trigger the input event in all the inputs that are not checked
     * so we can update the `elementChecked` local property that is used to
     * change the classes of the wrapper div according to the state
     */
    sendInputEventToTheNotCheckedInputs(): void;
    selectPrevRadio(e: KeyboardEvent): void;
    selectNextRadio(e: KeyboardEvent): void;
    wrapperSpaceHandler(e: KeyboardEvent): void;
    blurHandler(e: FocusEvent): void;
    focusHandler(e: FocusEvent): void;
    blur(): void;
    click(): void;
    focus(options?: FocusOptions | undefined): void;
}, {
    isChecked: boolean;
}, {
    value: any;
    checked: string | boolean;
    model: any;
    wrapped: boolean;
    wrapperTag: string;
    inputWrapperTag: string;
    labelTag: string;
    label: string | number;
    classes: any;
}>;
export default TRadio;
