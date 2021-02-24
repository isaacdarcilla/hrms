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
                <div class="flex items-center justify-between mb-0">
                  <h3
                    class="text-lg leading-6 font-medium text-gray-900 capitalize"
                    id="modal-headline"
                  >
                    ✏️ Edit {{ employee.first_name }} Family Background
                  </h3>
                  <button @click="closeModal" class="text-sm ml-2 pr-5 text-red-600">
                    Close
                  </button>
                </div>
                <form class="w-full max-w-lg pr-4 pt-5">
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Spouse First Name</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter spouse first name"
                        v-model="form.spouse_first_name"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.spouse_first_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.spouse_first_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Spouse Middle Name</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter spouse middle name"
                        v-model="form.spouse_middle_name"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.spouse_middle_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.spouse_middle_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Spouse Last Name</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter spouse last name"
                        v-model="form.spouse_last_name"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.spouse_last_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.spouse_last_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Spouse Name Extension
                        <span class="font-medium">(Optional)</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter spouse name extension"
                        v-model="form.spouse_name_extension"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.spouse_name_extension !== null"
                        class="form-error"
                      >
                        {{ $page.errors.spouse_name_extension }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Spouse Occupation/Business
                        <span class="font-medium">(Optional)</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter spouse occupation or business"
                        v-model="form.spouse_business_name"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.spouse_business_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.spouse_business_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Spouse Business Address
                        <span class="font-medium">(Optional)</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter spouse business address"
                        v-model="form.spouse_business_address"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.spouse_business_address !== null"
                        class="form-error"
                      >
                        {{ $page.errors.spouse_business_address }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Spouse Phone Number
                        <span class="font-medium">(Optional)</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter spouse phone number"
                        v-model="form.spouse_telephone"
                        v-mask="'###########'"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.spouse_telephone !== null"
                        class="form-error"
                      >
                        {{ $page.errors.spouse_telephone }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Father First Name</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter father first name"
                        v-model="form.father_first_name"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.father_first_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.father_first_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Father Middle Name</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter father middle name"
                        v-model="form.father_middle_name"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.father_middle_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.father_middle_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Father Last Name</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter father last name"
                        v-model="form.father_last_name"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.father_last_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.father_last_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Father Name Extension
                        <span class="font-medium">(Optional)</span></label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter father name extension"
                        v-model="form.father_name_extension"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.father_name_extension !== null"
                        class="form-error"
                      >
                        {{ $page.errors.father_name_extension }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Mother First Name</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter mother first name"
                        v-model="form.mother_first_name"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.mother_first_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.mother_first_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Mother Middle Name</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter mother middle name"
                        v-model="form.mother_middle_name"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.mother_middle_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.mother_middle_name }}
                      </div>
                    </div>
                  </div>
                  <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                      <label class="form-label font-bold"
                        >Mother Last Name</label
                      >
                      <input
                        autofocus="true"
                        class="form-input block w-full"
                        placeholder="Enter mother last name"
                        v-model="form.mother_last_name"
                        ref="name"
                      />
                      <div
                        v-if="$page.errors.mother_last_name !== null"
                        class="form-error"
                      >
                        {{ $page.errors.mother_last_name }}
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

export default {
  props: {
    modal: {
      default: false,
    },
    errors: Object,
    employee: Object,
    family: Object,
    showing: Boolean,
  },
  directives: { mask },
  data() {
    return {
      sending: false,
      form: {
        spouse_first_name:
          this.family === null
            ? null
            : this.family.spouse_first_name,
        spouse_middle_name:
          this.family === null
            ? null
            : this.family.spouse_middle_name,
        spouse_last_name:
          this.family === null
            ? null
            : this.family.spouse_last_name,
        spouse_name_extension:
          this.family === null
            ? null
            : this.family.spouse_name_extension,
        spouse_occupation:
          this.family === null
            ? null
            : this.family.spouse_occupation,
        spouse_business_name:
          this.family === null
            ? null
            : this.family.spouse_business_name,
        spouse_business_address:
          this.family === null
            ? null
            : this.family.spouse_business_address,
        spouse_telephone:
          this.family === null
            ? "09"
            : this.family.spouse_telephone,
        father_first_name:
          this.family === null
            ? null
            : this.family.father_first_name,
        father_middle_name:
          this.family === null
            ? null
            : this.family.father_middle_name,
        father_last_name:
          this.family === null
            ? null
            : this.family.father_last_name,
        father_name_extension:
          this.family === null
            ? null
            : this.family.father_name_extension,
        mother_first_name:
          this.family === null
            ? null
            : this.family.mother_first_name,
        mother_middle_name:
          this.family === null
            ? null
            : this.family.mother_middle_name,
        mother_last_name:
          this.family === null
            ? null
            : this.family.mother_last_name,
      },
    };
  },
  methods: {
    save() {
      this.$inertia.put(
        this.route("family.update", this.employee.id),
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
  },
};
</script>
