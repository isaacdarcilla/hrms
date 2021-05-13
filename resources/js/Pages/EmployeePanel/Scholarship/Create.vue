<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link
        class="text-indigo-400 hover:text-indigo-600"
        :href="route('employee.scholarship')"
        >Scholarship</inertia-link
      >
      <span class="text-indigo-400 font-medium">/</span> Apply Scholarship 🎓
    </h1>
    <div class="bg-white rounded shadow overflow-hidden">
      <form @submit.prevent="submit">
        <div class="p-8 -mr-6 flex flex-wrap">
          <text-input
            v-model="form.scholarship_type"
            :error="errors.scholarship_type"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Item Number *"
            placeholder="Enter item number"
          />
        </div>
        <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center"
        >
          <loading-button :loading="sending" class="btn-indigo" type="submit"
            >Apply</loading-button
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
import moment from "moment";
import VSelectize from "@isneezy/vue-selectize";
import jobs from "../../../Shared/Modals/jobs.json";

export default {
  metaInfo: { title: "Apply Scholarship" },
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
    employee: Object,
  },
  remember: "form",
  data() {
    return {
      sending: false,
      options: jobs,
      form: {
        contact_id: this.employee.id,
        status: null,
        scholarship_number: null,
        scholarship_type: null,
        duration_number_of_months: null,
        inclusive_dates: null,
        sponsoring_agency: null,
        degree_type: null,
        degree_name: null,
        plan: null,
        grantee_agency: null,
        school_intended_to_enroll: null,
        school_address: null,
        duration_number_of_years: null,
        scholarship_inclusive_dates: null,
        school_type: null,
        thesis_or_dissertation: null,
        thesis_or_dissertation_name: null,
        recipient_before: null,
        sponsoring_agency_before: null,
        period_of_grant: null,
        reason_of_applying: null,
        doc1: null,
        doc2: null,
        doc3: null,
        doc4: null,
        doc5: null,
        doc6: null,
        doc7: null,
        doc8: null,
        doc9: null,
        doc10: null,
        doc11: null,
        doc12: null,
        doc13: null,
        doc14: null,
        doc15: null,
        doc16: null,
        immediate_head_name: null,
        vp_name: null,
        suc_president_name: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(this.route("employee.scholarship.store"), this.form, {
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
