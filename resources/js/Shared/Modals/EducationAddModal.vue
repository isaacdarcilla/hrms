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
                  ➕ Add Education
                </h3>
                <form class="w-full max-w-lg pr-4 pt-5">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Name of School</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter school name"
                        v-model="form.education_school_name"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.education_school_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.education_school_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Course/Degree</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter course or degree"
                        v-model="form.education_course"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.education_course !== null"
                        class="form-error"
                      >
                        {{ $page.errors.education_course }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Level of Education</label
                      >
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.education_level"
                        value="Primary Education"
                      />
                      Primary Education
					  <input
                        type="radio"
                        class="w-3 h-3 ml-2 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.education_level"
                        value="Secondary Education"
                      />
                      Secondary Education
                      <input
                        type="radio"
                        class="w-3 h-3 ml-2 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.education_level"
                        value="Tertiary Education"
                      />
                      Tertiary Education
                      <div
                        v-if="$page.errors.education_level !== null"
                        class="form-error"
                      >
                        {{ $page.errors.education_level }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Period of Attendance
                        <span class="font-medium">(From)</span></label
                      >
                      <v-date-picker v-model="form.from">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              placeholder="Select start of period of attendance"
                            />
                          </div>
                        </template>
                      </v-date-picker>
                      <div v-if="$page.errors.from !== null" class="form-error">
                        {{ $page.errors.from }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Period of Attendance
                        <span class="font-medium">(To)</span></label
                      >
                      <v-date-picker v-model="form.to">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              placeholder="Select end of period of attendance"
                            />
                          </div>
                        </template>
                      </v-date-picker>
                      <div v-if="$page.errors.to !== null" class="form-error">
                        {{ $page.errors.to }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Highest Units Earned
                        <span class="font-medium">(Optional)</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter units earned"
                        v-model="form.education_highest_level_earned"
                        ref="name"
                      />
                      <div
                        v-if="
                          $page.errors.education_highest_level_earned !== null
                        "
                        class="form-error"
                      >
                        {{ $page.errors.education_highest_level_earned }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Year Graduated</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter year of graduation"
                        v-model="form.education_year_graduated"
                        v-mask="'####'"
                        type="tel"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.education_year_graduated !== null"
                        class="form-error"
                      >
                        {{ $page.errors.education_year_graduated }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Honors Received</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter honors received"
                        v-model="form.education_honors_received"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.education_honors_received !== null"
                        class="form-error"
                      >
                        {{ $page.errors.education_honors_received }}
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
        education_level: null,
        education_school_name: null,
        education_course: null,
        from: null,
        to: null,
        education_highest_level_earned: null,
        education_year_graduated: null,
        education_honors_received: null,
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
      this.$inertia.post(this.route("education.store"), this.form, {
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
      this.form.education_level = null;
      this.form.education_school_name = null;
      this.form.education_course = null;
      this.form.from = null;
      this.form.to = null;
      this.form.education_highest_level_earned = null;
      this.form.education_year_graduated = null;
      this.form.education_honors_received = null;
    },
  },
};
</script>
