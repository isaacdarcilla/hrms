/**
 * Generates unique Id. If no length parameter is passed then it defaults to 4 alphanumeric charaters
 * @param {Number} length Length of the Id to be generated
 */
export function useId (length = 4) {
  let uuid = ''
  const dictionary = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'
  for (let i = 0; i < length; i++) {
    uuid += dictionary.charAt(Math.floor(Math.random() * dictionary.length))
  }
  return uuid
}

/**
 * Chains function arguments passed.
 * @param  {...Function} funcs Functions to be chained
 */
export function createChainedFunction (...funcs) {
  return funcs.reduce(
    (acc, func) => {
      if (func == null) {
        return acc
      }

      return function chainedFunction (...args) {
        acc.apply(this, args)
        func.apply(this, args)
      }
    },
    () => {}
  )
}
