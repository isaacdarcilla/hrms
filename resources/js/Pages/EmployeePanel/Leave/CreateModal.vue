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
                <div
                  v-if="totals.sick === 0"
                  class="text-yellow-600 mt-4 font-semibold"
                >
                  You don't have enough Sick leave credits. Sick and other leave
                  option is disabled for the meantime, you can go to HRM
                  Services for help.
                </div>
                <div
                  v-if="totals.vacation === 0"
                  class="text-yellow-600 mt-4 font-semibold"
                >
                  You don't have enough Vacation leave credits. Vacation and
                  other leave option is disabled for the meantime, you can go to
                  HRM Services for help.
                </div>
                <form class="w-full max-w-lg pr-4 pt-5">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Agency/Office
                        <span class="text-red-600">*</span></label
                      >
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
                      <label class="form-label font-bold"
                        >Monthly Salary
                        <span class="text-red-600">*</span></label
                      >
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
                      <label class="form-label font-bold"
                        >Date of Filing
                        <span class="text-red-600">*</span></label
                      >
                      <v-date-picker v-model="form.date_of_filing">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              placeholder="Select date of filing"
                            />
                          </div>
                        </template>
                      </v-date-picker>
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
                        @blur="getDays"
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter number of working days"
                        v-model="form.number_of_working_days"
                        type="tel"
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
                      <div class="flex justify-between">
                        <label class="form-label font-bold"
                          >Inclusive Dates
                          <span class="text-red-600">*</span></label
                        >
                        <label
                          v-if="!form.manual"
                          @click="
                            switchTo();
                            form.start_of_inclusive_date = [];
                          "
                          class="form-label text-blue-600 cursor-pointer"
                          >Manual Date Input</label
                        >
                        <label
                          v-else
                          @click="
                            form.manual = false;
                            form.start_of_inclusive_date = [];
                          "
                          class="form-label text-blue-600 cursor-pointer"
                          >Switch Back</label
                        >
                      </div>
                      <div
                        v-if="!form.manual"
                        class="bg-white p-1 w-full border rounded"
                      >
                        <v-date-picker v-model="selected.date">
                          <template #default="{ togglePopover, hidePopover }">
                            <div class="flex flex-wrap">
                              <button
                                v-for="date in form.start_of_inclusive_date"
                                :key="date.id"
                                class="flex items-center bg-indigo-100 hover:bg-indigo-200 text-sm text-indigo-600 font-semibold h-8 px-2 m-1 rounded-lg border-2 border-transparent focus:border-indigo-600 focus:outline-none"
                                @click.stop="
                                  dateSelected($event, date, togglePopover)
                                "
                                ref="button"
                                type="button"
                              >
                                {{ format(date.date) }}
                                <svg
                                  class="w-4 h-4 text-gray-600 hover:text-indigo-600 ml-1 -mr-1"
                                  viewBox="0 0 24 24"
                                  stroke="currentColor"
                                  stroke-width="2"
                                  @click.stop="removeDate(date, hidePopover)"
                                >
                                  <path d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                              </button>
                            </div>
                          </template>
                        </v-date-picker>
                        <button
                          :disabled="disableSelection"
                          type="button"
                          :class="
                            disableSelection
                              ? 'text-sm text-gray-500 font-semibold px-2 h-8 focus:outline-none'
                              : 'text-sm text-indigo-600 font-semibold hover:text-indigo-500 px-2 h-8 focus:outline-none'
                          "
                          @click.stop="addDate"
                        >
                          + Add date
                        </button>
                      </div>
                      <div v-else>
                        <input
                          @blur="handleBlur"
                          autofocus="true"
                          class="form-input block w-full"
                          placeholder="Enter inclusive date"
                          type="text"
                        />
                      </div>
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
                        >Type of Leave
                        <span class="text-red-600">*</span></label
                      >
                      <input
                        :disabled="totals.vacation === 0"
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.type_of_leave"
                        value="Vacation"
                        @click="type = null"
                      />
                      Vacation Leave
                      <input
                        :disabled="totals.sick === 0"
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.type_of_leave"
                        value="Sick"
                        @click="type = null"
                      />
                      Sick Leave
                      <input
                        :disabled="totals.sick === 0 || totals.vacation === 0"
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="type"
                        value="1"
                      />
                      Others (Specify)
                      <div class="pt-3">
                        <select
                          v-if="showLeave"
                          v-model="form.type_of_leave"
                          class="form-input block w-full appearance-none"
                        >
                          <option disabled selected>
                            Please select other type
                          </option>
                          <option value="FL">Force Leave</option>
                          <option value="Maternity">Maternity Leave</option>
                          <option value="SPL">Solo Parent Leave</option>
                          <option value="Terminal Leave">Terminal Leave</option>
                          <option value="Monetization">
                            Monetization Leave
                          </option>
                          <option value="Study Leave">Study Leave</option>
                          <option value="Paternity Leave">
                            Paternity Leave
                          </option>
                          <option value="CTO">
                            Compensatory Time Off Leave
                          </option>
                          <option value="10-Day VAWC Leave">
                            10-Day VAWC Leave (R.A. 9262)
                          </option>
                          <option value="Special Privilege Leave">
                            Special Privilege Leave
                          </option>
                          <option value="Rehabilitaion Privilege">
                            Rehabilitaion Privilege
                          </option>
                          <option value="Special Leave Benefits for Women">
                            Special Leave Benefits for Women
                          </option>
                          <option value="Special Emergency Leave">
                            Special Emergency Leave
                          </option>
                          <option value="Adoption Leave">Adoption Leave</option>
                        </select>
                      </div>
                      <div
                        v-if="$page.errors.type_of_leave !== null"
                        class="form-error"
                      >
                        {{ $page.errors.type_of_leave }}
                      </div>
                    </div>
                  </div>
                  <div v-if="showVacation" class="flex flex-wrap -mx-3 mb-6">
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
                  <div v-if="showSick" class="flex flex-wrap -mx-3 mb-6">
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
                  <div v-if="showWomen" class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >In case of Special Leave Benefits for Women</label
                      >
                      <div class="pt-3">
                        <input
                          autofocus="true"
                          class="form-input block w-full"
                          placeholder="Please specify illness"
                          v-model="form.special_leave_benefits_for_women"
                        />
                      </div>
                    </div>
                  </div>
                  <div v-if="showStudy" class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >In case of Study Leave</label
                      >
                      <div class="pt-3">
                        <input
                          type="radio"
                          class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                          v-model="form.study_leave_location"
                          value="Completion of Master's Degree"
                        />
                        Completion of Master's Degree
                        <input
                          type="radio"
                          class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                          v-model="form.study_leave_location"
                          value="BAR/Board Examination Review"
                        />
                        BAR/Board Examination Review
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Commutation <span class="font-medium"></span
                      ></label>
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
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Other Purpose <span class="font-medium"></span
                      ></label>
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.other_purpose"
                        value="Monetization of Leave Credits"
                      />
                      Monetization of Leave Credits
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.other_purpose"
                        value="Terminal Leave"
                      />
                      Terminal Leave
                    </div>
                  </div>
                  <div v-if="$page.setting.employee === null">
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-2 flex">
                        <svg
                          class="w-5 h-5 text-blue-600"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"
                          ></path>
                        </svg>
                        <label
                          class="ml-1 form-label font-semibold text-blue-600"
                          >Fill the box below, you will be not ask again once
                          filled.</label
                        >
                      </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="form-label font-bold"
                          >Officer in Charge in your Department</label
                        >
                        <input
                          autofocus="true"
                          class="form-input block w-full"
                          placeholder="Enter officer in charge full name"
                          v-model="form.officer_in_charge"
                        />
                        <div
                          v-if="$page.errors.officer_in_charge !== null"
                          class="form-error"
                        >
                          {{ $page.errors.officer_in_charge }}
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="form-label font-bold"
                          >Officer in Charge Position</label
                        >
                        <input
                          autofocus="true"
                          class="form-input block w-full"
                          placeholder="Enter officer in charge position"
                          v-model="form.officer_in_charge_position"
                        />
                        <div
                          v-if="
                            $page.errors.officer_in_charge_position !== null
                          "
                          class="form-error"
                        >
                          {{ $page.errors.officer_in_charge_position }}
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                      <div class="w-full px-3">
                        <label class="form-label font-bold"
                          >Department or Office</label
                        >
                        <input
                          autofocus="true"
                          class="form-input block w-full"
                          placeholder="Enter department or office"
                          v-model="form.department"
                        />
                        <div
                          v-if="$page.errors.department !== null"
                          class="form-error"
                        >
                          {{ $page.errors.department }}
                        </div>
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
    showing: Boolean,
    totals: Object,
  },
  inject: ["totals"],
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
    form: {
      deep: true,
      handler(e) {
        if (e.type_of_leave === "Vacation") {
          this.showVacation = true;
          this.showSick = false;
        } else if (e.type_of_leave === "Sick") {
          this.showSick = true;
          this.showVacation = false;
        } else {
          this.showVacation = false;
          this.showSick = false;
        }

        if (e.type_of_leave === "Special Leave Benefits for Women") {
          console.log("Special Leave Benefits for Women");
          this.showWomen = true;
        } else {
          this.showWomen = false;
        }

        if (e.type_of_leave === "Study Leave") {
          console.log("Study Leave");
          this.showStudy = true;
        } else {
          this.showStudy = false;
        }

        e.number_of_working_days !== null &&
        e.number_of_working_days !== "" &&
        parseInt(e.number_of_working_days) !== e.start_of_inclusive_date.length
          ? (this.disableSelection = false)
          : (this.disableSelection = true);
      },
    },
  },
  data() {
    return {
      disableSelection: true,
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
      showVacation: false,
      showSick: false,
      showWomen: false,
      showStudy: false,
      selected: {},
      start_of_inclusive_date: null,
      form: {
        manual: false,
        contact_id: this.$page.employee.id,
        leave_number: null,
        agency: "Catanduanes State University",
        last_name: this.$page.employee.last_name,
        first_name: this.$page.employee.first_name,
        middle_initial: this.$page.employee.middle_name.charAt(0),
        date_of_filing: null,
        position: this.$page.employee.position,
        monthly_salary: null,
        type_of_leave: null,
        vacation_leave_location: null,
        sick_leave_location: null,
        special_leave_benefits_for_women: null,
        study_leave_location: null,
        other_purpose: null,
        number_of_working_days: null,
        start_of_inclusive_date: [],
        end_of_inclusive_date: null,
        commutation: null,
        officer_in_charge:
          this.$page.setting.employee !== null
            ? this.$page.setting.employee.officer_in_charge
            : null,
        officer_in_charge_position:
          this.$page.setting.employee !== null
            ? this.$page.setting.employee.officer_in_charge_position
            : null,
        department:
          this.$page.setting.employee !== null
            ? this.$page.setting.employee.department
            : null,
      },
    };
  },
  methods: {
    getDays(e) {
      e.target.value >= 5
        ? (this.form.manual = true)
        : (this.form.manual = false);
    },
    handleBlur(e) {
      console.log(e.target.value);
      if (this.form.start_of_inclusive_date.length >= 1) {
        this.form.start_of_inclusive_date.pop();
      }
      this.form.start_of_inclusive_date.push({ date: e.target.value });
    },
    switchTo() {
      this.form.manual = true;
    },
    save() {
      this.form.sick_leave_location = `${this.option}::${this.hospital}`;
      this.form.leave_number = Math.floor(100000 + Math.random() * 900000);

      this.$inertia.post(this.route("employee.leave.store"), this.form, {
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
    reset() {
      this.form = mapValues(this.form, () => null);
    },
    addDate() {
      this.form.start_of_inclusive_date.push({
        date: moment(),
      });
      this.$nextTick(() => {
        const btn = this.$refs.button[this.$refs.button.length - 1];
        btn.click();
      });
    },
    removeDate(date, hide) {
      this.form.start_of_inclusive_date = this.form.start_of_inclusive_date.filter(
        (d) => d !== date
      );
      hide();
    },
    dateSelected(e, date, toggle) {
      this.selected = date;
      toggle({ ref: e.target });
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
  },
};
</script>
