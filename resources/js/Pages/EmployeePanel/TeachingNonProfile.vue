<template>
  <div>
    <div class="flex items-center justify-between mb-0">
      <h1 class="capitalize mb-8 font-bold text-3xl">
        My {{ type }} Profile 👩‍🏫
      </h1>
    </div>

    <div class="h-full">
      <div class="rounded-xl bg-white shadow-md">
        <div class="flex items-center justify-between mb-0">
          <h5 class="mx-6 my-5 font-semibold font bg-white">
            👩‍🏫 Basic Information
          </h5>
          <!-- <button
            v-if="$page.employee.user !== null"
            class="h-8 text-sm items-center text-blue-600 font-semibold rounded-lg my-2 mx-6"
          >
            ✏️ Edit
          </button> -->
        </div>
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
          <div class="rounded pl-4 pt-4 mx-4">
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Name of Employee
                <span v-if="contact.first_name !== null" class="text-blue-600"
                  >{{ contact.first_name }} {{ contact.middle_name }}
                  {{ contact.last_name }}</span
                >
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Birthday
                <span
                  v-if="contact.birth_date !== null"
                  class="text-blue-600"
                  >{{ format(contact.birth_date) }}</span
                >
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Age
                <span class="text-blue-600">{{ age(contact.birth_date) }}</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Sex
                <span v-if="contact.sex !== null" class="text-blue-600">{{
                  contact.sex
                }}</span>
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Civil Status
                <span
                  v-if="contact.civil_status !== null"
                  class="text-blue-600"
                  >{{ contact.civil_status }}</span
                >
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Tenure of Employment
                <span
                  v-if="contact.status_of_appointment !== null"
                  class="text-blue-600"
                  >{{ contact.status_of_appointment }}</span
                >
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Home College
                <span
                  v-if="contact.office.office_name !== null"
                  class="text-blue-600"
                  >{{ contact.office.office_name }}</span
                >
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-8">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Home Department
                <span
                  v-if="contact.office.office_name !== null"
                  class="text-blue-600"
                  >{{ contact.office.office_name }}</span
                >
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="rounded-xl bg-white shadow-md">
        <div class="flex items-center justify-between mb-0">
          <h5 class="mx-6 my-5 font-semibold font bg-white">👩‍🏫 Work</h5>
          <inertia-link
            v-if="$page.employee.user !== null"
            class="h-8 text-sm items-center text-blue-600 font-semibold rounded-lg my-2 mx-6"
            :href="route('employee.profile.teaching.edit', [contact.id, type.toLowerCase()])"
          >
            ✏️ Edit Work
          </inertia-link>
        </div>
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
          <div class="rounded pl-4 pt-4 mx-4">
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Position
                <span v-if="profile !== null && profile.position != null" class="text-blue-600">{{
                  profile.position
                }}</span>
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Salary Grade
                <span v-if="profile !== null && profile.salary_grade != null" class="text-blue-600">{{
                  profile.salary_grade
                }}</span>
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Monthly Salary
                <span class="text-blue-600">
                  <span v-if="profile !== null && profile.monthly_salary != null" class="text-blue-600">{{
                    currency(profile.monthly_salary)
                  }}</span>
                  <span v-else class="text-red-500">No data available</span>
                </span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Annual Salary
                <span v-if="profile !== null && profile.annual_salary != null" class="text-blue-600">{{
                  currency(profile.annual_salary)
                }}</span>
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-8">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Professional Licensure Passed
                <span v-if="profile !== null && profile.professional_licensure_passed != null" class="text-blue-600">{{
                  profile.professional_licensure_passed
                }}</span>
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
          </div>
        </div>
      </div>

      <div class="rounded-xl bg-white shadow-md">
        <div class="flex items-center justify-between mb-0">
          <h5 class="mx-6 my-5 font-semibold font bg-white">👩‍🏫 Education</h5>
          <inertia-link
            v-if="$page.employee.user !== null"
            class="h-8 text-sm items-center text-blue-600 font-semibold rounded-lg my-2 mx-6"
            :href="route('employee.profile.teaching.edit.educ', [contact.id, type.toLowerCase()])"
          >
            ✏️ Edit Education
          </inertia-link>
        </div>
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
          <div class="rounded pl-4 pt-4 mx-4">
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Bachelor's Degree
                <span v-if="profile !== null && profile.bachelors_degree != null" class="text-blue-600">{{
                  profile.bachelors_degree
                }}</span>
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Bachelor's Degree Specialization
                <span v-if="profile !== null && profile.bachelors_specialization != null" class="text-blue-600">{{
                  profile.bachelors_specialization
                }}</span>
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Master's Degree
                <span v-if="profile !== null && profile.masters_degree != null" class="text-blue-600">{{
                  profile.masters_degree
                }}</span>
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Master's Degree Specialization
                <span
                  v-if="profile !== null && profile.masters_specialization != null"
                  class="text-blue-600"
                  >{{ profile.masters_specialization }}</span
                >
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Master's Degree Units Earned
                <span v-if="profile !== null && profile.masters_units_earned != null" class="text-blue-600">{{
                  profile.masters_units_earned
                }}</span>
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Doctorate's Degree
                <span v-if="profile !== null && profile.doctorate_degree != null" class="text-blue-600">{{
                  profile.doctorate_degree
                }}</span>
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Doctorate's Degree Specialization
                <span v-if="profile !== null && profile.doctorate_specialization != null" class="text-blue-600">{{
                  profile.doctorate_specialization
                }}</span>
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-1">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Doctorate's Degree Units Earned
                <span v-if="profile !== null && profile.doctorate_units_earned != null" class="text-blue-600">{{
                  profile.doctorate_units_earned
                }}</span>
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
            <div class="pb-8">
              <label
                for="name"
                class="font-semibold text-gray-700 text-sm block pb-1"
                >Name of School
                <span v-if="profile !== null && profile.name_of_school != null" class="text-blue-600">{{
                  profile.name_of_school
                }}</span>
                <span v-else class="text-red-500">No data available</span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ToggleButton } from "vue-js-toggle-button";
