<template>
  <div v-if="showing">
    <div class="fixed z-10 inset-0 overflow-y-auto">
      <div
        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-0 text-center sm:block sm:p-0"
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
          class="inline-block align-bottom bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-4 sm:align-middle sm:max-w-lg sm:w-full"
          role="dialog"
          aria-modal="true"
          aria-labelledby="modal-headline"
        >
          <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <div class="mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                <form class="w-full max-w-lg pr-4 pt-5">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Approve #{{ id.leave_number }} Leave</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter the number of leave credits to be subtracted"
                        v-model="form.credit_to_be_subtracted"
                      />
                      <div
                        v-if="$page.errors.credit_to_be_subtracted !== null"
                        class="form-error"
                      >
                        {{ $page.errors.credit_to_be_subtracted }}
                      </div>
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
                @click.prevent="save"
                type="button"
                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm hover:bg-yellow-700"
              >
                {{ sending ? "Saving..." : "Save" }}
              </button>
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
import mapValues from "lodash/mapValues";
import moment from "moment";

export default {
  props: {
    modal: {
      default: false,
    },
    id: Object,
    showing: Boolean,
  },
  directives: { mask },
  data() {
    return {
      sending: false,
      form: {
        contact_id: null,
        leave_number: null,
        leave_type: null,
        credit_to_be_subtracted: null,
      },
    };
  },
  watch: {
    id: {
      immediate: true,
      handler(e) {
        if (e !== null) {
          this.form.contact_id = e.contact_id;
          this.form.leave_number = e.leave_number;
          this.form.leave_type = e.type_of_leave;
        }
      },
    },
  },
  methods: {
    save() {
      this.$inertia.put(this.route("leaves.approve", this.id.id), this.form, {
        onStart: () => (this.sending = true),
        onFinish: () => (this.sending = false),
      });
    },
    closeModal() {
      this.$emit("update:modal");
      this.reset();
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
  },
};
</script>
