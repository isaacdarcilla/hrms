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
          v-if="!applied"
          class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-4 sm:align-middle sm:max-w-lg sm:w-full"
          role="dialog"
          aria-modal="true"
          aria-labelledby="modal-headline"
        >
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3
                  class="text-lg leading-6 font-medium text-gray-900 capitalize"
                  id="modal-headline"
                >
                  💼 Easy Application for {{ job.position }}
                </h3>
                <form class="w-full max-w-lg pr-4 pt-5">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="font-normal"
                        >Please enter the correct contact details for faster
                        processing.</label
                      >
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">First Name</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter your first name"
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
                      <label class="form-label font-bold">Middle Name</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter your middle name"
                        v-model="form.middle_name"
                      />
                      <div
                        v-if="$page.errors.middle_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.middle_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Sur Name</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter your sur name"
                        v-model="form.sur_name"
                      />
                      <div
                        v-if="$page.errors.sur_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.sur_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Email Address</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter your email address"
                        v-model="form.email"
                      />
                      <div
                        v-if="$page.errors.email !== null"
                        class="form-error"
                      >
                        {{ $page.errors.email }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Phone Number</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter your phone number"
                        v-model="form.phone"
                        type="tel"
                        v-mask="'###########'"
                      />
                      <div
                        v-if="$page.errors.phone !== null"
                        class="form-error"
                      >
                        {{ $page.errors.phone }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <toggle-button
                        :value="form.qualification_experience"
                        :width="55"
                        :height="25"
                        :labels="{ checked: 'Yes', unchecked: 'No' }"
                        v-model="form.qualification_experience"
                      /><span class="mx-2 font-semibold"
                        >Do you have experience in this job?</span
                      >
                      <div
                        v-if="$page.errors.qualification_experience !== null"
                        class="form-error"
                      >
                        {{ $page.errors.qualification_experience }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <toggle-button
                        :value="form.qualification_eligibility"
                        :width="55"
                        :height="25"
                        :labels="{ checked: 'Yes', unchecked: 'No' }"
                        v-model="form.qualification_eligibility"
                      /><span class="mx-2 font-semibold"
                        >Do you have a civil service eligibility?</span
                      >
                      <div
                        v-if="$page.errors.qualification_eligibility !== null"
                        class="form-error"
                      >
                        {{ $page.errors.qualification_eligibility }}
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
                @click.prevent="save(job.id, true)"
                type="button"
                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm hover:bg-yellow-700"
              >
                {{ sending ? "Wait..." : "Apply" }}
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
        <div
          v-else
          class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-4 sm:align-middle sm:max-w-lg sm:w-full"
          role="dialog"
          aria-modal="true"
          aria-labelledby="modal-headline"
        >
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3
                  class="text-lg text-center leading-6 font-normal text-gray-900"
                  id="modal-headline"
                >
                  <p class="text-center my-6">
                    <svg
                      class="w-12 h-12 mx-auto text-yellow-600"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"
                      ></path>
                    </svg>
                  </p>
                  We have received your application for the
                  {{ job.position }} position! We will contact you as soon as
                  posible. Goodluck!
                </h3>
              </div>
            </div>
          </div>
          <div class="pr-4 pb-4">
            <div
              class="bg-gray-50 px-4 pb-3 sm:px-6 sm:flex sm:flex-row-reverse"
            >
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
import FlashMessages from "@/Shared/FlashMessages";

export default {
  components: {
    FlashMessages,
    ToggleButton,
  },
  props: {
    modal: {
      default: false,
    },
    job: Object,
    errors: Object,
    showing: Boolean,
    applied: Boolean,
  },
  directives: { mask },
  watch: {
    "$page.flash": {
      handler() {
        this.show = true;
      },
      deep: true,
    },
  },
  data() {
    return {
      show: false,
      sending: false,
      form: {
        first_name: null,
        middle_name: null,
        sur_name: null,
        email: null,
        phone: null,
        qualification_experience: null,
        qualification_eligibility: null,
      },
    };
  },
  methods: {
    save(key, value) {
      this.$inertia.post(
        this.route("applicant.store", this.job.id),
        this.form,
        {
          onStart: () => (this.sending = true),
          onFinish: () => (this.sending = false),
        }
      );
      //   this.show ? localStorage.setItem(key, value) : console.log(this.show);
    },
    closeModal() {
      this.$emit("update:modal");
      this.form.first_name = null;
      this.form.middle_name = null;
      this.form.sur_name = null;
      this.form.email = null;
      this.form.phone = null;
      this.form.qualification_experience = null;
      this.form.qualification_eligibility = null;
    },
    reset() {},
  },
};
</script>
