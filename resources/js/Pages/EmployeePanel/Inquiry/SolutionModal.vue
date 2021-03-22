<template>
  <div v-if="showing">
    <div class="fixed z-10 inset-0 overflow-y-auto my-auto">
      <div
        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 justify-items-center text-center sm:block sm:p-0"
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
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <div class="mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                <h3
                  class="text-lg leading-6 font-medium text-gray-900"
                  id="modal-headline"
                >
                  🎫 Inquiry Solution
                </h3>
                <form class="w-full pr-3 pt-5">
                  <div class="text-semibold flex">
                    <span class="pr-2"
                      ><svg
                        class="w-5 h-5 text-yellow-500"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z"
                        ></path></svg
                    ></span>
                    <span>{{ reply.reply }}</span>
                  </div>
                  <div class="text-semibold text-sm px-6 pt-4">
                    <p class="pl-1">Posted on {{ format(reply.updated_at) }}</p>
                  </div>
                  <div v-if="inquiry.resolved === '0'">
                    <div class="font-bold text-sm px-6 py-4">
                      <p class="pl-1">Was this information helpful?</p>
                    </div>
                    <div class="flex pl-6">
                      <div
                        @click="submit('Yes')"
                        title="Yes"
                        class="pl-1 cursor-pointer"
                      >
                        <svg
                          class="w-6 h-6 text-gray-600"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"
                          ></path>
                        </svg>
                      </div>
                      <div
                        @click="submit('No')"
                        title="No"
                        class="mx-3 cursor-pointer"
                      >
                        <svg
                          class="w-6 h-6 text-gray-600"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M18 9.5a1.5 1.5 0 11-3 0v-6a1.5 1.5 0 013 0v6zM14 9.667v-5.43a2 2 0 00-1.105-1.79l-.05-.025A4 4 0 0011.055 2H5.64a2 2 0 00-1.962 1.608l-1.2 6A2 2 0 004.44 12H8v4a2 2 0 002 2 1 1 0 001-1v-.667a4 4 0 01.8-2.4l1.4-1.866a4 4 0 00.8-2.4z"
                          ></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                  <div v-else class="pl-1">
                    <div class="font-semibold text-sm px-6 py-4">
                      Thank you for the feedback!
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="pr-4 pb-4">
            <div
              class="bg-gray-50 px-4 pb-3 sm:px-6 sm:flex sm:flex-row-reverse"
            >
              <button
                :disabled="sending"
                type="button"
                @click="closeModal"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
              >
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mask } from "vue-the-mask";
import { ToggleButton } from "vue-js-toggle-button";
import moment from "moment";
import mapValues from "lodash/mapValues";

export default {
  components: {
    ToggleButton,
  },
  props: {
    modal: {
      default: false,
    },
    errors: Object,
    reply: Object,
    inquiry: Object,
    showing: Boolean,
  },
  inject: ["inquiries"],
  data() {
    return {
      sending: false,
      form: {
        resolved: null,
      },
    };
  },
  watch: {
    form: {
      handler(e) {
        console.log(e.resolved);
      },
      deep: true,
    },
  },
  methods: {
    submit(option) {
      option === "Yes"
        ? (this.form.resolved = true)
        : (this.form.resolved = false);

      this.$inertia.put(
        this.route("employee.inquiry.resolve", this.inquiry.id),
        this.form,
        {
          onStart: () => (this.sending = true),
          onFinish: () => (this.sending = false),
        }
      );
    },
    closeModal() {
      this.$emit("update:modal");
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY h:mm A");
      }
    },
  },
};
</script>
