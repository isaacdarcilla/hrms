import { CreateElement, VNode } from 'vue';
import CssClass from '../types/CssClass';
declare type ColumnSettings = {
    id?: string;
    className?: CssClass;
    text?: string;
    value?: string;
};
declare type RowObject = {
    [k: string]: string;
};
declare type Row = RowObject | string[];
declare const TTable: import("vue/types/vue").ExtendedVue<{
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
    ready: boolean;
    windowWidth: number | null;
}, {
    resizeListener(): void;
    renderTable(createElement: CreateElement): VNode;
    renderThead(createElement: CreateElement): VNode | VNode[];
    renderTfoot(createElement: CreateElement): VNode | VNode[];
    renderTbody(createElement: CreateElement): VNode | VNode[];
    renderRows(createElement: CreateElement): (VNode | VNode[])[];
    renderCols(createElement: CreateElement, row: Row, rowIndex: number): (VNode | VNode[])[];
    renderCol(createElement: CreateElement, text: string, rowIndex: number, columnIndex: string | number): VNode | VNode[];
    getRowColumns(row: Row): Row;
}, {
    renderResponsive: boolean | 0 | null;
    normalizedHeaders: ColumnSettings[];
    normalizedFooterData: ColumnSettings[];
    headersValues: string[];
    showHeader: boolean;
}, {
    data: unknown[];
    headers: unknown[];
    footerData: unknown[];
    hideHeader: boolean;
    showFooter: boolean;
    responsive: boolean;
    responsiveBreakpoint: number;
    classes: any;
}>;
export default TTable;
