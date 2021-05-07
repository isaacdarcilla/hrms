<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link
        class="text-indigo-400 hover:text-indigo-600"
        :href="route('psipop.index')"
        >Psipop</inertia-link
      >
      <span class="text-indigo-400 font-medium">/</span> Create Psipop 📂
    </h1>
    <div class="bg-white rounded shadow overflow-hidden">
      <form @submit.prevent="submit">
        <div class="p-8 -mr-6 flex flex-wrap">
          <text-input
            v-model="form.item_number"
            :error="errors.item_number"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Item Number *"
            placeholder="Enter item number"
          />
          <div class="pr-6 pb-8 w-full lg:w-1/2">
            <label class="form-label">Position *</label>
            <v-selectize
              v-model="form.position"
              :options="options"
              :limit="10"
              label="Position *"
              class="form-input block w-full"
              placeholder="Type and select position"
            />
            <div v-if="$page.errors.position !== null" class="form-error">
              {{ $page.errors.position }}
            </div>
          </div>

          <text-input
            v-model="form.salary_grade"
            :error="errors.salary_grade"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Salary Grade *"
            placeholder="Enter salary grade"
          />

          <text-input
            v-model="form.monthly_salary"
            :error="errors.monthly_salary"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Monthly Salary *"
            placeholder="Enter monthly salary"
          />

          <text-input
            v-model="form.authorized_salary"
            :error="errors.authorized_salary"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Annual Salary *"
            placeholder="Enter annual salary"
          />
        </div>
        <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center"
        >
          <loading-button :loading="sending" class="btn-indigo" type="submit"
            >Create Psipop</loading-button
          >
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Layout from "@/Shared/Layout";
import LoadingButton from "@/Shared/LoadingButton";
import SelectInput from "@/Shared/SelectInput";
import TextInput from "@/Shared/TextInput";
import FileInput from "@/Shared/FileInput";
import moment from "moment";
import VSelectize from "@isneezy/vue-selectize";
import jobs from "../../Shared/Modals/jobs.json";

export default {
  metaInfo: { title: "Create Psipop" },
  layout: Layout,
  components: {
    LoadingButton,
    SelectInput,
    TextInput,
    FileInput,
    VSelectize,
  },
  props: {
    errors: Object,
    employees: Array,
  },
  remember: "form",
  data() {
    return {
      sending: false,
      options: jobs,
      form: {
        item_number: null,
        position: null,
        salary_grade: null,
        authorized_salary: null,
        monthly_salary: null,
      },
    };
  },
  watch: {
    form: {
      handler(e) {
        this.form.authorized_salary = (e.monthly_salary * 12).toString();
      },
      deep: true,
    },
  },
  methods: {
    submit() {
      this.$inertia.post(this.route("psipop.store"), this.form, {
        onStart: () => (this.sending = true),
        onFinish: () => (this.sending = false),
      });
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
  },
};
</script>
