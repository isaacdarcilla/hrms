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
                  ➕ Create Service Record
                </h3>
                <form class="w-full max-w-lg pr-4 pt-5">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Inclusive Date <span class="text-red-600">*</span>
                        <span class="font-medium">&nbsp;</span></label
                      >
                      <v-date-picker v-model="form.service_start">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              placeholder="Select start date of service"
                            />
                          </div>
                        </template>
                      </v-date-picker>
                      <div
                        v-if="$page.errors.service_start !== null"
                        class="form-error"
                      >
                        {{ $page.errors.service_start }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Inclusive Date <span class="text-red-600">*</span>
                        <span class="font-medium">&nbsp;</span></label
                      >
                      <v-date-picker v-model="form.service_end">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              placeholder="Select end date of service"
                            />
                          </div>
                        </template>
                      </v-date-picker>
                      <div
                        v-if="$page.errors.service_end !== null"
                        class="form-error"
                      >
                        {{ $page.errors.service_end }}
                      </div>
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Designation <span class="text-red-600">*</span></label
                      >
                      <select
                        v-model="form.designation"
                        class="form-input block w-full appearance-none"
                      >
                        <option disabled selected>Please select status</option>
                        <option value="Job Order">Job Order</option>
                        <option value="Contractual">Contractual</option>
                        <option value="Permanent">Permanent</option>
                        <option value="Full-time">Full-time</option>
                        <option value="Casual">Casual</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Temporary">Temporary</option>
                        <option value="Contract of Service">
                          Contract of Service
                        </option>
                      </select>

                      <div
                        v-if="$page.errors.designation !== null"
                        class="form-error"
                      >
                        {{ $page.errors.designation }}
                      </div>
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Status <span class="text-red-600">*</span></label
                      >
                      <select
                        v-model="form.status"
                        class="form-input block w-full appearance-none"
                      >
                        <option disabled selected>Please select status</option>
                        <option value="Job Order">Job Order</option>
                        <option value="Contractual">Contractual</option>
                        <option value="Permanent">Permanent</option>
                        <option value="Full-time">Full-time</option>
                        <option value="Casual">Casual</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Temporary">Temporary</option>
                        <option value="Contract of Service">
                          Contract of Service
                        </option>
                      </select>

                      <div
                        v-if="$page.errors.status !== null"
                        class="form-error"
                      >
                        {{ $page.errors.status }}
                      </div>
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Salary <span class="text-red-600">*</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter salary"
                        v-model="form.salary"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.salary !== null"
                        class="form-error"
                      >
                        {{ $page.errors.salary }}
                      </div>
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Station/Place <span class="text-red-600">*</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter station or place"
                        v-model="form.station_or_place"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.station_or_place !== null"
                        class="form-error"
                      >
                        {{ $page.errors.station_or_place }}
                      </div>
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Office Branch <span class="text-red-600">*</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter office branch"
                        v-model="form.branch"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.branch !== null"
                        class="form-error"
                      >
                        {{ $page.errors.branch }}
                      </div>
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >LV/ABS W/O Pay <span class="text-red-600">*</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter pay"
                        v-model="form.pay"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.pay !== null"
                        class="form-error"
                      >
                        {{ $page.errors.pay }}
                      </div>
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Separation Date <span class="text-red-600">*</span>
                        <span class="font-medium">&nbsp;</span></label
                      >
                      <v-date-picker v-model="form.separation_date">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              placeholder="Select separation date"
                            />
                          </div>
                        </template>
                      </v-date-picker>
                      <div
                        v-if="$page.errors.separation_date !== null"
                        class="form-error"
                      >
                        {{ $page.errors.separation_date }}
                      </div>
                    </div>
                  </div>

                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Separation Cause <span class="text-red-600">*</span></label
                      >
                      <textarea
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter separation cause"
                        v-model="form.separation_cause"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.separation_cause !== null"
                        class="form-error"
                      >
                        {{ $page.errors.separation_cause }}
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
    showing: Boolean,
  },
  directives: { mask },
  data() {
    return {
      sending: false,
      form: {
        contact_id: this.employee.id,
        user_id: this.$page.auth.user.id,
        service_start: null,
        service_end: null,
        designation: null,
        status: null,
        salary: null,
        station_or_place: null,
        branch: null,
        pay: null,
        separation_date: null,
        separation_cause: null,
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
      this.$inertia.post(this.route("service.record.store"), this.form, {
        onStart: () => (this.sending = true),
        onFinish: () => (this.sending = false),
      });
    },
    closeModal() {
      this.$emit("update:modal");
      this.reset();
    },
    reset() {
      this.form.experiences_from = null;
      this.form.experiences_to = null;
      this.form.experiences_position = null;
      this.form.experiences_company = null;
      this.form.experiences_monthly_salary = null;
      this.form.experiences_salary_grade = null;
      this.form.experiences_status_of_appointment = null;
      this.form.experiences_government = null;
    },
  },
};
</script>
