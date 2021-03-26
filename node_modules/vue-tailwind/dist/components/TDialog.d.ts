import { DialogInput } from './TDialog/TDialogOverlayWrapperTransitionDialog';
import { HideReason } from '../types/Dialog';
declare type InitialData = {
    overlayShow: boolean;
    dialogShow: boolean;
    params: undefined;
    preventAction: boolean;
    hideReason: HideReason | undefined;
    input?: DialogInput;
    resolve: null | ((value?: unknown) => void);
    reject: null | ((reason?: unknown) => void);
    preConfirmResponse: any;
    preConfirmError: any;
};
export declare type DialogResponse = {
    hideReason: HideReason;
    isOk: boolean;
    isCancel: boolean;
    isDismissed: boolean;
    input?: DialogInput;
    response: any;
};
declare const TDialog: import("vue/types/vue").ExtendedVue<{
    getElementCssClass(elementName?: string | undefined, defaultClasses?: import("../types/CssClass").default): import("../types/CssClass").default;
} & {
    componentClass: import("../types/CssClass").default;
    activeVariant: string | undefined;
} & {
    classes: any;
    fixedClasses: any;
    variants: any;
    variant: any;
} & import("vue").default, InitialData, {
    getOverlay(): {
        focus: () => void;
        enableBodyScroll: () => void;
        disableBodyScroll: () => void;
    } | undefined;
    keyupHandler(e: KeyboardEvent): void;
    beforeOpen(): void;
    opened(): void;
    beforeClose(event?: Event | undefined): void;
    closed(): void;
    prepareDomForDialog(): void;
    dismiss(e: Event): void;
    esc(e: Event): void;
    cancel(e: Event): void;
    hide(e: Event): void;
    submit(e: Event, input: DialogInput, response?: any): void;
    submitError(e: Event, input: DialogInput, error?: any): void;
    close(e?: Event | undefined): void;
    show(params?: undefined): void;
    closeCancel(): void;
    reset(): void;
    outsideClick(e: Event): void;
}, unknown, {
    value: boolean;
    name: string;
    titleTag: string;
    title: string;
    icon: string;
    textTag: string;
    text: string;
    clickToClose: boolean;
    escToClose: boolean;
    cancelButtonText: string;
    cancelButtonAriaLabel: string;
    okButtonText: string;
    okButtonAriaLabel: string;
    showCloseButton: boolean;
    disableBodyScroll: boolean;
    focusOnOpen: boolean;
    preConfirm: Function;
    inputAttributes: any;
    inputType: string;
    inputValidator: Function;
    inputValue: string | unknown[];
    inputOptions: any;
    inputPlaceholder: string;
    type: string;
    fixedClasses: any;
    classes: any;
}>;
export default TDialog;
