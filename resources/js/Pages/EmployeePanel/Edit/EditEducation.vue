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
        Edit Education
        <span class="text-indigo-400 font-medium">/</span>
        {{ employee.first_name }} {{ employee.last_name }} 👤
      </h1>
    </div>
    <div class="bg-white rounded shadow overflow-hidden">
      <form @submit.prevent="submit">
        <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
          <text-input
            v-model="form.bachelors_degree"
            :error="errors.bachelors_degree"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Bachelor's Degree"
            placeholder="Enter your bachelor's degree"
          />
          <text-input
            v-model="form.bachelors_specialization"
            :error="errors.bachelors_specialization"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Bachelor's Specialization"
            placeholder="Enter your bachelor's specialization"
          />
          <text-input
            v-model="form.masters_degree"
            :error="errors.masters_degree"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Master's Specialization"
            placeholder="Enter your master's degree"
          />
          <text-input
            v-model="form.masters_specialization"
            :error="errors.masters_specialization"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Master's Specialization"
            placeholder="Enter your masters's specialization"
          />
          <text-input
            v-model="form.masters_units_earned"
            :error="errors.masters_units_earned"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Master's Unit Earned"
            placeholder="Enter your masters's unit earned"
          />

          <text-input
            v-model="form.doctorate_degree"
            :error="errors.doctorate_degree"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Doctorate's Specialization"
            placeholder="Enter your doctorate's degree"
          />
          <text-input
            v-model="form.doctorate_specialization"
            :error="errors.doctorate_specialization"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Doctorate's Specialization"
            placeholder="Enter your doctorate's specialization"
          />
          <text-input
            v-model="form.doctorate_units_earned"
            :error="errors.doctorate_units_earned"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Doctorate's Unit Earned"
            placeholder="Enter your doctorate's unit earned"
          />

          <text-input
            v-model="form.name_of_school"
            :error="errors.name_of_school"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="Name of School"
            placeholder="Enter name of school where advanced degree earned"
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
        bachelors_degree:
          this.profile != null ? this.profile.bachelors_degree : null,
        bachelors_specialization:
          this.profile != null ? this.profile.bachelors_specialization : null,
        masters_degree:
          this.profile != null ? this.profile.masters_degree : null,
        masters_specialization:
          this.profile != null ? this.profile.masters_specialization : null,
        masters_units_earned:
          this.profile != null ? this.profile.masters_units_earned : null,
        doctorate_degree:
          this.profile != null ? this.profile.doctorate_degree : null,
        doctorate_specialization:
          this.profile != null ? this.profile.doctorate_specialization : null,
        doctorate_units_earned:
          this.profile != null ? this.profile.doctorate_units_earned : null,
        name_of_school:
          this.profile != null ? this.profile.name_of_school : null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(this.route("users.update", this.user.id), data, {
        onStart: () => (this.sending = true),
        onFinish: () => (this.sending = false),
        onSuccess: () => {
          if (Object.keys(this.$page.errors).length === 0) {
            this.form.photo = null;
            this.form.password = null;
          }
        },
      });
    },
  },
};
</script>
