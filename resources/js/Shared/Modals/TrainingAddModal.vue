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
                  ➕ Add Training Program

                </h3>
                <form class="w-full max-w-lg pr-4 pt-5">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Name of Training</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter training name"
                        v-model="form.trainings_name"
                      />
                      <div
                        v-if="$page.errors.trainings_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.trainings_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Number of Hours</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter number of hours"
                        v-model="form.trainings_number_of_hours"
                      />
                      <div
                        v-if="$page.errors.trainings_number_of_hours !== null"
                        class="form-error"
                      >
                        {{ $page.errors.trainings_number_of_hours }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Inclusive Date
                        <span class="font-medium">(From)</span></label
                      >
                      <v-date-picker v-model="form.trainings_from">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              placeholder="Select start of training"
                            />
                          </div>
                        </template>
                      </v-date-picker>
                      <div v-if="$page.errors.trainings_from !== null" class="form-error">
                        {{ $page.errors.trainings_from }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Inclusive Date
                        <span class="font-medium">(To)</span></label
                      >
                      <v-date-picker v-model="form.trainings_to">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              placeholder="Select end of training"
                            />
                          </div>
                        </template>
                      </v-date-picker>
                      <div v-if="$page.errors.trainings_to !== null" class="form-error">
                        {{ $page.errors.trainings_to }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Training Type</label
                      >
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.trainings_type"
                        @click="other = false"
                        value="Managerial"
                      />
                      Managerial
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.trainings_type"
                        @click="other = false"
                        value="Supervisory"
                      />
                      Supervisory
                      <input
                        type="radio"
                        class="w-3 h-3 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        v-model="form.trainings_type"
                        @click="other = false"
                        value="Technical"
                      />
                      Technical
                      <input
                        type="radio"
                        class="w-3 h-3 ml-2 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
                        @click="other = true, form.trainings_type = null"
                        v-model="form.trainings_type"
                      />
                      Other (Specify)
                      <input
                        v-if="other"
                        autofocus="true"
                        class="form-input mt-2 block w-full"
                        placeholder="Enter other training type"
                        v-model="form.trainings_type"
                      />
                      <div
                        v-if="
                          $page.errors.trainings_type !== null
                        "
                        class="form-error"
                      >
                        {{ $page.errors.trainings_type }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Training Venue</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter training venue"
                        v-model="form.trainings_venue"
                        ref="name"
                      />
                      <div
                        v-if="
                          $page.errors.trainings_venue !== null
                        "
                        class="form-error"
                      >
                        {{ $page.errors.trainings_venue }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Sponsor</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter training sponsor"
                        v-model="form.trainings_sponsored_by"
                        ref="name"
                      />
                      <div
                        v-if="
                          $page.errors.trainings_sponsored_by !== null
                        "
                        class="form-error"
                      >
                        {{ $page.errors.trainings_sponsored_by }}
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
      other: false,
      form: {
        contact_id: this.employee.id,
        trainings_name: null,
        trainings_from: null,
        trainings_to: null,
        trainings_number_of_hours: null,
        trainings_type: null,
        trainings_venue: null,
        trainings_sponsored_by: null,
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
      this.$inertia.post(this.route("training.store"), this.form, {
        onStart: () => (this.sending = true),
        onFinish: () => (this.sending = false),
      });
    },
    closeModal() {
      this.$emit("update:modal");
      this.reset();
    },
    reset() {
      this.form.trainings_name = null;
      this.form.trainings_from = null;
      this.form.trainings_to = null;
      this.form.trainings_number_of_hours = null;
      this.form.trainings_type = null;
      this.form.trainings_sponsored_by = null;
    },
  },
};
</script>
