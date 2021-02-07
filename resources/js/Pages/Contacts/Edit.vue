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
                <div class="text-gray-500 block pt-2">
                  #{{ contact.agency_employee_id }}
                </div>
              </figcaption>
            </div>
          </figure>
        </div>

        <div class="rounded-xl bg-white shadow-md">
          <div class="flex items-center">
            <div class="px-4 pt-4 font-semibold">🥳 Personal Information</div>
          </div>
          <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
            <div class="rounded pl-4 pt-4">
              <div class="pb-1">
                <label
                  for="name"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Birthday
                  <span class="text-gray-500">{{
                    contact.birth_date
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Birth Place
                  <span class="text-gray-500">{{
                    contact.birth_place
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Sex
                  <span class="text-gray-500">{{ contact.sex }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Height
                  <span class="text-gray-500"
                    >{{ contact.height }} CM</span
                  ></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Weight
                  <span class="text-gray-500"
                    >{{ contact.weight }} KG</span
                  ></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Blood Type
                  <span class="text-gray-500">{{
                    contact.blood_type
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >GSIS
                  <span class="text-gray-500">{{
                    contact.gsis_id
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >SSS
                  <span class="text-gray-500">{{ contact.sss_id }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Pagibig
                  <span class="text-gray-500">{{
                    contact.pagibig_id
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >PhilHealth
                  <span class="text-gray-500">{{
                    contact.philhealth_id
                  }}</span></label
                >
              </div>
            </div>
            <div class="rounded pl-4 pt-4 mx-4">
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Civil Status
                  <span class="text-gray-500">{{
                    contact.civil_status
                  }}</span></label
                >
              </div>

              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Citizenship
                  <span class="text-gray-500">{{
                    contact.citizenship
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Residential Address
                  <span class="text-gray-500"
                    >{{ contact.residential_block }}
                    {{ contact.residential_street }}
                    {{ contact.residential_village }}
                    {{ contact.residential_barangay }}
                    {{ contact.residential_city }}
                    {{ contact.residential_province }}
                    {{ contact.residential_zipcode }}
                  </span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Permanent Address
                  <span class="text-gray-500"
                    >{{ contact.permanent_block }}
                    {{ contact.permanent_street }}
                    {{ contact.permanent_village }}
                    {{ contact.permanent_barangay }}
                    {{ contact.permanent_city }}
                    {{ contact.permanent_province }}
                    {{ contact.permanent_zipcode }}
                  </span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Telephone
                  <span class="text-gray-500">{{
                    contact.telephone
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Mobile Number
                  <span class="text-gray-500">{{ contact.phone }}</span></label
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="h-full pt-3">
      <div class="grid gap-6 mb-4 md:grid-cols-2 xl:grid-cols-2">
        <div class="rounded-xl bg-white shadow-md">
          <div class="flex items-center justify-between mb-0">
            <h5 class="mx-6 my-5 font-semibold font bg-white">
              👨‍👩‍👧‍👦 Family Background
            </h5>
            <inertia-link
              class="h-8 text-xs items-center btn-indigo my-2 mx-6"
              :href="route('employees.create')"
            >
              ✏️ Edit
            </inertia-link>
          </div>
          <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
            <div class="rounded pl-4 pt-4">
              <div class="pb-1">
                <label
                  for="name"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Birthday
                  <span class="text-gray-500">{{
                    contact.birth_date
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Birth Place
                  <span class="text-gray-500">{{
                    contact.birth_place
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Sex
                  <span class="text-gray-500">{{ contact.sex }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Height
                  <span class="text-gray-500"
                    >{{ contact.height }} CM</span
                  ></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Weight
                  <span class="text-gray-500"
                    >{{ contact.weight }} KG</span
                  ></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Blood Type
                  <span class="text-gray-500">{{
                    contact.blood_type
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >GSIS
                  <span class="text-gray-500">{{
                    contact.gsis_id
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >SSS
                  <span class="text-gray-500">{{ contact.sss_id }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Pagibig
                  <span class="text-gray-500">{{
                    contact.pagibig_id
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >PhilHealth
                  <span class="text-gray-500">{{
                    contact.philhealth_id
                  }}</span></label
                >
              </div>
            </div>
            <div class="rounded pl-4 pt-4 mx-4">
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Civil Status
                  <span class="text-gray-500">{{
                    contact.civil_status
                  }}</span></label
                >
              </div>

              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Citizenship
                  <span class="text-gray-500">{{
                    contact.citizenship
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Residential Address
                  <span class="text-gray-500"
                    >{{ contact.residential_block }}
                    {{ contact.residential_street }}
                    {{ contact.residential_village }}
                    {{ contact.residential_barangay }}
                    {{ contact.residential_city }}
                    {{ contact.residential_province }}
                    {{ contact.residential_zipcode }}
                  </span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Permanent Address
                  <span class="text-gray-500"
                    >{{ contact.permanent_block }}
                    {{ contact.permanent_street }}
                    {{ contact.permanent_village }}
                    {{ contact.permanent_barangay }}
                    {{ contact.permanent_city }}
                    {{ contact.permanent_province }}
                    {{ contact.permanent_zipcode }}
                  </span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Telephone
                  <span class="text-gray-500">{{
                    contact.telephone
                  }}</span></label
                >
              </div>
              <div class="pb-1">
                <label
                  for="about"
                  class="font-semibold text-gray-700 text-sm block pb-1"
                  >Mobile Number
                  <span class="text-gray-500">{{ contact.phone }}</span></label
                >
              </div>
            </div>
          </div>
        </div>

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
                        Recognition
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
                      v-for="recognition in recognitions"
                      :key="recognition.id"
                    >
                      <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                      >
                        <div class="text-sm text-gray-900">
                          {{ recognition.recognitions_name }}
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
