import NormalizedOption from '../types/NormalizedOption';
import InputOptions from '../types/InputOptions';
import NormalizedOptions from '../types/NormalizedOptions';
import InputOption from '../types/InputOption';
declare const guessOptionValue: (option: InputOption, valueAttribute?: string | undefined) => string | symbol | null;
declare const guessOptionText: (option: InputOption, textAttribute?: string | undefined) => string;
declare const normalizeOption: (option: InputOption, textAttribute?: string | undefined, valueAttribute?: string | undefined) => NormalizedOption;
declare const normalizeOptions: (options: InputOptions, textAttribute?: string | undefined, valueAttribute?: string | undefined) => NormalizedOptions;
export { guessOptionValue, guessOptionText, normalizeOption, normalizeOptions, };
