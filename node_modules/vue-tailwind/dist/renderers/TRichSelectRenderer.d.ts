import { CreateElement, VNode } from 'vue';
import TRichSelectInterface from '../types/TRichSelect';
import NormalizedOptions from '../types/NormalizedOptions';
import NormalizedOption from '../types/NormalizedOption';
export default class TRichSelectRenderer {
    createElement: CreateElement;
    component: TRichSelectInterface;
    constructor(createElement: CreateElement, component: TRichSelectInterface);
    render(): VNode;
    /**
     * Div that wraps the whole component
     */
    createWrapper(): VNode;
    /**
     * Div that wraps the button that is used as a select box
     */
    createSelectButtonWrapper(): VNode;
    /**
     * The button that is used a select box
     */
    createSelectButton(): VNode;
    createSelectButtonLabel(): VNode;
    createSelectButtonPlaceholder(): VNode;
    createSelectButtonIcon(): VNode[];
    createSelectButtonClearButton(): VNode;
    /**
     * Div that wraps the search box
     */
    createSearchBoxWrapper(): VNode;
    /**
     * Filter search box
     */
    createSearchBox(): VNode;
    getMinimumInputLengthText(): string;
    /**
     * The div used as dropdown with the options and the search box
     */
    createDropdown(): VNode;
    /**
     * Options list wrapper
     */
    createOptionsList(options: NormalizedOptions): VNode;
    /**
     * Dropdown feedback
     * @param text
     */
    createDropdownFeedback(text: string): VNode;
    /**
     * Dropdown feedback
     * @param text
     */
    createLoadingMoreResults(text: string): VNode;
    /**
     * List of options
     */
    createOptions(options: NormalizedOptions): VNode[];
    /**
     * Creates an optgroup element
     * @param option
     * @param index
     */
    createOptgroup(optgroup: NormalizedOption): VNode;
    /**
     * Builds an option element
     * @param option
     * @param index
     */
    createOption(option: NormalizedOption, index: number): VNode;
    createOptionContent(option: NormalizedOption, isSelected: boolean): VNode;
    createOptionLabel(option: NormalizedOption): VNode;
    createOptionSelectedIcon(): VNode;
}
