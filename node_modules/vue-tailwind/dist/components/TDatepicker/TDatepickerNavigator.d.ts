import Vue from 'vue';
export declare const getYearsRange: (date: Date, yearsPerView: number) => [number, number];
export declare enum CalendarView {
    Day = "day",
    Month = "month",
    Year = "year"
}
declare const TDatepickerNavigator: import("vue/types/vue").ExtendedVue<Vue, {
    localValue: Date;
}, {
    getNextDate(): Date | undefined;
    getPrevDate(): Date | undefined;
    inputHandler(newDate: Date): void;
    clickHandler(): void;
    next(): void;
    prev(): void;
    getPrevMonth(): Date | undefined;
    getNextMonth(): Date | undefined;
    getPrevYear(): Date | undefined;
    getNextYear(): Date | undefined;
    getPrevYearGroup(): Date | undefined;
    getNextYearGroup(): Date | undefined;
}, {
    isDayView: boolean;
    isYearView: boolean;
    isMonthView: boolean;
    nextDate: Date | undefined;
    prevDate: Date | undefined;
    prevButtonIsDisabled: boolean;
    nextButtonIsDisabled: boolean;
    nextButtonAriaLabel: string;
    prevButtonAriaLabel: string;
}, {
    getElementCssClass: Function;
    value: string;
    showSelector: boolean;
    currentView: string;
    parse: Function;
    formatNative: Function;
    dateFormat: string;
    yearsPerView: number;
    maxDate: string;
    minDate: string;
    locale: any;
}>;
export default TDatepickerNavigator;
