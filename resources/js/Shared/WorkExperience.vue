<template>
  <div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
        >
          <div class="flex items-center justify-between mb-0">
            <h5 class="mx-6 my-5 font-semibold font bg-white">
              💼 Work Experience
            </h5>
            <button
              @click="showExperienceModal"
              class="h-8 text-sm items-center text-blue-600 font-semibold rounded-lg my-2 mx-6"
            >
              ➕ Add
            </button>
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
                  <div class="text-sm text-gray-900 capitalize">
                    {{ experience.experiences_company }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ experience.experiences_position }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div v-if="experience.experiences_monthly_salary !== null" class="text-sm text-gray-900">
                    PHP
                    {{ experience.experiences_monthly_salary }}
                  </div>
                  <div v-else class="text-sm text-red-600">
                    No data available
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
                  <div v-if="experience.experiences_salary_grade !== null" class="text-sm text-gray-900">
                    {{ experience.experiences_salary_grade }}
                  </div>
                  <div v-else class="text-sm text-red-600">
                    No data available
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ experience.experiences_status_of_appointment }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div v-if="experience.experiences_government === '1'" class="text-sm text-gray-900 capitalize">
                    Yes
                  </div>
                  <div v-else class="text-sm text-gray-900 capitalize">
                    No
                  </div>
                </td>
                <td class="px-1 py-4 whitespace-nowrap text-sm font-medium">
                  <span 
                    @click="showExperienceEditModal(experience)"
                    class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                    >✏️ Edit</span</span
                  >
                  <span
                    @click="
                      destroy(experience.id, experience.experiences_company)
                    "
                    class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                    >🗑️ Delete</span
                  >
                </td>
              </tr>
              <tr v-if="experiences.length === 0">
                <td
                  class="border-t px-6 text-red-500 text-sm py-4 font-bold"
                  colspan="4"
                >
                  ☹️ No experiences added.
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <experience-add-modal
      :showing="showExperience"
      :employee="employeeId"
      :modal.sync="showExperience"
    ></experience-add-modal>
    <experience-edit-modal
      :showing="showExperienceEdit"
      :employee="employeeId"
      :experience="experienceItems"
      :modal.sync="showExperienceEdit"
    ></experience-edit-modal>
  </div>
</template>
<script>
import ExperienceAddModal from "@/Shared/Modals/ExperienceAddModal.vue";
import ExperienceEditModal from "@/Shared/Modals/ExperienceEditModal.vue";

export default {
  components: {
    ExperienceAddModal,
    ExperienceEditModal,
  },
  inject: ["employeeId"],
  props: {
    experiences: Array,
  },
  data() {
    return {
      experienceItems: null,
      showExperience: false,
      showExperienceEdit: false,
    };
  },
  methods: {
    showExperienceModal() {
      this.showExperience = true;
    },
    showExperienceEditModal(item) {
      this.experienceItems = item;
      this.showExperienceEdit = true;
    },
    destroy(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("experience.destroy", id));
        }
      });
    },
  },
};
</script>
