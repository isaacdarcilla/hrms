import { CreateElement, VNode } from 'vue';
declare const TButton: import("vue/types/vue").ExtendedVue<{
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
    blurHandler(e: FocusEvent): void;
    focusHandler(e: FocusEvent): void;
    clickHandler(e: MouseEvent): void;
    keydownHandler(e: MouseEvent): void;
    mousedownHandler(e: MouseEvent): void;
    blur(): void;
    focus(): void;
    inertiaLinkAttributes(): {
        data: any;
        href: string;
        method: string;
        replace: boolean;
        preserveScroll: boolean;
        preserveState: boolean;
        only: unknown[];
        id: string;
        value: string | number;
        autofocus: boolean;
        disabled: boolean;
        name: string;
        type: string;
    };
    routerLinkAttributes(): {
        to: any;
        replace: boolean;
        append: boolean;
        tag: string;
        activeClass: string;
        exact: boolean;
        event: string | unknown[];
        exactActiveClass: string;
        id: string;
        value: string | number;
        autofocus: boolean;
        disabled: boolean;
        name: string;
        type: string;
    };
    /**
     * Attrs according to the button type
     * @return {Object}
     */
    getAttributes(): {
        data: any;
        href: string;
        method: string;
        replace: boolean;
        preserveScroll: boolean;
        preserveState: boolean;
        only: unknown[];
        id: string;
        value: string | number;
        autofocus: boolean;
        disabled: boolean;
        name: string;
        type: string;
    } | {
        to: any;
        replace: boolean;
        append: boolean;
        tag: string;
        activeClass: string;
        exact: boolean;
        event: string | unknown[];
        exactActiveClass: string;
        id: string;
        value: string | number;
        autofocus: boolean;
        disabled: boolean;
        name: string;
        type: string;
    } | {
        id: string;
        value: string | number;
        autofocus: boolean;
        disabled: boolean;
        name: string;
        href: string;
        type: string;
    };
    render(createElement: CreateElement): VNode;
}, {
    isInertiaLinkComponentAvailable: boolean;
    isRouterLinkComponentAvailable: boolean;
    isARouterLink: boolean;
    isAnIntertiaLink: boolean;
    componentToRender: string | import("vue").VueConstructor<import("vue").default> | import("vue").FunctionalComponentOptions<any, import("vue/types/options").PropsDefinition<any>> | import("vue").ComponentOptions<never, any, any, any, any, Record<string, any>> | import("vue/types/options").AsyncComponentPromise<any, any, any, any> | import("vue/types/options").AsyncComponentFactory<any, any, any, any> | undefined;
}, {
    value: string | number;
    text: string;
    tagName: string;
    type: string;
    href: string;
    to: any;
    append: boolean;
    activeClass: string;
    exact: boolean;
    exactActiveClass: string;
    event: string | unknown[];
    data: any;
    method: string;
    replace: boolean;
    preserveScroll: boolean;
    preserveState: boolean;
    only: unknown[];
    native: boolean;
    classes: any;
}>;
export default TButton;
