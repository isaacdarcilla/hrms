import Vue from 'vue';
declare const TDatepickerViews: import("vue/types/vue").ExtendedVue<Vue, {
    localActiveDate: Date;
}, unknown, {
    activeMonths: Date[];
}, {
    value: string | unknown[];
    activeDate: string;
    weekStart: number;
    monthsPerView: number;
    lang: string;
    getElementCssClass: Function;
    parse: Function;
    format: Function;
    formatNative: Function;
    dateFormat: string;
    userFormat: string;
    initialView: string;
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
export default TDatepickerViews;
