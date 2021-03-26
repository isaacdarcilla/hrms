import Vue from 'vue';
import CssClass from '../../types/CssClass';
declare const TDatepickerViewsViewMonthsMonth: import("vue/types/vue").ExtendedVue<Vue, unknown, {
    getClass(): CssClass;
    getMonth(): Date;
}, {
    isSelected: boolean;
    isActive: boolean;
    monthFormatted: string;
}, {
    month: string;
    value: string | unknown[];
    activeDate: string;
    getElementCssClass: Function;
    formatNative: Function;
    showActiveDate: boolean;
}>;
export default TDatepickerViewsViewMonthsMonth;
