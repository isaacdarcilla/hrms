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
                  class="text-lg leading-6 font-medium text-gray-900"
                  id="modal-headline"
                >
                  ➕ Add Civil Service Eligibility
                </h3>
                <form class="w-full max-w-lg pr-4 pt-5">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Name of Eligibility</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter eligibility name"
                        v-model="form.eligibility_name"
                      />
                      <div
                        v-if="$page.errors.eligibility_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.eligibility_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Place of Examination
                      </label>
                      <input
                        ref="birthday"
                        class="form-input block w-full"
                        placeholder="Enter examination place"
                        v-model="form.eligibility_place_of_exam"
                      />
                      <div
                        v-if="$page.errors.eligibility_place_of_exam !== null"
                        class="form-error"
                      >
                        {{ $page.errors.eligibility_place_of_exam }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Date of Examination
                      </label>
                      <v-date-picker v-model="form.eligibility_date_of_exam">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              placeholder="Select date of examination"
                            />
                          </div>
                        </template>
                      </v-date-picker>
                      <div
                        v-if="$page.errors.eligibility_date_of_exam !== null"
                        class="form-error"
                      >
                        {{ $page.errors.eligibility_date_of_exam }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Rating
                        <span class="font-medium">(Optional)</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter rating or score"
                        v-model="form.eligibility_rating"
                      />
                      <div
                        v-if="$page.errors.eligibility_rating !== null"
                        class="form-error"
                      >
                        {{ $page.errors.eligibility_rating }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >License Number
                        <span class="font-medium">(Optional)</span></label
                      >
                      <input
                        ref="birthday"
                        class="form-input block w-full"
                        placeholder="Enter license number"
                        type="tel"
                        v-model="form.eligibility_license_number"
                      />
                      <div
                        v-if="$page.errors.eligibility_license_number !== null"
                        class="form-error"
                      >
                        {{ $page.errors.eligibility_license_number }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Date of Expiration
                        <span class="font-medium">(Optional)</span>
                      </label>
                      <v-date-picker v-model="form.eligibility_license_expiration">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              placeholder="Select license expiration date"
                            />
                          </div>
                        </template>
                      </v-date-picker>
                      <div
                        v-if="
                          $page.errors.eligibility_license_expiration !== null
                        "
                        class="form-error"
                      >
                        {{ $page.errors.eligibility_license_expiration }}
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
import moment from "moment";

export default {
  props: {
    modal: {
      default: false,
    },
    employee: String | Number,
    errors: Object,
    showing: Boolean,
  },
  directives: { mask },
  data() {
    return {
      sending: false,
      form: {
        contact_id: this.employee.id,
        eligibility_name: null,
        eligibility_rating: null,
        eligibility_date_of_exam: null,
        eligibility_place_of_exam: null,
        eligibility_license_number: null,
        eligibility_license_expiration: null,
      },
    };
  },
  methods: {
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
    save() {
      this.$inertia.post(this.route("eligibility.store"), this.form, {
        onStart: () => (this.sending = true),
        onFinish: () => {
          this.sending = false;
        },
      });
    },
    closeModal() {
      this.$emit("update:modal");
      this.reset();
    },
    reset() {
      this.form.eligibility_name = null;
      this.form.eligibility_rating = null;
      this.form.eligibility_date_of_exam = null;
      this.form.eligibility_place_of_exam = null;
      this.form.eligibility_license_number = null;
      this.form.eligibility_license_expiration = null;
    },
  },
};
</script>
