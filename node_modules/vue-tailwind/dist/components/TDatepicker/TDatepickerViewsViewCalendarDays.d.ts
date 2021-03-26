import Vue from 'vue';
declare const TDatepickerViewsViewCalendarDays: import("vue/types/vue").ExtendedVue<Vue, {
    localActiveDate: Date;
    localActiveMonth: Date;
}, {
    getDay(date: Date, day: number): Date;
}, {
    firstDayOfMonth: Date;
    lastDayOfMonth: Date;
    firstDayOfPrevMonth: Date;
    lastDayOfPrevMonth: Date;
    firstDayOfNextMonth: Date;
    monthDays: Date[];
    prevMonthDays: Date[];
    nextMonthDays: Date[];
    days: Date[];
}, {
    value: string | unknown[];
    activeDate: string;
    activeMonth: string;
    weekStart: number;
    getElementCssClass: Function;
    parse: Function;
    format: Function;
    formatNative: Function;
    userFormat: string;
    dateFormat: string;
    showDaysForOtherMonth: boolean;
    showActiveDate: boolean;
    disabledDates: string | Function | unknown[];
    highlightDates: string | Function | unknown[];
    maxDate: string;
    minDate: string;
    range: boolean;
}>;
export default TDatepickerViewsViewCalendarDays;
