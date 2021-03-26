import Vue from 'vue';
declare const TDatepickerViewsViewCalendar: import("vue/types/vue").ExtendedVue<Vue, {
    localActiveDate: Date;
    localActiveMonth: Date;
}, {
    inputHandler(date: Date): void;
}, unknown, {
    value: string | unknown[];
    activeDate: string;
    activeMonth: string;
    weekStart: number;
    getElementCssClass: Function;
    parse: Function;
    format: Function;
    formatNative: Function;
    dateFormat: string;
    userFormat: string;
    monthsPerView: number;
    showActiveDate: boolean;
    disabledDates: string | Function | unknown[];
    highlightDates: string | Function | unknown[];
    maxDate: string;
    minDate: string;
    range: boolean;
    showDaysForOtherMonth: boolean;
}>;
export default TDatepickerViewsViewCalendar;
