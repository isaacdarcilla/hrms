import { CreateElement, VNode } from 'vue';
import CssClass from '../types/CssClass';
declare type ClickHandler = () => void;
declare const TPagination: import("vue/types/vue").ExtendedVue<{
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
    currentPage: number | null;
}, {
    createComponent(createElement: CreateElement): VNode;
    createControl(createElement: CreateElement, text: string, disabled?: boolean, active?: boolean, clickHandler?: ClickHandler | undefined): VNode;
    createControlButton(createElement: CreateElement, text: string, disabled?: boolean, active?: boolean, clickHandler?: ClickHandler | undefined): VNode;
    selectPage(page: number): void;
    goToPrevPage(): void;
    goToNextPage(): void;
    goToFirstPage(): void;
    goToLastPage(): void;
    isPageActive(page: number): boolean;
}, {
    totalPages: number;
    pageButtons: string[];
    prevIsDisabled: boolean;
    nextIsDisabled: boolean;
}, {
    value: number;
    tagName: string;
    elementTagName: string;
    disabled: boolean;
    perPage: number;
    totalItems: number;
    limit: number;
    prevLabel: string;
    nextLabel: string;
    firstLabel: string;
    lastLabel: string;
    ellipsisLabel: string;
    hideFirstLastControls: boolean;
    hidePrevNextControls: boolean;
    hideEllipsis: boolean;
    classes: any;
}>;
export default TPagination;
