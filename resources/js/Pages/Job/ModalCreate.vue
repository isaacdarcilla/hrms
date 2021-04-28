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
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3
                  class="text-lg leading-6 font-medium text-gray-900"
                  id="modal-headline"
                >
                  ➕ Create Job Posting
                </h3>
                <form class="w-full max-w-lg pr-4 pt-5">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Plantilla Item Number
                        <span class="text-red-600">*</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter item number"
                        v-model="form.item_number"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.item_number !== null"
                        class="form-error"
                      >
                        {{ $page.errors.item_number }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Position Title
                        <span class="text-red-600">*</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter name of position"
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
                      <label class="form-label font-bold"
                        >Place of Designation
                        <span class="text-red-600">*</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter name of place of designation"
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
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Salary/Pay Grade
                        <span class="text-red-600">*</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter salary grade"
                        v-model="form.salary_grade"
                      />
                      <div
                        v-if="$page.errors.salary_grade !== null"
                        class="form-error"
                      >
                        {{ $page.errors.salary_grade }}
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
                        >Education as Qualification
                        <span class="text-red-600">*</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter education qualification standard"
                        v-model="form.education"
                      />
                      <div
                        v-if="$page.errors.education !== null"
                        class="form-error"
                      >
                        {{ $page.errors.education }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Eligibility as Qualification
                        <span class="font-medium">&nbsp;</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter eligibility qualification standard"
                        v-model="form.eligibility"
                      />
                      <div
                        v-if="$page.errors.eligibility !== null"
                        class="form-error"
                      >
                        {{ $page.errors.eligibility }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Experience as Qualification
                        <span class="font-medium">&nbsp;</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter experience qualification standard"
                        v-model="form.experience"
                      />
                      <div
                        v-if="$page.errors.experience !== null"
                        class="form-error"
                      >
                        {{ $page.errors.experience }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Training as Qualification
                        <span class="font-medium">&nbsp;</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter training qualification standard"
                        v-model="form.training"
                      />
                      <div
                        v-if="$page.errors.training !== null"
                        class="form-error"
                      >
                        {{ $page.errors.training }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Preferred Qualification
                        <span class="text-red-600">*</span></label
                      >
                      <textarea
                        autofocus="true"
                        rows="3"
                        class="form-input block w-full"
                        placeholder="Enter preferred qualification"
                        v-model="form.preferred_qualification"
                      />
                      <div
                        v-if="$page.errors.preferred_qualification !== null"
                        class="form-error"
                      >
                        {{ $page.errors.preferred_qualification }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Deadline of Application
                        <span class="text-red-600">*</span></label
                      >
                      <v-date-picker v-model="form.deadline_at">
                        <template v-slot="{ inputValue, togglePopover }">
                          <div class="flex items-center">
                            <input
                              @focus="togglePopover"
                              :value="format(inputValue)"
                              class="form-input block w-full"
                              readonly
                              placeholder="Select deadline"
                            />
                          </div>
                        </template>
                      </v-date-picker>
                      <div
                        v-if="$page.errors.deadline_at !== null"
                        class="form-error"
                      >
                        {{ $page.errors.deadline_at }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Job Description <span class="text-red-600">*</span>
                      </label>
                      <vue-editor
                        v-model="form.job_description"
                        placeholder="Enter job description"
                        :editorToolbar="customToolbar"
                      ></vue-editor>
                      <div
                        v-if="$page.errors.job_description !== null"
                        class="form-error"
                      >
                        {{ $page.errors.job_description }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Core Competencies <span class="text-red-600">*</span>
                      </label>
                      <vue-editor
                        v-model="form.core_competencies"
                        placeholder="Enter core competencies"
                        :editorToolbar="customToolbar"
                      ></vue-editor>
                      <div
                        v-if="$page.errors.core_competencies !== null"
                        class="form-error"
                      >
                        {{ $page.errors.core_competencies }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Organizational Competencies
                        <span class="text-red-600">*</span>
                      </label>
                      <vue-editor
                        v-model="form.organizational_competencies"
                        placeholder="Enter organizational competencies"
                        :editorToolbar="customToolbar"
                      ></vue-editor>
                      <div
                        v-if="$page.errors.organizational_competencies !== null"
                        class="form-error"
                      >
                        {{ $page.errors.organizational_competencies }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Technical Competencies
                        <span class="text-red-600">*</span>
                      </label>
                      <vue-editor
                        v-model="form.technical_competencies"
                        placeholder="Enter technical competencies"
                        :editorToolbar="customToolbar"
                      ></vue-editor>
                      <div
                        v-if="$page.errors.technical_competencies !== null"
                        class="form-error"
                      >
                        {{ $page.errors.technical_competencies }}
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
import { VueEditor } from "vue2-editor";
import { mask } from "vue-the-mask";
import moment from "moment";

export default {
  components: {
    VueEditor,
  },
  props: {
    modal: {
      default: false,
    },
    errors: Object,
    showing: Boolean,
  },
  directives: { mask },
  data() {
    return {
      customToolbar: [
        ["bold", "italic", "underline"],
        [{ list: "ordered" }, { list: "bullet" }],
      ],
      sending: false,
      form: {
        position: null,
        department: null,
        item_number: null,
        education: null,
        experience: null,
        training: null,
        eligibility: null,
        salary_grade: null,
        monthly_salary: null,
        job_description: null,
        preferred_qualification: null,
        deadline_at: null,
        core_competencies:
          "<p><br></p><ul><li>Exemplifying integrity</li><li>Delivering service excellence</li><li>Solving problems and making decisions</li></ul>",
        organizational_competencies: null,
        technical_competencies: null,
      },
    };
  },
  methods: {
    save() {
      this.$inertia.post(this.route("jobs.store"), this.form, {
        onStart: () => (this.sending = true),
        onFinish: () => (this.sending = false),
      });
    },
    closeModal() {
      this.$emit("update:modal");
    },
    reset() {},
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
  },
};
</script>
