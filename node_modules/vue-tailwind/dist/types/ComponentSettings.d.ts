import Vue, { PropOptions } from 'vue';
import ComponentName from './ComponentName';
export declare type CustomProp = {
    [key: string]: undefined | string | number | boolean | Array<CustomProp> | (() => CustomProp) | CustomProp;
};
export declare type VTComponent = typeof Vue & {
    options?: {
        props?: {
            [key: string]: PropOptions;
        };
        name: ComponentName;
    };
};
declare type ComponentSettings = {
    component: VTComponent;
    props: CustomProp;
};
export default ComponentSettings;
