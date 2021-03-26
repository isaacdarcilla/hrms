import CssClass from './CssClass';
declare type CssClasses = {
    [k: string]: CssClass;
} | CssClass | undefined;
export default CssClasses;
