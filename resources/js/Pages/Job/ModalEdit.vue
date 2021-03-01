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
                      <label class="form-label font-bold">Item Number</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        :placeholder="job.item_number"
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
                      <label class="form-label font-bold">Position</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        :placeholder="job.position"
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
                      <label class="form-label font-bold">Department</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        :placeholder="job.department"
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
                        >Education as Qualification</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        :placeholder="job.education"
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
                        <span class="font-medium">(Optional)</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        :placeholder="
                          job.eligibility === null
                            ? `Enter eligibility qualification standard`
                            : job.eligibility
                        "
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
                        <span class="font-medium">(Optional)</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        :placeholder="
                          job.experience === null
                            ? `Enter experience qualification standard`
                            : job.experience
                        "
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
                        <span class="font-medium">(Optional)</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        :placeholder="
                          job.training === null
                            ? `Enter training qualification standard`
                            : job.training
                        "
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
                      <label class="form-label font-bold">Salary Grade</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        :placeholder="job.salary_grade"
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
                        >Job Description
                      </label>
                      <textarea
                        autofocus="true"
                        class="form-input block w-full"
                        :placeholder="
                          job.job_description === null
                            ? `Enter job description`
                            : job.job_description
                        "
                        v-model="form.job_description"
                        rows="4"
                      />
                      <div
                        v-if="$page.errors.job_description !== null"
                        class="form-error"
                      >
                        {{ $page.errors.job_description }}
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

export default {
  components: {
    VueEditor,
  },
  props: {
    modal: {
      default: false,
    },
    job: Object,
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
        job_description: null,
      },
    };
  },
  methods: {
    save() {
      this.$inertia.put(this.route("jobs.update", this.job.id), this.form, {
        onStart: () => (this.sending = true),
        onFinish: () => (this.sending = false),
      });
    },
    closeModal() {
      this.$emit("update:modal");
    },
    reset() {},
  },
};
</script>
