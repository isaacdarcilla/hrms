import CssClasses from './CssClasses';
import ComponentName from './ComponentName';
declare type ComponentVariants = {
    [key in ComponentName]: CssClasses;
};
export default ComponentVariants;
