export const canUseDOM = !!(
  typeof window !== 'undefined' &&
  window.document &&
  window.document.createElement
)

export const HTMLElement =
  canUseDOM
    ? window.HTMLElement
    : Object

export const isVueComponent = (value) => {
  return (!!value && !!value.$el)
}
