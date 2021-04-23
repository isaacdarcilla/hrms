<template>
  <div v-if="showing">
    <div class="fixed z-10 inset-0 overflow-y-auto">
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
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <div class="mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                <h3
                  class="text-lg leading-6 font-medium text-gray-900 capitalize"
                  id="modal-headline"
                >
                  ✏️ Edit {{ employeeId.first_name }} Government ID
                </h3>
                <form @submit.prevent="save" class="w-full max-w-lg pr-4 pt-5">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Name of ID <span class="text-red-600">*</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        :placeholder="government.government_issued_id"
                        v-model="form.government_issued_id"
                      />
                      <div v-if="$page.errors.government_issued_id !== null" class="form-error">
                        {{ $page.errors.government_issued_id }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >ID Number <span class="text-red-600">*</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        :placeholder="government.id_number"
                        v-model="form.id_number"
                      />
                      <div
                        v-if="$page.errors.id_number !== null"
                        class="form-error"
                      >
                        {{ $page.errors.id_number }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Date of Issuance <span class="text-red-600">*</span></label>
                      <v-date-picker v-model="form.date_of_issuance">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              :placeholder="format(government.date_of_issuance)"
                            />
                          </div>
                        </template>
                      </v-date-picker>
                      <div
                        v-if="$page.errors.date_of_issuance !== null"
                        class="form-error"
                      >
                        {{ $page.errors.date_of_issuance }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Place of Issuance<span class="text-red-600">*</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        :placeholder="government.place_of_issuance"
                        v-model="form.place_of_issuance"
                      />
                      <div
                        v-if="$page.errors.place_of_issuance !== null"
                        class="form-error"
                      >
                        {{ $page.errors.place_of_issuance }}
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
import { ToggleButton } from "vue-js-toggle-button";
import moment from "moment";

export default {
  components: {
    ToggleButton,
  },
  props: {
    modal: {
      default: false,
    },
    employee: String | Number,
    errors: Object,
    government: Object,
    showing: Boolean,
  },
  inject: ["employeeId"],
  directives: { mask },
  data() {
    return {
      sending: false,
      form: {
        government_issued_id: null,
        id_number: null,
        date_of_issuance: null,
        place_of_issuance: null,
      },
    };
  },
  methods: {
    save() {
      this.$inertia.put(
        this.route("ids.update", this.government.id),
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
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
  },
};
</script>
