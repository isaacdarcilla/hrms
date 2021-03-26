/**
 * @description Returns the substring after a certain character in a string.
 * @param {'String'} string
 * @param {'String'} char
 */
export function getSubstringAfterChar (string, char) {
  return string.slice(string.indexOf(char) + 1)
}
