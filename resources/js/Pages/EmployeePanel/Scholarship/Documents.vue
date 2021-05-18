<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link
        class="text-indigo-400 hover:text-indigo-600"
        :href="route('employee.scholarship')"
        >Scholarship</inertia-link
      >
      <span class="text-indigo-400 font-medium">/</span> Documentary Requirements 🎓
    </h1>
    <div class="bg-white rounded shadow overflow-hidden">
      <form @submit.prevent="submit">
        <div class="p-8 -mr-6 flex flex-wrap">
         <file-input
            v-model="form.doc1"
            :error="errors.doc1"
            class="pr-6 pb-8 w-full lg:w-1/2"
            type="file"
            accept="image/*"
            label="Photo"
          />
        </div>
        <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center"
        >
          <loading-button :loading="sending" class="btn-indigo" type="submit"
            >Upload</loading-button
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
import TextareaInput from "@/Shared/TextareaInput";
import FileInput from "@/Shared/FileInput";
import moment from "moment";
import VSelectize from "@isneezy/vue-selectize";
import jobs from "../../../Shared/Modals/jobs.json";

export default {
  metaInfo: { title: "Edit Scholarship" },
  layout: Layout,
  components: {
    LoadingButton,
    SelectInput,
    TextInput,
    TextareaInput,
    VSelectize,
    FileInput,
  },
  props: {
    errors: Object,
    employee: Object,
    scholar: Object,
  },
  remember: "form",
  watch: {
    form: {
      handler(e) {},
      deep: true,
    },
  },
  data() {
    return {
      sending: false,
      options: jobs,
      form: {
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
      },
    };
  },
  methods: {
    handleType(e) {
      console.log(e.target.value);
      if (e.target.value != 4) {
        this.form.plan = null;
      }
    },
    submit() {
      this.$inertia.put(this.route("employee.scholarship.update", this.scholar.id), this.form, {
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
