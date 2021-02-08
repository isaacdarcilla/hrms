<template>
  <div>
    <div class="flex items-center justify-between mb-0">
      <h1 class="mb-8 font-bold text-3xl">
        <inertia-link
          class="text-indigo-400 hover:text-indigo-600"
          :href="route('employees')"
          >Employee</inertia-link
        >
        <span class="text-indigo-400 font-medium">/</span>
        {{ form.first_name }} {{ form.last_name }} 👥
      </h1>
      <inertia-link class="btn-indigo mb-8" :href="route('employees.create')">
        <span>✏️ Edit</span>
        <span class="hidden md:inline">Employee</span>
      </inertia-link>
    </div>

    <trashed-message v-if="contact.deleted_at" class="mb-6" @restore="restore">
      This employee has been removed.
    </trashed-message>
    <div class="h-full">
      <div class="grid gap-6 mb-4 md:grid-cols-2 xl:grid-cols-2">
        <div class="rounded-xl bg-white shadow-md">
          <figure class="bg-white rounded-xl p-8">
            <img
              class="w-32 h-32 rounded-full mx-auto"
              src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
              alt=""
              width="384"
              height="512"
            />
            <div class="pt-6 text-center space-y-4">
              <figcaption class="text-lg font-large font-semibold">
                <div class="text-cyan-600 block">
                  {{ contact.first_name }} {{ contact.middle_name }}
                  {{ contact.last_name }} {{ contact.name_extension }}
                </div>
                <div class="text-gray-600 block">{{ contact.email }}</div>
                <div
                  v-if="contact.agency_employee_id === null"
                  class="text-gray-500 block pt-2"
                >
                  No data available
                </div>
                <div v-else class="text-gray-500 block pt-2">
                  #{{ contact.agency_employee_id }}
                </div>
              </figcaption>
            </div>
          </figure>
        </div>
        <personal-information :contact="contact"></personal-information>
      </div>
    </div>

    <div class="h-full pt-3">
      <div class="grid gap-6 mb-4 md:grid-cols-2 xl:grid-cols-2">
        <family-background :family="family"></family-background>
        <div class="flex flex-col mt-0">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div
              class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8"
            >
              <div
                class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
              >
                <div class="flex items-center justify-between mb-0">
                  <h5 class="mx-6 my-5 font-semibold font bg-white">
                    👶 Name of Childrens
                  </h5>
                  <inertia-link
                    class="h-8 text-xs items-center btn-indigo my-2 mx-6"
                    :href="route('employees.create')"
                  >
                    ➕ Add
                  </inertia-link>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-white">
                    <tr
                      class="transition-all hover:bg-gray-100 hover:shadow-lg"
                    >
                      <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                      >
                        Name of Children
                      </th>
                      <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                      >
                        Date of Birth
                      </th>
                      <th
                        scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                      >
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr
                      class="transition-all hover:bg-gray-100 hover:shadow-lg"
                      v-for="c in childrens"
                      :key="c.id"
                    >
                      <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                      >
                        <div class="text-sm text-gray-900">
                          {{ c.children_name }}
                        </div>
                      </td>
                       <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                      >
                        <div class="text-sm text-gray-900">
                          {{ c.children_birth_date }}
                        </div>
                      </td>
                      <td
                        class="px-6 py-4 whitespace-nowrap text-sm font-medium"
                      >
                        <inertia-link
                          href="#"
                          class="text-indigo-600 hover:text-indigo-900"
                          >✏️ Edit</inertia-link
                        >
                      </td>
                    </tr>
                    <tr v-if="recognitions.length === 0">
                      <td class="border-t px-6 py-4 font-bold" colspan="4">
                        ☹️ No recognitions added.
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <educational-background
      :educations="educations"
      class="flex"
    ></educational-background>

    <civil-service :eligibilities="eligibilities" class="flex"></civil-service>

    <work-experience :experiences="experiences" class="flex"></work-experience>

    <volunteer-work :volunteers="volunteers" class="flex"></volunteer-work>

    <trainings :trainings="trainings" class="flex"></trainings>

    <other-informations
      :skills="skills"
      :memberships="memberships"
      :recognitions="recognitions"
      class="flex"
    ></other-informations>
  </div>
</template>

<script>
import Layout from "@/Shared/Layout";
import LoadingButton from "@/Shared/LoadingButton";
import SelectInput from "@/Shared/SelectInput";
import TextInput from "@/Shared/TextInput";
import TrashedMessage from "@/Shared/TrashedMessage";
import EducationalBackground from "@/Shared/EducationalBackground.vue";
import CivilService from "@/Shared/CivilService.vue";
import WorkExperience from "@/Shared/WorkExperience.vue";
import VolunteerWork from "@/Shared/VolunteerWork.vue";
import Trainings from "@/Shared/Trainings.vue";
import OtherInformations from "@/Shared/OtherInformations.vue";
import PersonalInformation from "@/Shared/PersonalInformation.vue";
import FamilyBackground from "@/Shared/FamilyBackground.vue";

export default {
  metaInfo() {
    return {
      title: `${this.form.first_name} ${this.form.last_name}`,
    };
  },
  layout: Layout,
  components: {
    LoadingButton,
    SelectInput,
    TextInput,
    TrashedMessage,
    EducationalBackground,
    CivilService,
    WorkExperience,
    VolunteerWork,
    Trainings,
    OtherInformations,
    PersonalInformation,
    FamilyBackground,
  },
  props: {
    errors: Object,
    contact: Object,
    educations: Array,
    organizations: Array,
    experiences: Array,
    eligibilities: Array,
    volunteers: Array,
    trainings: Array,
    skills: Array,
    recognitions: Array,
    memberships: Array,
    family: Object,
    childrens: Array,
  },
  remember: "form",
  data() {
    return {
      sending: false,
      form: {
        first_name: this.contact.first_name,
        last_name: this.contact.last_name,
        organization_id: this.contact.organization_id,
        email: this.contact.email,
        phone: this.contact.phone,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.put(
        this.route("employees.update", this.contact.id),
        this.form,
        {
          onStart: () => (this.sending = true),
          onFinish: () => (this.sending = false),
        }
      );
    },
    destroy() {
      if (confirm("Are you sure you want to delete this contact?")) {
        this.$inertia.delete(this.route("employees.destroy", this.contact.id));
      }
    },
    restore() {
      if (confirm("Are you sure you want to restore this contact?")) {
        this.$inertia.put(this.route("employees.restore", this.contact.id));
      }
    },
  },
};
</script>
