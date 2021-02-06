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
      <div class="border-b-0 block md:flex">
        <div
          class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 rounded-xl bg-white shadow-md"
        >
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
                  {{ contact.last_name }}
                </div>
                <div class="text-gray-500 block">{{ contact.email }}</div>
              </figcaption>
            </div>
          </figure>
        </div>

        <div class="w-full md:w-3/5 p-8 lg:ml-4 rounded-xl bg-white shadow-md">
          <div class="flex items-center">
            <div class="px-3 font-semibold">Personal Information</div>
          </div>
          <div class="rounded p-3">
            <div class="pb-6">
              <label for="name" class="font-semibold text-gray-700 block pb-1"
                >Name</label
              >
              <div class="flex">
                <input
                  disabled
                  id="username"
                  class="border-1 rounded-r px-4 py-2 w-full"
                  type="text"
                  value="Jane Name"
                />
              </div>
            </div>
            <div class="pb-4">
              <label for="about" class="font-semibold text-gray-700 block pb-1"
                >Email</label
              >
              <input
                disabled
                id="email"
                class="border-1 rounded-r px-4 py-2 w-full"
                type="email"
                value="example@example.com"
              />
              <span class="text-gray-600 pt-4 block opacity-70"
                >Personal login information of your account</span
              >
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="flex flex-col mt-4">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
          >
            <div class="flex items-center justify-between mb-0">
              <h5 class="mx-6 my-5 font-semibold font bg-white">
                Educational Background
              </h5>
              <inertia-link
                class="h-8 text-xs items-center btn-indigo my-2 mx-6"
                :href="route('employees.create')"
              >
                ➕ Add Education
              </inertia-link>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-white">
                <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Level
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Name of School
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Course
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    From
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    To
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Units Earned
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Year Graduated
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Honors Received
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
                  v-for="education in educations"
                  :key="education.id"
                >
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span
                      class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-300 text-green-800"
                    >
                      {{ education.education_level }}
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                      {{ education.education_school_name }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                      {{ education.education_course }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">
                      {{ education.from }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">
                      {{ education.to }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">
                      {{ education.education_highest_level_earned }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">
                      {{ education.education_year_graduated }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">
                      {{ education.education_honors_received }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <inertia-link
                      href="#"
                      class="text-indigo-600 hover:text-indigo-900"
                      >✏️ Edit</inertia-link
                    >
                  </td>
                </tr>
                <tr v-if="educations.length === 0">
                  <td class="border-t px-6 py-4 font-bold" colspan="4">
                    ☹️ No educations added.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="flex flex-col mt-4">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
          >
            <div class="flex items-center justify-between mb-0">
              <h5 class="mx-6 my-5 font-semibold font bg-white">
                Work Experience
              </h5>
              <inertia-link
                class="h-8 text-xs items-center btn-indigo my-2 mx-6"
                :href="route('employees.create')"
              >
                ➕ Add Experience
              </inertia-link>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-white">
                <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Company Name
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                  Position
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Monthly Salary
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    From
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    To
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Salary Grade
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Status of Appointment
                  </th>
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Government Service
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
                  v-for="experience in experiences"
                  :key="experience.id"
                >
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                      {{ experience.experiences_company }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                      {{ experience.experiences_position }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                      {{ experience.experiences_monthly_salary }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">
                      {{ experience.experiences_from }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">
                      {{ experience.experiences_to }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">
                      {{ experience.experiences_salary_grade }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">
                      {{ experience.experiences_status_of_appointment }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">
                      {{ experience.experiences_government }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <inertia-link
                      href="#"
                      class="text-indigo-600 hover:text-indigo-900"
                      >✏️ Edit</inertia-link
                    >
                  </td>
                </tr>
                <tr v-if="educations.length === 0">
                  <td class="border-t px-6 py-4 font-bold" colspan="4">
                    ☹️ No educations added.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from "@/Shared/Layout";
import LoadingButton from "@/Shared/LoadingButton";
import SelectInput from "@/Shared/SelectInput";
import TextInput from "@/Shared/TextInput";
import TrashedMessage from "@/Shared/TrashedMessage";

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
  },
  props: {
    errors: Object,
    contact: Object,
    organizations: Array,
    educations: Array,
    experiences: Array,
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
