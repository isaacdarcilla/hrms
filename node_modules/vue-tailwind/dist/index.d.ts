import { PluginFunction } from 'vue';
import LibrarySettings from './types/LibrarySettings';
export interface InstallFunction extends PluginFunction<LibrarySettings> {
    installed?: boolean;
}
declare const plugin: {
    install: InstallFunction;
};
export default plugin;
