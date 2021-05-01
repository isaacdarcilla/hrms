<template>
  <div>
    <div class="mb-8 flex justify-start max-w-3xl">
      <h1 class="font-bold text-3xl">
        <inertia-link
          class="text-indigo-400 hover:text-indigo-600"
          :href="
            route('employee.profile.teaching', [
              employee.id,
              type.toLowerCase(),
            ])
          "
          >{{ type }}</inertia-link
        >
        <span class="text-indigo-400 font-medium">/</span>
        Edit Work
        <span class="text-indigo-400 font-medium">/</span>
        {{ employee.first_name }} {{ employee.last_name }} 👤
      </h1>
    </div>
    <div class="bg-white rounded shadow overflow-hidden">
      <form @submit.prevent="submit">
        <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
          <text-input
            v-model="form.position"
            :error="errors.position"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Position"
            placeholder="Enter position"
          />
          <text-input
            v-model="form.salary_grade"
            :error="errors.salary_grade"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Salary Grade"
            placeholder="Enter salary grade"
          />
          <text-input
            v-model="form.monthly_salary"
            :error="errors.monthly_salary"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Monthly Salary"
            placeholder="Enter monthly salary"
          />
          <text-input
            v-model="form.annual_salary"
            :error="errors.annual_salary"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Annual Salary"
            placeholder="Enter annual salary"
          />
          <text-input
            v-model="form.professional_licensure_passed"
            :error="errors.professional_licensure_passed"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Prefessional License Passed"
            placeholder="Enter professional licensure passed"
          />
        </div>

        <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex items-center"
        >
          <loading-button
            :loading="sending"
            class="btn-indigo ml-auto rounded-lg"
            type="submit"
            >Update</loading-button
          >
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Layout from "@/Pages/EmployeePanel/Layout";
import LoadingButton from "@/Shared/LoadingButton";
import SelectInput from "@/Shared/SelectInput";
import TextInput from "@/Shared/TextInput";
import FileInput from "@/Shared/FileInput";
import TrashedMessage from "@/Shared/TrashedMessage";

export default {
  metaInfo() {
    return {
      title: `Edit Profile`,
    };
  },
  layout: Layout,
  components: {
    LoadingButton,
    SelectInput,
    TextInput,
    FileInput,
    TrashedMessage,
  },
  props: {
    errors: Object,
    profile: Object,
    employee: Object,
    type: String,
  },
  remember: "form",
  data() {
    return {
      sending: false,
      form: {
        id: this.profile != null ? this.profile.id : null,
        office_id: this.employee.office_id,
        tenure_of_employment: this.employee.status_of_appointment,
        position: this.profile != null ? this.profile.position : null,
        salary_grade: this.profile != null ? this.profile.salary_grade : null,
        monthly_salary:
          this.profile != null ? this.profile.monthly_salary : null,
        annual_salary: this.profile != null ? this.profile.annual_salary : null,
        professional_licensure_passed:
          this.profile != null
            ? this.profile.professional_licensure_passed
            : null,
      },
    };
  },
  watch: {
    form: {
      handler(e) {
        this.form.annual_salary = (e.monthly_salary * 12).toString();
      },
      deep: true,
    },
  },
  methods: {
    submit() {
      this.$inertia.put(
        this.route("employee.profile.teaching.update.work", [
          this.employee.id,
          this.type.toLowerCase(),
        ]),
        this.form,
        {
          onStart: () => (this.sending = true),
          onFinish: () => (this.sending = false),
        }
      );
    },
  },
};
</script>
