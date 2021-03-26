import ComponentSettings, { VTComponent } from './ComponentSettings';
declare type LibrarySettings = {
    [key: string]: ComponentSettings | VTComponent;
} | undefined;
export default LibrarySettings;