import Layout from "@/Pages/EmployeePanel/Layout";
import LoadingButton from "@/Shared/LoadingButton";
import SelectInput from "@/Shared/SelectInput";
import TextInput from "@/Shared/TextInput";
import TrashedMessage from "@/Shared/TrashedMessage";
import moment from "moment";

export default {
  metaInfo() {
    return {
      title: `${this.form.first_name} ${this.form.last_name}`,
    };
  },
  layout: Layout,
  components: {
    ToggleButton,
    LoadingButton,
    SelectInput,
    TextInput,
    TrashedMessage,
  },
  props: {
    errors: Object,
    contact: Object,
    profile: Object,
    type: String,
  },
  remember: "form",
  data() {
    return {
      form: {
        first_name: this.contact.first_name,
        last_name: this.contact.last_name,
      },
    };
  },
  methods: {
    age(birthday) {
      return moment().diff(moment(String(birthday), "YYYY-MM-DD"), "years");
    },
    capitalize: function (value) {
      return value.toLowerCase().replace(/\b./g, function (a) {
        return a.toUpperCase();
      });
    },
    save() {
      this.$inertia.post(
        this.route("employees.update.photo", this.contact.id),
        this.form,
        {
          onStart: () => (this.sending = true),
          onFinish: () => (this.sending = false),
        }
      );
    },
    destroy(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("document.destroy", id));
        }
      });
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
    currency(price, sign = "₱ ") {
      const pieces = parseFloat(price).toFixed(2).split("");
      let ii = pieces.length - 3;
      while ((ii -= 3) > 0) {
        pieces.splice(ii, 0, ",");
      }
      return sign + pieces.join("");
    },
  },
};
</script>
