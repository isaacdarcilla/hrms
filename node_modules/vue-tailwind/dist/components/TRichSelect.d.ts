/// <reference types="node" />
import { CreateElement, VNode } from 'vue';
import InputOptions from '../types/InputOptions';
import NormalizedOption from '../types/NormalizedOption';
import NormalizedOptions from '../types/NormalizedOptions';
declare type AjaxResults = Promise<{
    results: InputOptions;
    hasMorePages?: boolean;
}>;
declare const TRichSelect: import("vue/types/vue").ExtendedVue<{
    value: any;
    multiple: boolean;
} & {
    localValue: any;
} & {
    normalizeOptions(options: InputOptions): NormalizedOptions;
} & {
    normalizedOptions: NormalizedOptions;
    flattenedOptions: NormalizedOptions;
} & {
    value: any;
    valueAttribute: string;
    textAttribute: string;
    options: any;
} & {
    getListeners(listeners: {
        [key: string]: Function | Function[];
    } | undefined): {
        [key: string]: Function | Function[];
    } | undefined;
} & {
    id: string;
    name: string;
    disabled: boolean;
    readonly: boolean;
    autofocus: boolean;
    required: boolean;
    tabindex: string | number;
} & {
    getElementCssClass(elementName?: string | undefined, defaultClasses?: import("../types/CssClass").default): import("../types/CssClass").default;
} & {
    componentClass: import("../types/CssClass").default;
    activeVariant: string | undefined;
} & {
    classes: any;
    fixedClasses: any;
    variants: any;
    variant: any;
} & import("vue").default, {
    hasFocus: boolean;
    show: boolean;
    localValue: string | number | boolean | symbol | (string | number | boolean | symbol | null)[] | null;
    highlighted: number | null;
    query: string;
    filteredOptions: NormalizedOptions;
    selectedOption: NormalizedOption | undefined;
    selectedOptions: NormalizedOption[];
    searching: boolean;
    delayTimeout: NodeJS.Timeout | undefined;
    nextPage: number | undefined;
    tagsAreFocusable: boolean;
}, {
    findOptionByValue(value: string | number | boolean | symbol | null): undefined | NormalizedOption;
    optionHasValue(option: NormalizedOption, value: string | number | boolean | symbol | null): boolean;
    createSelect(createElement: CreateElement): VNode;
    filterOptions(query: string): Promise<void>;
    getFilterPromise(query: string): AjaxResults;
    listEndReached(): void;
    queryFilter(options: NormalizedOptions): NormalizedOptions;
    hideOptions(): void;
    showOptions(): void;
    toggleOptions(): void;
    focusSearchBox(): Promise<void>;
    blurHandler(e: FocusEvent): void;
    focusHandler(e: FocusEvent): void;
    clickHandler(e: MouseEvent): void;
    findNextOptionIndex(currentOptionIndex?: null | number): number;
    findPrevOptionIndex(currentOptionIndex: null | number): number;
    arrowUpHandler(e: KeyboardEvent): Promise<void>;
    arrowDownHandler(e: KeyboardEvent): void;
    listScrollHandler(e: Event): void;
    scrollToHighlightedOption(behavior?: 'auto' | 'smooth'): void;
    escapeHandler(e: KeyboardEvent): void;
    enterHandler(e: KeyboardEvent): void;
    searchInputHandler(e: Event): void;
    getButton(): HTMLButtonElement;
    getTagsContainer(): HTMLButtonElement;
    getSearchBox(): HTMLInputElement;
    selectOption(option: NormalizedOption, focus?: boolean): Promise<void>;
    unselectOptionAtIndex(index: number): void;
    clearButtonClickHandler(e: MouseEvent): void;
    blur(): void;
    focus(options?: FocusOptions | undefined): void;
    selectTag(tag: HTMLButtonElement): Promise<void>;
    unselectTag(): Promise<void>;
}, {
    usesAJax: boolean;
    shouldShowSearchbox: boolean;
    hasMinimumInputLength: boolean;
    filteredflattenedOptions: NormalizedOptions;
    atLeastOneValidOptionExists: boolean;
    normalizedHeight: string;
    selectedOptionIndex: number | undefined;
    highlightedOption: NormalizedOption | undefined;
}, {
    delay: number;
    fetchOptions: Function;
    minimumResultsForSearch: number;
    minimumInputLength: number;
    minimumInputLengthText: TimerHandler;
    hideSearchBox: boolean;
    openOnFocus: boolean;
    closeOnSelect: boolean;
    selectOnClose: boolean;
    clearable: boolean;
    multiple: boolean;
    placeholder: string;
    searchBoxPlaceholder: string;
    noResultsText: string;
    searchingText: string;
    loadingMoreResultsText: string;
    maxHeight: string | number;
    fixedClasses: any;
    classes: any;
}>;
export default TRichSelect;
