import Vue from 'vue';
import CssClass from '../../types/CssClass';
declare const TDatepickerViewsViewYearsYear: import("vue/types/vue").ExtendedVue<Vue, {
    localActiveDate: Date;
}, {
    getClass(): CssClass;
    getYear(): Date;
}, {
    isSelected: boolean;
    isActive: boolean;
    yearFormatted: string;
}, {
    year: string;
    activeDate: string;
    value: string | unknown[];
    getElementCssClass: Function;
    showActiveDate: boolean;
    formatNative: Function;
}>;
export default TDatepickerViewsViewYearsYear;
