import { Locale, Locales, CustomLocale } from '../types/locale';
export declare type DateValue = Date | string | number;
export declare type DateCondition = string | Date | undefined | ((day: Date) => boolean);
export declare type DateConditions = DateCondition | DateCondition[];
export declare type DateFormatter = (dateObj: Date | null, format: string, overrideLocale?: Locale) => string;
export declare type DateParser = (date: DateValue, givenFormat?: string, timeless?: boolean, customLocale?: Locale) => Date | undefined;
export interface FormatterArgs {
    l10n?: Locale;
}
export declare const formatDate: (dateObj: Date | null, format: string, customLocale?: Locale | undefined) => string;
export declare const parseDate: (date: DateValue, format?: string, timeless?: boolean | undefined, customLocale?: Locale | undefined) => Date | undefined;
/**
 * Compute the difference in dates, measured in ms
 */
export declare function compareDates(date1: Date, date2: Date, timeless?: boolean): number;
export declare const extractLocaleFromProps: (localeName: string, locales: Locales, defaultLocale: CustomLocale) => Locale;
export declare const buildDateParser: (locale: Locale, customDateParser?: DateParser | undefined) => DateParser;
export declare const buildDateFormatter: (locale: Locale, customDateFormatter?: DateFormatter | undefined) => DateFormatter;
/**
 * it two dates are in the same month
 */
export declare function isSameMonth(date1?: Date, date2?: Date): boolean;
/**
 * it two dates are in the same day
 */
export declare function isSameDay(date1?: Date, date2?: Date): boolean;
export declare function dayIsPartOfTheConditions(day: Date, condition: DateConditions, dateParser: DateParser, dateFormat: string): boolean;
export declare function dateIsOutOfRange(date: Date, min: Date | string | undefined, max: Date | string | undefined, dateParser?: DateParser | null, dateFormat?: string | null): boolean;
export declare function addDays(date: Date, amount?: number): Date;
export declare function addMonths(date: Date, amount?: number): Date;
export declare function addYears(date: Date, amount?: number): Date;
export declare function lastDayOfMonth(date: Date): Date;
