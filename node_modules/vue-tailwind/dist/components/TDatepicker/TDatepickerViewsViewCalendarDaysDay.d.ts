import Vue from 'vue';
import CssClass from '../../types/CssClass';
declare const TDatepickerViewsViewCalendarDaysDay: import("vue/types/vue").ExtendedVue<Vue, {
    localActiveDate: Date;
    localActiveMonth: Date;
}, {
    getClass(): CssClass;
    getDay(): Date;
}, {
    isSelected: boolean;
    isActive: boolean;
    isToday: boolean;
    isDisabled: boolean;
    isHighlighted: boolean;
    isForAnotherMonth: boolean;
    isInRange: boolean;
    isFirstDayOfRange: boolean;
    isLastDayOfRange: boolean;
    dayFormatted: string;
    ariaLabel: string;
    dateFormatted: string;
}, {
    day: string;
    value: string | unknown[];
    activeDate: string;
    activeMonth: string;
    getElementCssClass: Function;
    parse: Function;
    format: Function;
    formatNative: Function;
    dateFormat: string;
    userFormat: string;
    showDaysForOtherMonth: boolean;
    showActiveDate: boolean;
    disabledDates: string | Function | unknown[];
    highlightDates: string | Function | unknown[];
    maxDate: string;
    minDate: string;
    range: boolean;
}>;
export default TDatepickerViewsViewCalendarDaysDay;
