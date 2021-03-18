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
          class="inline-block align-bottom bg-white rounded-lg text-left overflow shadow-xl transform transition-all sm:my-4 sm:align-middle sm:max-w-lg sm:w-full"
          role="dialog"
          aria-modal="true"
          aria-labelledby="modal-headline"
        >
          <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <div class="mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                <h3
                  class="text-lg leading-6 capitalize font-medium text-gray-900"
                  id="modal-headline"
                >
                  ✏️ Edit Username and Password
                </h3>
                <form class="w-full max-w-lg pr-4 pt-5">
                  <div class="mb-6">
                    <toggle-button
                      :value="form.isUsername"
                      :width="55"
                      :height="25"
                      :labels="{ checked: 'Yes', unchecked: 'No' }"
                      v-model="form.isUsername"
                    /><span class="mx-2 font-semibold">Update username?</span>
                  </div>
                  <div v-if="showUsername" class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Username</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        v-model="form.username"
                        placeholder="Enter new username"
                      />
                      <div
                        v-if="$page.errors.username !== null"
                        class="form-error"
                      >
                        {{ $page.errors.username }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Password</label>
                      <input
                        autofocus="true"
                        type="password"
                        class="form-input block w-full"
                        v-model="form.password"
                        placeholder="Enter new password"
                      />
                      <div
                        v-if="$page.errors.password !== null"
                        class="form-error"
                      >
                        {{ $page.errors.password }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Password Confirmation</label
                      >
                      <input
                        autofocus="true"
                        type="password"
                        class="form-input block w-full"
                        v-model="form.password_confirmation"
                        name="password_confirmation"
                        placeholder="Confirm new password"
                      />
                      <div
                        v-if="$page.errors.password_confirmation !== null"
                        class="form-error"
                      >
                        {{ $page.errors.password_confirmation }}
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
    errors: Object,
    showing: Boolean,
    employee: Object,
  },
  directives: { mask },
  inject: ["employeeId"],
  watch: {
    form: {
      handler(e) {
        e.isUsername === true
          ? ((this.showUsername = true), (this.form.isUsername = true))
          : ((this.showUsername = false), (this.form.isUsername = false));
      },
      deep: true,
    },
  },
  data() {
    return {
      sending: false,
      showUsername: false,
      form: {
        username: this.employeeId.username,
        password: null,
        password_confirmation: null,
        isUsername: false,
      },
    };
  },
  methods: {
    save() {
      this.$inertia.put(
        this.route("employee.password.update", this.employee.id),
        this.form,
        {
          onStart: () => (this.sending = true),
          onFinish: () => (this.sending = false),
        }
      );
    },
    closeModal() {
      this.$emit("update:modal");
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
  },
};
</script>
