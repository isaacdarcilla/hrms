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
                  ➕ Add Work Experience
                </h3>
                <form class="w-full max-w-lg pr-4 pt-5">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Name of Company
                        <span class="text-red-600">*</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter company name"
                        v-model="form.experiences_company"
                      />
                      <div
                        v-if="$page.errors.experiences_company !== null"
                        class="form-error"
                      >
                        {{ $page.errors.experiences_company }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Position <span class="text-red-600">*</span></label
                      >
                      <v-selectize
                        class="form-input block w-full"
                        :options="options"
                        :limit="10"
                        v-model="form.experiences_position"
                        placeholder="Type and select a position"
                      />
                      <div
                        v-if="$page.errors.experiences_position !== null"
                        class="form-error"
                      >
                        {{ $page.errors.experiences_position }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Monthly Salary
                        <span class="font-medium">&nbsp;</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter monthly salary"
                        v-model="form.experiences_monthly_salary"
                      />
                      <div
                        v-if="$page.errors.experiences_monthly_salary !== null"
                        class="form-error"
                      >
                        {{ $page.errors.experiences_monthly_salary }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Salary Grade
                        <span class="font-medium">&nbsp;</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter salary grade"
                        v-model="form.experiences_salary_grade"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.experiences_salary_grade !== null"
                        class="form-error"
                      >
                        {{ $page.errors.experiences_salary_grade }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Inclusive Date <span class="text-red-600">*</span>
                        <span class="font-medium">&nbsp;</span></label
                      >
                      <v-date-picker v-model="form.experiences_from">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              placeholder="Select start of work"
                            />
                          </div>
                        </template>
                      </v-date-picker>
                      <div
                        v-if="$page.errors.experiences_from !== null"
                        class="form-error"
                      >
                        {{ $page.errors.experiences_from }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Inclusive Date <span class="text-red-600">*</span>
                        <span class="font-medium">&nbsp;</span></label
                      >
                      <v-date-picker v-model="form.experiences_to">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              placeholder="Select end of work"
                            />
                          </div>
                        </template>
                      </v-date-picker>
                      <div
                        v-if="$page.errors.experiences_to !== null"
                        class="form-error"
                      >
                        {{ $page.errors.experiences_to }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Status of Appoinment
                        <span class="text-red-600">*</span></label
                      >
                      <select
                        v-model="form.experiences_status_of_appointment"
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
                        v-if="
                          $page.errors.experiences_status_of_appointment !==
                          null
                        "
                        class="form-error"
                      >
                        {{ $page.errors.experiences_status_of_appointment }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <toggle-button
                        :value="form.experiences_government"
                        :width="50"
                        :height="25"
                        :labels="{ checked: 'Yes', unchecked: 'No' }"
                        v-model="form.experiences_government"
                      /><span class="mx-2 font-semibold"
                        >Is this a government service?
                        <span class="text-red-600">*</span></span
                      >
                      <div
                        v-if="$page.errors.experiences_government !== null"
                        class="form-error"
                      >
                        {{ $page.errors.experiences_government }}
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
import VSelectize from "@isneezy/vue-selectize";
import { ToggleButton } from "vue-js-toggle-button";
import vSelect from "vue-select";
import moment from "moment";
import jobs from "./jobs.json";

export default {
  components: {
    ToggleButton,
    VSelectize,
    vSelect,
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
  name: "single-item-select",
  data() {
    return {
      options: jobs,
      sending: false,
      form: {
        contact_id: this.employee.id,
        experiences_from: null,
        experiences_to: null,
        experiences_position: null,
        experiences_company: null,
        experiences_monthly_salary: null,
        experiences_salary_grade: null,
        experiences_status_of_appointment: null,
        experiences_government: null,
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
      this.$inertia.post(this.route("experience.store"), this.form, {
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
