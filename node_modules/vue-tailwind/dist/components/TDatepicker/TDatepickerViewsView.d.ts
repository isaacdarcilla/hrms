import Vue from 'vue';
declare const TDatepickerViewsView: import("vue/types/vue").ExtendedVue<Vue, {
    localActiveDate: Date;
    localActiveMonth: Date;
}, {
    inputHandler(date: Date): void;
    viewInputActiveDateHandler(date: Date): void;
    inputActiveDateHandler(date: Date): void;
    resetView(): void;
}, {
    isFirstMonth: boolean;
    isLastMonth: boolean;
    showMonthName: boolean;
}, {
    value: string | unknown[];
    activeMonth: string;
    activeDate: string;
    weekStart: number;
    lang: string;
    getElementCssClass: Function;
    formatNative: Function;
    parse: Function;
    format: Function;
    userFormat: string;
    dateFormat: string;
    monthsPerView: number;
    monthIndex: number;
    currentView: string;
    yearsPerView: number;
    showActiveDate: boolean;
    showDaysForOtherMonth: boolean;
    disabledDates: string | Function | unknown[];
    highlightDates: string | Function | unknown[];
    maxDate: string;
    minDate: string;
    range: boolean;
    locale: any;
}>;
export default TDatepickerViewsView;
