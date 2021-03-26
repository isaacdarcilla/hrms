import Vue from 'vue';
export declare type DialogInput = string | string[] | null;
declare type ResolvableParam = undefined | ((val: DialogInput) => string | null | (Promise<string | null>));
declare const TDialogOverlayWrapperTransitionDialog: import("vue/types/vue").ExtendedVue<Vue, {
    currentValue: DialogInput;
    errorMessage: string;
    busy: boolean;
}, {
    submitHandler(e: MouseEvent): Promise<void>;
    inputHandler(input: DialogInput): void;
    resolveParam(resolvable: ResolvableParam, input: DialogInput): Promise<string | null>;
}, unknown, {
    getElementCssClass: Function;
    dialogShow: boolean;
    titleTag: string;
    title: string;
    icon: string;
    textTag: string;
    text: string;
    cancelButtonText: string;
    cancelButtonAriaLabel: string;
    okButtonText: string;
    okButtonAriaLabel: string;
    showCloseButton: boolean;
    preConfirm: Function;
    inputAttributes: any;
    inputType: string;
    inputValidator: Function;
    inputValue: string | unknown[];
    inputOptions: any;
    inputPlaceholder: string;
    type: string;
}>;
export default TDialogOverlayWrapperTransitionDialog;
