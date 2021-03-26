<template>
  <div v-if="showing">
    <div class="fixed z-8 inset-0 overflow-y-auto">
      <div
        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
      >
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span
          class="hidden sm:inline-block sm:align-middle sm:h-screen"
          aria-hidden="true"
          >&#8203;</span
        >
        <div
          class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-4 sm:align-middle sm:max-w-lg sm:w-full"
          role="dialog"
          aria-modal="true"
          aria-labelledby="modal-headline"
        >
          <div class="bg-white px-4 py-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <div class="mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                <form class="py-5">
                  <div class="text-center">
                    <h1 class="text-4xl mb-3 animate-bounce">🦖</h1>
                    <p class="font-medium mb-4 text-center mx-8">
                      You have no internet connection. Reconnect to resume activity.
                      <span class="font-normal text-sm">(Esc)</span>
                    </p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    modal: {
      default: false,
    },
    showing: Boolean,
  },
  methods: {
    closeModal() {
      this.$emit("update:modal");
    },
  },
};
</script>
