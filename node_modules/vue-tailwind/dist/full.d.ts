import { PluginFunction } from 'vue';
import ComponentName from './types/ComponentName';
import { CustomProp } from './types/ComponentSettings';
interface InstallFunction extends PluginFunction<AllComponentsSettings> {
    installed?: boolean;
}
declare type AllComponentsSettings = {
    [name in ComponentName]: CustomProp;
};
declare const plugin: {
    install: InstallFunction;
};
export default plugin;
