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
                  ➕ Create an Announcement
                </h3>
                <form class="w-full max-w-lg pr-4 pt-5">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Type</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter notice or announcement type"
                        v-model="form.notice_type"
                      />
                      <div
                        v-if="$page.errors.notice_type !== null"
                        class="form-error"
                      >
                        {{ $page.errors.notice_type }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Subject</label>
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter notice or announcement subject"
                        v-model="form.notice_subject"
                      />
                      <div
                        v-if="$page.errors.notice_subject !== null"
                        class="form-error"
                      >
                        {{ $page.errors.notice_subject }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold">Description</label>
                      <textarea
                        rows="5"
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter notice or announcement description"
                        v-model="form.notice_description"
                      />
                      <div
                        v-if="$page.errors.notice_description !== null"
                        class="form-error"
                      >
                        {{ $page.errors.notice_description }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <input
                        id="file"
                        type="file"
                        accept="pdf/*"
                        class="hidden"
                        ref="file"
                        @change="change"
                      />
                      <div
                        @click="browse()"
                        class="border-4 border-dashed bg-gray-200 hover:bg-gray-400 cursor-pointer"
                      >
                        <div
                          v-if="!file_name"
                          class="my-6 mx-auto text-center font-normal hover:font-semibold"
                        >
                          Attach document
                        </div>
                        <div
                          v-else
                          class="my-6 mx-auto text-center font-normal hover:font-semibold"
                        >
                          {{ file_name }}
                        </div>
                      </div>
                      <div v-if="$page.errors.file !== null" class="form-error">
                        {{ $page.errors.file }}
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
import mapValues from "lodash/mapValues";

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
      sending: false,
      file_name: null,
      form: {
        notice_type: null,
        notice_subject: null,
        notice_description: null,
        file: null,
        file_name: null,
      },
    };
  },
  methods: {
    save() {
      const data = new FormData();
      data.append("file_name", this.file_name || "");
      data.append("notice_type", this.form.notice_type || "");
      data.append("notice_subject", this.form.notice_subject || "");
      data.append("notice_description", this.form.notice_description || "");
      data.append("file", this.form.file || "");
      data.append("_method", "PUT");

      this.$inertia.post(this.route("notices.store"), data, {
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
    browse() {
      this.$refs.file.click();
    },
    change(event) {
      var data = event.target.files[0];
      this.form.file = event.target.files[0];
      this.file_name = data.name;
      this.$emit("input", this.form.file);
    },
  },
};
</script>
