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
                  📤 Apply for Leave
                </h3>
                <form class="w-full max-w-lg pr-4 pt-5">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">First Name</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter first name"
                        v-model="form.first_name"
                      />
                      <div
                        v-if="$page.errors.first_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.first_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Last Name</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter last name"
                        v-model="form.last_name"
                      />
                      <div
                        v-if="$page.errors.last_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.last_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Middle Initial</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter middle initial"
                        v-model="form.middle_initial"
                      />
                      <div
                        v-if="$page.errors.middle_initial !== null"
                        class="form-error"
                      >
                        {{ $page.errors.middle_initial }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Agency/Office</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter agency or office"
                        v-model="form.agency"
                      />
                      <div
                        v-if="$page.errors.agency !== null"
                        class="form-error"
                      >
                        {{ $page.errors.agency }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Position</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full capitalize"
                        placeholder="Enter position"
                        v-model="form.position"
                      />
                      <div
                        v-if="$page.errors.position !== null"
                        class="form-error"
                      >
                        {{ $page.errors.position }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Monthly Salary</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter monthly salary"
                        v-model="form.monthly_salary"
                      />
                      <div
                        v-if="$page.errors.monthly_salary !== null"
                        class="form-error"
                      >
                        {{ $page.errors.monthly_salary }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Date of Filing <span class="font-medium">(Auto-filled)</span></label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter date of filing"
                        v-model="form.date_of_filing"
                        readonly
                      />
                      <div
                        v-if="$page.errors.date_of_filing !== null"
                        class="form-error"
                      >
                        {{ $page.errors.date_of_filing }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Number of Working Days</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter number of working days"
                        v-model="form.number_of_working_days"
                      />
                      <div
                        v-if="$page.errors.number_of_working_days !== null"
                        class="form-error"
                      >
                        {{ $page.errors.number_of_working_days }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Inclusive Date <span class="font-medium">(Start)</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter start of inclusive date"
                        v-model="form.start_of_inclusive_date"
                        v-mask="'##/##/####'"
                      />
                      <div
                        v-if="$page.errors.start_of_inclusive_date !== null"
                        class="form-error"
                      >
                        {{ $page.errors.start_of_inclusive_date }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Inclusive Date <span class="font-medium">(End)</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter end of inclusive date"
                        v-model="form.end_of_inclusive_date"
                        v-mask="'##/##/####'"
                      />
                      <div
                        v-if="$page.errors.end_of_inclusive_date !== null"
                        class="form-error"
                      >
                        {{ $page.errors.end_of_inclusive_date }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Type of Leave</label>
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.type_of_leave"
                        value="Vacation"
                        @click="type = null"
                      />
                      Vacation
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.type_of_leave"
                        value="CTO"
                        @click="type = null"
                      />
                      CTO
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.type_of_leave"
                        value="SPL"
                        @click="type = null"
                      />
                      SPL
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.type_of_leave"
                        value="FL"
                        @click="type = null"
                      />
                      FL
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.type_of_leave"
                        value="Sick"
                        @click="type = null"
                      />
                      Sick
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.type_of_leave"
                        value="Maternity"
                        @click="type = null"
                      />
                      Maternity
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="type"
                        value="1"
                      />
                      Others (Specify)
                      <div class="pt-3">
                        <input
                          v-if="showLeave"
                          autofocus="true"
                          class="form-input block w-full"
                          placeholder="Please specify the type of leave"
                          v-model="form.type_of_leave"
                        />
                      </div>
                      <div
                        v-if="$page.errors.type_of_leave !== null"
                        class="form-error"
                      >
                        {{ $page.errors.type_of_leave }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Where Leave Will Be Spent
                        <span class="font-medium"
                          >(In case of vacation leave)</span
                        ></label
                      >
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.vacation_leave_location"
                        value="Within the Philippines"
                        @click="vacationLocation = null"
                      />
                      Within the Philippines
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="vacationLocation"
                        value="1"
                      />
                      Abroad (Specify)
                      <div class="pt-3">
                        <input
                          v-if="showLocation"
                          autofocus="true"
                          class="form-input block w-full"
                          placeholder="Please specify the vacation location"
                          v-model="form.vacation_leave_location"
                        />
                      </div>
                      <div
                        v-if="$page.errors.vacation_leave_location !== null"
                        class="form-error"
                      >
                        {{ $page.errors.vacation_leave_location }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Where Leave Will Be Spent
                        <span class="font-medium"
                          >(In case of sick leave)</span
                        ></label
                      >
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="inHospital"
                        value="inhospital"
                      />
                      In Hospital
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="inHospital"
                        value="outpatient"
                      />
                      Out Patient
                      <div class="pt-3">
                        <input
                          v-if="showHospital"
                          autofocus="true"
                          class="form-input block w-full"
                          placeholder="Please specify the sick leave location"
                          v-model="hospital"
                        />
                      </div>
                      <div
                        v-if="$page.errors.sick_leave_location !== null"
                        class="form-error"
                      >
                        {{ $page.errors.sick_leave_location }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Commutation</label
                      >
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.commutation"
                        value="Requested"
                      />
                      Requested
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.commutation"
                        value="Not Requested"
                      />
                      Not Requested
                      <div
                        v-if="$page.errors.commutation !== null"
                        class="form-error"
                      >
                        {{ $page.errors.commutation }}
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
                @click="save"
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
    errors: Object,
    showing: Boolean,
  },
  directives: { mask },
  watch: {
    type(e) {
      e === "1" ? (this.showLeave = true) : (this.showLeave = false);
      this.form.type_of_leave = null;
    },
    vacationLocation(e) {
      e === "1" ? (this.showLocation = true) : (this.showLocation = false);
      this.form.vacation_leave_location = null;
    },
    inHospital(e) {
      e === "inhospital" || e === "outpatient"
        ? (this.showHospital = true)
        : (this.showHospital = false);

      e === "inhospital"
        ? (this.option = "inhospital")
        : (this.option = "outpatient");
    },
  },
  data() {
    return {
      sending: false,
      option: null,
      showLeave: false,
      type: null,
      vacationLocation: null,
      showLocation: false,
      inHospital: null,
      outPatient: null,
      showHospital: false,
      hospital: null,
      form: {
        agency: "Catanduanes State University",
        last_name: this.$page.employee.last_name,
        first_name: this.$page.employee.first_name,
        middle_initial: null,
        date_of_filing: moment().format("MMMM D, YYYY"),
        position: this.$page.employee.position,
        monthly_salary: null,
        type_of_leave: null,
        vacation_leave_location: null,
        sick_leave_location: null,
        number_of_working_days: null,
        start_of_inclusive_date: null,
        end_of_inclusive_date: null,
        commutation: null,
        certification_of_leave_credits: null,
        recommendation: null,
        approved_for: null,
        disapproved_due_to: null,
        officer_in_charge_name: null,
        officer_in_charge_position: null,
        office: null,
      },
    };
  },
  methods: {
    save() {
      this.form.sick_leave_location = `${this.option}::${this.hospital}`;
    },
    closeModal() {
      this.$emit("update:modal");
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
  },
};
</script>
